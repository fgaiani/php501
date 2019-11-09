<?php
	
	class NomeDaClasse {
		public $nomeDaPropriedade = 'um valor padrão';

		public function nomeDoMetodo() {
			echo $this->nomeDaPropriedade;
		}
	}

	$obj = new NomeDaClasse;

	$obj->nomeDoMetodo();