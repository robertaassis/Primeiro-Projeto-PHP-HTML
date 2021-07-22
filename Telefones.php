<?php

class Telefones {
    public $telefone;
    public $descricao;

    public function __construct($telefone, $descricao){
      $this->telefone=$telefone;
      $this->descricao=$descricao;
    }

    public function getTelefone(){
      return $this->telefone;
    }

    public function getDescricao(){
      return $this->descricao;
    }

    public function toString(){
      return "$this->telefone - $this->descricao";
    }
    
  }