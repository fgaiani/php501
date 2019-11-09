<?php
	
	class Pessoa {
		public $nome;
		public $sobrenome;
		public $dataNascimento;
		public $sexo;

		public function nomeCompleto(): string {
			return "{$this->nome} {$this->sobrenome}";
		}
	}

	class Funcionario extends Pessoa {
		public $cargo;
		public $setor;
	}

	$f = new Funcionario();

	$f->nome = 'Francisco';
	$f->sobrenome = 'Gaiani';
	$f->cargo = 'Assistente';
	$f->setor = 'Desenvolvimento';

	echo $f->nomeCompleto();