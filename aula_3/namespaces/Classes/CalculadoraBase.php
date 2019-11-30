<?php

namespace Calculadora\Classes;

use Calculadora\Interfaces\ICalculadora;
use Calculadora\Traits\Operacoes;

abstract class CalculadoraBase implements ICalculadora {
    use Operacoes;
}