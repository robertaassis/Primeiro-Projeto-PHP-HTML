<?php

require_once ('Cadastro.php');
require_once ('Telefones.php');

class Dados{

				function __construct(){ // só pra iniciar variavel

				}
				public function criaArquivo(Cadastro $pessoa){

				$arquivoaberto = fopen('Projeto.txt',"a");// a é somente pra escrita; cria txt Projeto
				$celulares = implode(",", $pessoa->getTelefones()); // array pra string
				fwrite($arquivoaberto, $pessoa->getNome() . "->" . $pessoa->getCPF() . "->" . $celulares. "\n"); // escrevo no arquivo
				fclose($arquivoaberto);
			}

				public function LeArquivo(){
				$usuario = array(); // vai guardar os objetos
				$arquivoaberto=fopen('Projeto.txt',"r"); // r pra leitura
				//$arq= file('C:\xampp\htdocs\Projeto\arquivo.txt'); // salva cada linha em $arq, não vai dar certo porque puxa caminho
				while(!feof($arquivoaberto)){
					$arq=fgets($arquivoaberto);
					$novoarq = explode ("->", $arq); // string em vetor
					if(!empty($arq)){
						$nome=$novoarq[0]; // primeiro indice do vetor é sempre nome
						$cpf=$novoarq[1]; // segundo é cpf
						$celnovo = explode(",", $novoarq[2]); // string dos telefones em vetores
						$usuarioNovo= new Cadastro($nome, $cpf, $celnovo);
						$usuario[]=$usuarioNovo;
					}
				
				}	
				return $usuario;
			}
				
	}