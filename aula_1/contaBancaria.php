<?php
	
	class ContaBancaria {

		private $juros = 0;
		protected $saldo = 0;

		public function __construct($juros = 0) {
			$this->juros = $juros;
		}

		public function depositar($quantidade) {
			$this->saldo += $quantidade;
		}

		public function sacar($quantidade) {
			if ($this->saldo < $quantidade) {
				throw new Exception("Saldo insuficiente");
			}

			$this->saldo -= $quantidade;
		}

		public function consultarSaldo() {
			return $this->saldo;
		}

		public function simularRendimento($meses) {
			return $this->saldo + ($this->juros * $meses);
		}
	}

	class ContaPoupanca extends ContaBancaria {
		public function __construct() {
			parent::__construct(0.05);
		}

		public function depositar($quantidade) {
			$this->saldo += 5.00;
			parent::depositar($quantidade);
		}

		private function quantidadePar($quantidade) {
			return $quantidade % 2 == 0;
		}

		public function sacar($quantidade) {
			if ($this->quantidadePar($quantidade)) {
				$this->depositar(10.00);
			} else {
				$quantidade += 100.00;
				parent::sacar($quantidade);
			}
		}

		final public function simularRendimento($meses) {
			return parent::simularRendimento($meses) + 5.00;
		}
	}

	final class ContaPoupancaEspecial extends ContaPoupanca {
		/**public function simularRendimento($meses) {
			return parent::simularRendimento($meses) + 5.00;
		} */
	}

	function processo($conta) {
		$conta->depositar(100.00);

		echo "Saldo: {$conta->consultarSaldo()} <br>";
		echo "Rendimento: {$conta->simularRendimento(12)} <br>";

		$conta->sacar(20.00);

		echo "Saldo: {$conta->consultarSaldo()} <br>";
		echo "Rendimento: {$conta->simularRendimento(12)} <br>";
	}

	processo(new ContaBancaria());
	echo "<hr>";
	processo(new ContaPoupanca());