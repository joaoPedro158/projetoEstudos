<?php

namespace App\Services;

class CalculoService
{
    public function desconto(float $preco, float $descontoPercentual): float
    {
        if ($descontoPercentual < 0 || $descontoPercentual > 100) {
            throw new \InvalidArgumentException("Percentual inválido.");
        }

        $desconto = $preco * ($descontoPercentual / 100);
        return $preco - $desconto;
    }
}
