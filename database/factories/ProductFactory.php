<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'description' => "Lorem Ipsum is simply dummy text...",
            'price' => $this->faker->randomNumber(),
            'product_image' => $this->faker->imageUrl($width = 195, $height= 120, 'cats', true, 'Faker', true),
            'brand' => $this->faker->company(),
            'user_id' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $categoryIds = Category::pluck('id')->random(3); // Replace '3' with the number of random categories you want to attach
            $product->categories()->attach($categoryIds);
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
}
