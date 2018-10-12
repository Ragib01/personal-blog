<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

// Model...
use App\Models\BlogCategory;

class BlogCategoryTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index)
        {
            BlogCategory::create([
                'title'       => $faker->sentence,
                'description' => $faker->paragraph,
                'image'       => 'category_demo.jpg',
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
        }
    }
}
