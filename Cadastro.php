<?php
require_once ('Telefones.php');
class Cadastro {
	public $nome;
	public $cpf;
	public $telefones=array();

	public function __construct($nome, $cpf,$telefones){
		$this->nome=$nome;
		$this->cpf=$cpf;
		$this->telefones=$telefones;
	}

	public function getNome(){
		return $this->nome;
	}
	public function getCPF(){
		return $this->cpf;
	}
	public function getTelefones(){
		return $this->telefones;
	}
	
}