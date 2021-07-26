<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
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
            'name' => $this->faker->name,
            'date' => $this->faker->dateTime,
            'color' => $this->faker->hexcolor,
            'size' => $this->faker->randomFloat(2, 0, 9999),
            'quantity' => $this->faker->randomNumber,
            'unit_price' => $this->faker->randomNumber(2),
            'discount' => $this->faker->randomNumber(2),
            'vat' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomNumber(2),
            'image' => $this->faker->text(255),
            'status' => 'active',
            'sub_category_id' => \App\Models\SubCategory::factory(),
            'store_id' => \App\Models\Store::factory(),
        ];
    }
}
