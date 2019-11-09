<?php
	class Quadrado {
		
		static instancia = null;

		private $lado;

		public getQuadrado() {
			if(!Quadrado::instancia) {
				Quadrado::instancia = new Quadrado();
			}

			return Quadrado::instancia;
		}

		private function __construct(){

		}

		private function __clone() {
			
		}

		public function setLado($lado) {
			$this->lado = $lado;
		}

		public function getLado() {
			return $this->lado;
		}

	}