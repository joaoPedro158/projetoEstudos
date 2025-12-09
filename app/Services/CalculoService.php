<?php

namespace App\Services;

class CalculoService
{
    public function validarPercentual(float $percentual): void
    {
        if ($percentual < 0 || $percentual > 100) {
            throw new \InvalidArgumentException("Percentual inválido.");
        }
    }

    public function desconto(float $preco, float $descontoPercentual): float
    {
        $this->validarPercentual($descontoPercentual);

        $desconto = $preco * ($descontoPercentual / 100);
        return $preco - $desconto;
    }

    public function acrescimo(float $preco, float $acrescimoPercentual): float
    {
        $this->validarPercentual($acrescimoPercentual);

        $acrescimo = $preco * ($acrescimoPercentual / 100);
        return $preco + $acrescimo;
    }

    /**
     * Calcula o número máximo de parcelas baseado no valor do produto
     *
     * Regras:
     * - Até R$ 100: máximo 3x sem juros
     * - R$ 100 a R$ 500: máximo 6x sem juros
     * - R$ 500 a R$ 1000: máximo 10x sem juros
     * - Acima de R$ 1000: máximo 12x sem juros
     */
    public function calcularParcelasMaximas(float $preco): int
    {
        if ($preco <= 0) {
            throw new \InvalidArgumentException("Preço deve ser maior que zero.");
        }

        if ($preco < 100) {
            return 3;
        } elseif ($preco < 500) {
            return 6;
        } elseif ($preco < 1000) {
            return 10;
        } else {
            return 12;
        }
    }

    /**
     * Calcula todas as opções de parcelamento disponíveis
     *
     * @param float $preco Preço do produto
     * @param int $parcelasSemJuros Número de parcelas sem juros (padrão: varia com o preço)
     * @param float $taxaJurosMensal Taxa de juros mensal para parcelas com juros (padrão: 2.99%)
     * @param float $parcelaMinima Valor mínimo de cada parcela (padrão: R$ 20)
     * @return array Array com todas as opções de parcelamento
     */
    public function calcularParcelamento(
        float $preco,
        ?int $parcelasSemJuros = null,
        float $taxaJurosMensal = 2.99,
        float $parcelaMinima = 20.00
    ): array
    {
        if ($preco <= 0) {
            throw new \InvalidArgumentException("Preço deve ser maior que zero.");
        }

        // Define parcelas sem juros baseado no valor
        if ($parcelasSemJuros === null) {
            $parcelasSemJuros = $this->calcularParcelasMaximas($preco);
        }

        $maxParcelas = 12; // Máximo absoluto
        $opcoes = [];

        for ($parcela = 1; $parcela <= $maxParcelas; $parcela++) {
            // Verifica se a parcela mínima é respeitada
            $valorParcela = $preco / $parcela;

            if ($valorParcela < $parcelaMinima && $parcela > 1) {
                break; // Para se a parcela ficar muito pequena
            }

            if ($parcela <= $parcelasSemJuros) {
                // Sem juros
                $opcoes[] = [
                    'parcelas' => $parcela,
                    'valor_parcela' => round($preco / $parcela, 2),
                    'valor_total' => $preco,
                    'com_juros' => false,
                    'taxa_juros' => 0,
                    'economia' => 0
                ];
            } else {
                // Com juros (juros compostos)
                $valorTotal = $this->calcularJurosCompostos($preco, $taxaJurosMensal, $parcela);
                $valorParcela = $valorTotal / $parcela;

                if ($valorParcela < $parcelaMinima) {
                    break;
                }

                $jurosTotal = $valorTotal - $preco;

                $opcoes[] = [
                    'parcelas' => $parcela,
                    'valor_parcela' => round($valorParcela, 2),
                    'valor_total' => round($valorTotal, 2),
                    'com_juros' => true,
                    'taxa_juros' => $taxaJurosMensal,
                    'juros_total' => round($jurosTotal, 2)
                ];
            }
        }

        return $opcoes;
    }

    /**
     * Calcula juros compostos
     */
    private function calcularJurosCompostos(float $principal, float $taxaMensal, int $meses): float
    {
        $taxa = $taxaMensal / 100;
        return $principal * pow(1 + $taxa, $meses);
    }

    /**
     * Calcula a melhor opção de parcelamento (sugestão para o cliente)
     */
    public function melhorOpcaoParcelamento(float $preco): array
    {
        $opcoes = $this->calcularParcelamento($preco);

        // Retorna a última parcela sem juros (melhor custo-benefício)
        $melhorOpcao = null;

        foreach ($opcoes as $opcao) {
            if (!$opcao['com_juros']) {
                $melhorOpcao = $opcao;
            }
        }

        return $melhorOpcao ?? $opcoes[0];
    }

    /**
     * Formata as opções de parcelamento para exibição
     */
    public function formatarParcelamento(array $opcao): string
    {
        $parcelas = $opcao['parcelas'];
        $valorParcela = number_format($opcao['valor_parcela'], 2, ',', '.');

        if ($opcao['com_juros']) {
            $valorTotal = number_format($opcao['valor_total'], 2, ',', '.');
            return "{$parcelas}x de R$ {$valorParcela} (Total: R$ {$valorTotal})";
        } else {
            return "{$parcelas}x de R$ {$valorParcela} sem juros";
        }
    }
}
