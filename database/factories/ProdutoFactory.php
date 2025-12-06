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
        $palavrasChaves = [
            'camisa', 'tenis', 'notebook', 'cadeira',
            'mochila', 'celular'
        ];

        $palavraChave = $this->faker->randomElement($palavrasChaves);

        $imageWidth = 640;
        $imageHeight = 480;
        return [
            'nome' => $this->faker->unique()->sentence(3,true) . '' . ucfirst($palavraChave),
            'imagem' => $this->faker->imageUrl($imageWidth, $imageHeight, $palavraChave),
            'preco' => $this->faker->randomFloat(2, 5.00, 999.99),
            'descricao' => $this->faker->paragraphs(2, true),
            'descricao' => $this->faker->paragraphs(2, true),
            'user_id' => \App\Models\User::factory(),

        ];
    }
}
