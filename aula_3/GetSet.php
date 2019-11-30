<?php

class Funcionario
{
	private $salario;

	public function __set($propriedade, $valor)
	{
		$this->$propriedade = $valor;
	}

	public function __get($propriedade)
	{
		return '<span class="meu-span">' . $this->$propriedade . '</span>';
	}

	private function sayHello($who)
	{
		echo 'Hello, ' . $who;
	}

	public function __call($metodo, $argumentos)
	{
		return call_user_func_array(
			[ $this, $metodo ], 
			$argumentos
		);
	}

	private static function hi($x)
	{
		echo 'Hi,' . $x;
	}

	public function __callStatic($metodo, $argumentos)
	{
		self::$metodo($argumentos[0]);
	}
}

$f = new Funcionario();

$f->salario = 10000.00;
$f->shamileu = 'oi';

echo $f->salario;
echo '<br>';

$f->sayHello('Lucas');

$Funcionario::hi();