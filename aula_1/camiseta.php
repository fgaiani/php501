<?php
	
	class Camiseta {
		private $tamanho;
		private $preco;
		private $foto;


		public function __construct($preco, $tamanho, $foto) {
			$this->preco = $preco;
			$this->tamanho = $tamanho;
			$this->foto = $foto;
		}

		public function comprar($quantidade) {
			echo "Você comprou $quantidade camisetas";
		}
	}

	$camiseta = new Camiseta(100.00, 'GG', null);

	$camiseta->comprar(10);