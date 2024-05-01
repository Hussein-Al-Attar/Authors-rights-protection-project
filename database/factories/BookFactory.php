<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type_book' => $this->faker->word,
            'department' => $this->faker->word,
            'specialization' => $this->faker->word,
            'pdf' => null, // For nullable column
            'published' => null, // Will randomly set to true or false
            'reject_message' => null, // For nullable column
            'user_id' => null, // For nullable column
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
