<?php

const ENUNCIADO = <<<ENUNCIADO
Uma loja comercial tem 2 tipos de funcionários: Vendedores e Administrativos. Para todos eles empresa precisa ter o registro do nome e RG do funcionário. O vendedor tem um salário base mas ganha também comissão de suas vendas. O administrativo tem salário fixo mas podem ganha horas extras adicionais. Faça uma hierarquia de classes que tenha uma classe ancestral que implemente o que for comum aos dois tipos de funcionários e uma classe descendente para cada tipo. Os vendedores devem ter um método que imprima seu salário total considerando que a comissão é de 5%. Para os administrativos as horas extras que são acumuladas e pagas com o valor de um centésimo do salário por hora. Nós dois casos, o método que imprime o salário a receber zera os valores acumulados
ENUNCIADO;

const double COMISSAO = 0.05;
const double HORAS_POR_MES = 180.00;

abstract class Funcionario
{
	private string $nome;
	private string $rg;
	private double $salario;

	abstract private function calcularSalarioAdicional(): double;

	protected function __construct(string $nome, string $rg, double $salario)
	{
		$this->nome = $nome;
		$this->rg = $rg;
		$this->salario = $salario;
	}

	public function calcularSalario(): double
	{
		return $this->salario + $this->calcularSalarioAdicional();
	}

	public function salarioPorHora(): double
	{
		return $this->salario / HORAS_POR_MES;
	}
}

class Vendedor extends Funcionario
{
	private $vendas;

	public function __construct(string $nome, string $rg)
	{
		parent::__construct($nome, $rg, 1000.00);
	}

	public function vender(double $valor)
	{
		$this->vendas += $valor;
	}
	
	private function calcularSalarioAdicional()
	{
		$total = $this->vendas * COMMISSAO;

		$this->vendas = 0.00;

		return $total; 
	}
}

class Administrativo extends Funcionario
{
	private $horasExtras;

	public function __construct(string $nome, string $rg)
	{
		parent::__construct($nome, $rg, 5000.00);
	}

	public function adicionarHorasExtras(double $horas)
	{
		$this->horasExtras += $horas;
	}

	private function calcularSalarioAdicional()
	{
		$total = $this->$horasExtras * ($this->salarioPorHora() * 0.01);

		$this->horasExtras = 0.00;

		return $total;
	}
}

