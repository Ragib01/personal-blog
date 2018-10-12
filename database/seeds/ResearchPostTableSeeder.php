<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

//Model
use App\Models\ResearchPost;

class ResearchPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index)
        {
            ResearchPost::create(array(
                'title'       => $faker->sentence,
                'description' => $faker->paragraph,
                'category_id' => $faker->numberBetween(1, 10),
                'count'       => 0,
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ));
        }
    }
}
