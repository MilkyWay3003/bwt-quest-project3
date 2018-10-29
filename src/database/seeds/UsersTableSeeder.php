<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 3) as $index) {
            DB::table('users')->insert([
                'name'     => $faker->name,
                'email'    => $faker->unique()->email,
                'password' => Hash::make($faker->password),
            ]);
        }
    }
}
