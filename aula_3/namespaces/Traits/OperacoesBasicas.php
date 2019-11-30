<?php

namespace Calculadora\Traits;

trait OperacoesBasicas {
    public function somar(float ...$valores): float {
        $total = 0;
        foreach($valores as $valor) {
            $total += $valor;
        }

        return $total;
    }

    public function subtrair(float ...$valores): float {
        $total = 0;
        foreach($valores as $valor) {
            $total -= $valor;
        }

        return $total;
    }
}