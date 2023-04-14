<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="style_perfil.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="..\swega_escoteiros\util\escoteira_favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>SWEGA-Escoteiros</title>
</head>
<body>

<div class="container-fluid">
   
    <div class= "row" id = "cabecalho">
        <div class ="col-3 ">
        
                <aside id ="menu_oculto" class ="menu_oculto">
                    <a href = "javascript:void(0)" class = "btn_fechar" onclick ="fechar_nav()">&times;</a>
                    <a href = "#"> Home</a>
                    <a href = "#"> Login</a>
                    <a href = "#"> Sobre</a>
                    <a href = "#" input="checkbox" id="">Modo Escuro</a>
                </aside>

                <section id="principal">
                    <span style="font-size:30px;cursor:pointer " onclick = "abrir_nav()">&#9776;</span>
                    <p></p>
                </section>

                <script type="text/javascript" src="scripts.js"></script>
        </div>

            <div class ="col-6 " id = "bloco_titulo"><p id="p_titulo">Escoteiros Guairacá</p> </div>
            <div class ="col-3 "></div>

    </div>

                <div class="container-fluid  border col-3" id="container_ft">
                        <div class= "col border" id = "ft_perfil">
                            <div class ="row-3 border">drgdf</div>
                        
                        <div class= "row border">
                            <div class ="row border"><p class = "dados_perfil">Classificação</p></div>
                        </div>
                        <div class= "row border">
                            <div class ="row border" id="nome_perfil"><p >Nome</p></div>
                        </div>
                </div>


                        <div class= "row modulos_cadastrados">
                            <div class ="col border"></div>
                            <div class ="col border"><p >Nome</p></div>
                            <div class ="col border"><p >Nome</p></div>
                            <div class ="col border"><p >Nome</p></div>
                        </div>
                        <div class= "row modulos_cadastrados">
                            <div class ="col border"></div>
                            <div class ="col border"><p >Nome</p></div>
                            <div class ="col border"><p >Nome</p></div>
                            <div class ="col border"><p >Nome</p></div>
                        </div>
                        <div class= "row modulos_cadastrados">
                            <div class ="col border"></div>
                            <div class ="col border"><p >Nome</p></div>
                            <div class ="col border"><p >Nome</p></div>
                            <div class ="col border"><p >Nome</p></div>
                        </div>
                </div>








              
                     

               






                
    <div class="container-fluid">
        <div class ="col-12 "id="rodape_invisivel">
            <div class= "row" id = "rodape">
                        
                        

                <div class ="col-3">
                    <div class= "row linha_nome">Nome</div>
                    <div class= "row linha_foto">imagem</div>
                    <div class= "row linha_num" >Numero</div>
                </div>

                <div class ="col-3">
                    <div class= "row linha_nome">Nome</div>
                    <div class= "row linha_foto">imagem</div>
                    <div class= "row linha_num" >Numero</div>
                </div>


                <div class ="col-3">
                        <div class= "row linha_nome">Nome</div>
                        <div class= "row linha_foto">imagem</div>
                        <div class= "row linha_num">Numero</div>
                 </div>


                <div class ="col-3">
                        <div class= "row linha_nome">Nome</div>
                        <div class= "row linha_foto">imagem</div>
                        <div class= "row linha_num">Numero</div>
                </div>

    </div> 
        </div> 
            </div>
                       

</div>
                           
</body>
</html>