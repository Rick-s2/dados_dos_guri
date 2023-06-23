<?php

class Endereco{

    private $id_endereco;
    private $cep;
    private $logradouro;
    private $numeroEndereco;
    private $bairro;
    private $cidade;
    private $pais;

    

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of logradouro
     */ 
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     *
     * @return  self
     */ 
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get the value of numeroEndereco
     */ 
    public function getNumeroEndereco()
    {
        return $this->numeroEndereco;
    }

    /**
     * Set the value of numeroEndereco
     *
     * @return  self
     */ 
    public function setNumeroEndereco($numeroEndereco)
    {
        $this->numeroEndereco = $numeroEndereco;

        return $this;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */ 
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of id_endereco
     */ 
    public function getId_endereco()
    {
        return $this->id_endereco;
    }

    /**
     * Set the value of id_endereco
     *
     * @return  self
     */ 
    public function setId_endereco($id_endereco)
    {
        $this->id_endereco = $id_endereco;

        return $this;
    }
}