<?php

// #######################################################
// # Bloco de Exceptions
// #######################################################

class SaldoInsuficienteException extends Exception
{

}

class ConcessionariaDiferenteException extends Exception
{

}

class PrazoVencidoException extends Exception
{

}

// #######################################################
// #
// #######################################################

const PRECO_DA_PASSAGEM = 5.00;

class Bilhete
{
	private $saldo;
	private $concessionaria;

	public function __construct($saldo, $concessionaria)
	{
		$this->saldo = $saldo;
		$this->concessionaria = $concessionaria;
	}

	public function descontarSaldo($s)
	{
		$this->saldo -= $s;
	}

	public function getSaldo()
	{
		return $this->saldo;
	}

	public function getConcessionaria() {
		return $this->concessionaria;
	}
}

class Catraca
{
	private $concessionaria;
	private $state = 'closed';

	
	public function __construct($concessionaria) {
		$this->concessionaria = $concessionaria;
	}

	public function unlock($bilhete)
	{	
		$saldo = $bilhete->getSaldo();

		if ($saldo < PRECO_DA_PASSAGEM) {
			throw new SaldoInsuficienteException($saldo);
		}

		if ($bilhete->getConcessionaria() != $this->concessionaria) {
			throw new ConcessionariaDiferenteException();			
		}

		throw new Exception('saldo insuficiente');
	}
}

$bilhete = new Bilhete(1232.00, 'sptrans');
$catraca = new Catraca('sptrans');

try {
	$catraca->unlock($bilhete);
} catch (SaldoInsuficienteException $err) {
	echo 'Deseja recarregar ? <br>'; 
} catch (ConcessionariaDiferenteException $err) {
	echo 'Concessionaria inválida! <br>';
} catch (Exception $err) {
	echo $err->getMessage();
} finally {

}	