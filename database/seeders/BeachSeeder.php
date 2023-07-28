<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beach;
use Faker\Generator as Faker;

class BeachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $beach = new Beach();
            $beach->name = $faker->company;
            $beach->location = $faker->address;
            $beach->umbrella_number = $faker->numberBetween(10, 100);
            $beach->sunbed_number = ($beach->umbrella_number) * 2;
            $beach->umbrella_price_per_day = $faker->randomFloat(2, 15, 40);
            $beach->opening_date = $faker->dateTimeBetween("2023-05-01", "2023-06-01");
            $beach->closing_date = $faker->dateTimeBetween("2023-09-30", "2023-10-15");
            $beach->beachvolley_court = $faker->boolean();
            $beach->football_court = $faker->boolean();
            $beach->save();
        }
    }
}
