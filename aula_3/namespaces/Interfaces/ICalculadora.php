<?php

namespace Calculadora\Interfaces;

interface ICalculadora {
    function somar(float ...$v): float;
    function subtrair(float ...$v):float;
}