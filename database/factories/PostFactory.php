<?php

namespace Database\Factories;

use App\Models\Post;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "uuid" => Uuid::uuid(),
            "title" => $this->faker->word(),
            "body" => $this->faker->sentence(),
            "slug" => $this->faker->sentence(),
        ];
    }
}
