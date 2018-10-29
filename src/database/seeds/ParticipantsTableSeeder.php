<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();        
        foreach (range(1, 10) as $index) {
            DB::table('participants')->insert([
                'firstname'     => $faker->firstName,
                'lastname'      => $faker->lastName,
                'birthdate'     => $faker->unique()->date($format = 'Y-m-d', $max = '-18 years'),
                'reportsubject' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'country'        => $faker->country,
                'phone'          => $faker->regexify('\+1 [0-9]{3} [0-9]{3}\-[0-9]{4}'),
                'email'          => $faker->unique()->email,
                'company'        => $faker->company,
                'position'       => $faker->jobTitle,
                'aboutme'        => $faker->text($maxNbChars = 200),
                'photo'          => $faker->imageUrl(200, 200, 'cats'),
                'created_at'     => $faker->dateTime($max = 'now'),
                'updated_at'     => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}