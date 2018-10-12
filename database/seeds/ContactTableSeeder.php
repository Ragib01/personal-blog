<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

// Model...
use App\Models\Contact;

class ContactTableSeeder extends Seeder
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
            Contact::create([
                'title'       => $faker->sentence,
                'email'       => $faker->email,
                'description' => $faker->paragraph,
                'created_at'  => $faker->dateTime,
                'updated_at'  => $faker->dateTime
            ]);
        }
    }
}
