<?php 
	
	class ContaBancaria {
		const $IMPOSTO = 0.02;
		private $saldo;

		public function __construct() {
			$this->saldo = $saldo;
		}

		public function consultarSaldo() {
			return $this->saldo;
		}

		public function depositar($quantidade) {
			$this->saldo += $quantidade;
		}

		public function sacar($quantidade) {
			if ($this->saldo > 0 && $this->saldo >= $quantidade) {
				$this->saldo -= $quantidade;
			} else {
				throw new Exception("Saldo insuficiente");
			}
		}
	}

	class Cliente {
		private $nome;
		private $cpf;
		private $conta;

		public function __construct($nome, $cpf) {
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->conta = null;
		}

		public function setConta($conta) {
			$this->conta = $conta;
		}

		public function getConta() {
			return $this->conta;
		}
	} 

	$cliente = new Cliente("Francisco", 'cpf');
	
	$conta = new ContaBancaria();

	$cliente->setConta($conta);

	$cliente->getConta()->depositar(100.00);
	echo "Saldo atual é : " . $cliente->getConta()->consultarSaldo();