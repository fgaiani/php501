<?php

	class Usuario {
		//Constantes de status do usuario

		const STATUS_ATIVO = true;
		const STATUS_INATIVO = false;

		public $ativo;

		public function __construct() {
			$this->ativo = Usuario::STATUS_ATIVO;
		}

		public function getAtivo() {
			return $this->ativo ? 'ativo': 'inativo';
		}

		public function __clone() {
			echo 'Clonando o objeto ....';
		}
	}

	$u1 = new Usuario();

	echo $u1->getAtivo();
	echo "<br>";

	$u2 = $u1;
	$u2->ativo = Usuario::STATUS_INATIVO;

	echo $u1->getAtivo();
	echo "<br>";

	$u3 = clone $u1;
	echo "<br>";

	echo $u3->getAtivo();
	echo "<br>";

	echo $u1->getAtivo();