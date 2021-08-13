<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->realText(),
            'extra_attributes' => [$this->faker->sentence() => $this->faker->sentence()],
            'tags' => [$this->faker->sentence()],

            'gtin13' => $this->faker->unique()->ean13(),
            'color' => $this->faker->hexColor(),
            'sku' => $this->faker->word(),
            'pattern' => $this->faker->word(),
            'production_date' => $this->faker->dateTime(),
            'purchase_date' => $this->faker->dateTime(),
            'release_date' => $this->faker->dateTime(),
            'slogan' => $this->faker->sentence(),
        ];
    }
}
