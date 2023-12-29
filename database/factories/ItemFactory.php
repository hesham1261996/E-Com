<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => $this->faker->sentence(),
            'description'   => $this->faker->text(),
            'category_id'    => Category::all()->random()->id,
            'company_id'    => Company::all()->random()->id,
            'made_year'     => $this->faker->year('now'),
            'price'         => $this->faker->randomNumber(),
            'image'         => $this->faker->randomElement(['items/1.jpg' ,'items/2.jpg' , 'items/3.jpg' , 'items/4.jpg'])
        ];
    }
}
