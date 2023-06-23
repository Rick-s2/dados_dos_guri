<?php
#Classe controller para Usuário
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/EnderecoDAO.php");
require_once(__DIR__ . "/../dao/ContatoDAO.php");
require_once(__DIR__ . "/../service/UsuarioService.php");
require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../model/Endereco.php");
require_once(__DIR__ . "/../model/Contato.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class UsuarioController extends Controller {

    private UsuarioDAO $usuarioDao;
    private EnderecoDAO $enderecoDao;
    private ContatoDAO $contatoDao;
    private UsuarioService $usuarioService;

    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();
        $this->enderecoDao = new EnderecoDAO();
        $this->contatoDao = new ContatoDAO();
        $this->usuarioService = new UsuarioService();

        $this->setActionDefault("list");    
        $this->handleAction();
    }

    protected function profile(string $msgErro = "", string $msgSucesso = ""){

        $usuario = $this->findUsuarioById();

        if($usuario){
            $endereco = $this->enderecoDao->findById($usuario-> getIdEndereco());
            $usuario->setEndereco($endereco);
            $contato = $this->contatoDao->findById($usuario->getIdContato());
            $usuario->setContato($contato);

            $dados["id_endereco"] = $endereco -> getId_endereco();
            $dados["id_contato"] = $contato -> getId_contato();
            $dados["id"] = $usuario->getId();
            $dados["papeis"] = UsuarioPapel::getAllAsArray();
            $usuario->setSenha("");
            $dados["usuario"] = $usuario;        
            $this->loadView("usuario/profile.php", $dados);
        } else {
            $this->list("Usuário não encontrado.");
        }

    }

    /* Método para chamar a view com a listagem dos Usuarios */
    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $usuarios = $this->usuarioDao->list();
        //print_r($usuarios);
        $dados["lista"] = $usuarios;

        $this->loadView("usuario/list.php", $dados,$msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id"] = 0;
        $dados['id_contato'] = 0;
        $dados['id_endereco'] = 0;

        $dados["papeis"] = UsuarioPapel::getAllAsArray();
        $this->loadView("usuario/form.php", $dados);
    }

    protected function edit() {
        $usuario = $this->findUsuarioById();

        if($usuario){
            $endereco = $this->enderecoDao->findById($usuario-> getIdEndereco());
            $usuario->setEndereco($endereco);
            $contato = $this->contatoDao->findById($usuario->getIdContato());
            $usuario->setContato($contato);

            $dados["id_endereco"] = $endereco -> getId_endereco();
            $dados["id_contato"] = $contato -> getId_contato();
            $dados["id"] = $usuario->getId();
            $dados["papeis"] = UsuarioPapel::getAllAsArray();
            $usuario->setSenha("");
            $dados["usuario"] = $usuario;        

            $this->loadView("usuario/form.php", $dados);
        } else {
            $this->list("Usuário não encontrado.");
        }

    }
    

    protected function save() {


        // Captura dados endereço
        $dados["id_endereco"] = isset($_POST['id_endereco']) ? $_POST['id_endereco'] : 0;
        $cep = isset($_POST['cep']) ? trim($_POST['cep']) : NULL;
        $logradouro = isset($_POST['logradouro']) ? trim($_POST['logradouro']) : NULL;
        $numero = isset($_POST['numeroEndereco']) ? trim($_POST['numeroEndereco']) : NULL;
        $bairro = isset($_POST['bairro']) ? trim($_POST['bairro']) : NULL;
        $cidade = isset($_POST['cidade']) ? trim($_POST['cidade']) : NULL;
        $pais = isset($_POST['pais']) ? trim($_POST['pais']) : NULL;
        // Cria objeto endereço
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setNumeroEndereco($numero);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setPais($pais);
    
        // Captura dados contato
        $dados["id_contato"] = isset($_POST['id_contato']) ? $_POST['id_contato'] : 0;
        $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : NULL;
        $celular = isset($_POST['celular']) ? trim($_POST['celular']) : NULL;
        $email = isset($_POST['email']) ? trim($_POST['email']) : NULL; 
        // Cria objeto contato
        $contato = new Contato();
        $contato->setTelefone($telefone);
        $contato->setCelular($celular);
        $contato->setEmail($email);

        //Captura os dados do usuário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $id_endereco["id_endereco"] = isset($_POST['id_endereco']) ? $_POST['id_endereco'] : 0;
        $id_contato["id_contato"] = isset($_POST['id_contato']) ? $_POST['id_contato'] : 0;
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : NULL;
        $cpf = isset($_POST['cpf']) ? trim($_POST['cpf']) : NULL;
        $login = isset($_POST['login']) ? trim($_POST['login']) : NULL;
        $senha = isset($_POST['senha']) ? trim($_POST['senha']) : NULL;
        $confSenha = isset($_POST['conf_senha']) ? trim($_POST['conf_senha']) : NULL;
        //Captura os papeis do usuário
        $papeis = array();
        foreach(UsuarioPapel::getAllAsArray() as $papel) {
            if(isset($_POST[$papel]))
                array_push($papeis, $papel);
        } 
         //Cria objeto Usuario
         $usuario = new Usuario();
         $usuario->setNome($nome);
         $usuario->setEndereco($endereco);
         $usuario->setContato($contato);
         $usuario->setCpf($cpf);
         $usuario->setLogin($login);
         $usuario->setSenha($senha);
         $usuario->setPapeisAsArray($papeis);


        //Validar os dados
        $erros = $this->usuarioService->validarDados($endereco, $contato, $usuario, $confSenha);

        if(empty($erros)) {
            //Persiste o objeto
            try {
                if($dados["id"] == 0){ //Inserindo
                    $this->usuarioService->insertEnd($endereco);
                    $this->usuarioService->insertCont($contato);
                    $this->usuarioService->insertUsu($usuario);
                }
                else {//Alterando
                    $usuario->setId($dados["id"]);
                    $this->usuarioService->updateUsu($usuario);
                    $endereco->setId_endereco($dados["id_endereco"]);
                    $this->usuarioService->updateEnd($endereco);
                    $contato->setId_contato($dados["id_contato"]);
                    $this->usuarioService->updateCont($contato);
                }

                // - Enviar mensagem de sucesso
                $msg = "Usuário salvo com sucesso.";
                
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["[Erro ao salvar o usuário na base de dados.]"];
            }
        }

        //Se há erros, volta para o formulário
        
        //TODO - Transformar o array de erros em string
        $dados["usuario"] = $usuario;
        $dados["nome"] = $nome;
        $dados["cpf"] = $cpf;
        $dados["login"] = $login;
        $dados["senha"] = $senha;
        $dados["confSenha"] = $confSenha;
        $dados["papeis"] = UsuarioPapel::getAllAsArray();
        $dados["endereco"] = $endereco;
        $dados["contato"] = $contato;
        $dados["cep"] = $cep;
        $dados["logradouro"] = $logradouro;
        $dados["numeroEndereco"] = $numero;
        $dados["bairro"] = $bairro;
        $dados["cidade"] = $cidade;
        $dados["pais"] = $pais;
        $dados["telefone"] = $telefone;
        $dados["celular"] = $celular;
        $dados["email"] = $email;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("usuario/form.php", $dados, $msgsErro);
    }

    protected function delete(){
        $usuario = $this->findUsuarioById();
        //$endereco = $this->findEnderecoById();
        //$contato = $this->findContatoById();
        if($usuario){
            $this->usuarioDao->deleteById($usuario->getId());
            
            if($usuario->getIdEndereco())
                $this->enderecoDao->deleteById($usuario->getIdEndereco());
            
            if($usuario->getIdContato())
                $this->contatoDao->deleteById($usuario->getIdContato());

            $this->list("","Usuário excluído com sucesso.");
        } else {
            $this->list("Usuário não encontrado.");
        }
    }
    protected function updateToInativo(){
        $usuario = $this->findUsuarioById();
        if($usuario){
            $this->usuarioDao->updateToInativo($usuario->getId());
            $this->list("","Usuário inativado com sucesso.");
        } else {
            $this->list("Usuário não encontrado.");
        }
    }
    protected function updateToAtivo(){
        $usuario = $this->findUsuarioById();
        if($usuario){
            $this->usuarioDao->updateToAtivo($usuario->getId());
            $this->list("","Usuário ativado com sucesso.");
        } else {
            $this->list("Usuário não encontrado.");
        }
    }
    protected function findUsuarioById(){
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $dados["id"] = $id;

        $usuario = $this->usuarioDao->findById($id);
        return $usuario;
    }

   
}

#Criar objeto da classe
$usuCont = new UsuarioController();
