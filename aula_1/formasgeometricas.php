<?php

	abstract class FormaGeometrica {
		abstract public function area(): double;
	}

	class Retangulo extends FormaGeometrica {
		private $base;
		private $altura;

		public function __construct($base, $altura) {
			$this->base = $base;
			$this->altura = $altura;
		}

		public function area(): double {
			return $base * $altura;
		}
	}

	class Quadrado extends Retangulo {
		public function area() {
			
		}
	}