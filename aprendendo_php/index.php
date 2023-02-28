<?php

class Pessoa{

    public $nome; 
    public $idade;

    public function __construct($nome,$idade,$tamanho){

        $this->nome = $nome;
        $this->idade = $idade;
        $this->tamanho = $tamanho;
    }

    public function printNomeIdade(){

        echo $this->nome;
        echo '<br>';
        echo $this->idade;
        echo '<br>';
        echo $this->tamanho;
        echo '<br> <br>';
    }
}

$pessoa = new Pessoa('Rick ciclonado do jardim sp','18 anos','16cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Guille da espanhola','17','22cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Matheus do imposto de renda','18','18,5cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Marco do corsa','18','36,08cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Joao edicoes','18','16,56cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Henry ceo do sexo','18','+9999cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Mandelli do mandelao','18','18,94cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Nikolas do durateston','18','36,56cm');

    $pessoa->printNomeIdade();


$pessoa = new Pessoa('Thiago chines','18','8 ao quadrado cm');

    $pessoa->printNomeIdade();

$pessoa = new Pessoa('Castro da calcinha dourada','18','22cm, aqui e bolsonaro');

    $pessoa->printNomeIdade();



?>