<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $produtos = [
            'camisa', 'tenis', 'notebook', 'cadeira',
            'mochila', 'celular'
        ];

        $palavraChave = $this->faker->randomElement($produtos);
        $numero = $this->faker->randomElement(['01','02']);

        $imgCaminho = 'produtos/' . $palavraChave . $numero . '.webp';

        $produtoNome = $this->faker->unique()->sentence(2,true) . '' . ucfirst($palavraChave);

        return [
            'nome' => $produtoNome,
            'imagem' => $imgCaminho,
            'estoque' => $this->faker->numberBetween(1,50),
            'preco' => $this->faker->randomFloat(2, 5.00, 999.99),
            'descricao' => $this->faker->paragraphs(2, true),
            'descricao' => $this->faker->paragraphs(2, true),
            'user_id' => \App\Models\User::factory(),

        ];
    }
}
