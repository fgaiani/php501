<?php

namespace Calculadora\Traits;

trait OperacoesExtras
{
	public function imc(float $peso, float $altura): array
	{
		return round($peso / ($altura ** 2), 2);
	}
}