<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

// Model...
use App\Models\About;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

            About::create([
                'title'       => $faker->sentence,
                'description' => $faker->paragraph,
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
    }
}
