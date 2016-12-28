<?php

use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_entity')->delete();

        $faker = Faker\Factory::Create() ;
        DB::table('user_entity')->insert([
            'user_id' => 'admin',
            'password' => bcrypt('password'),
            'firstname' =>'FirstName',
            'lastname' => 'LastName',
            'email' => 'admin@admin.com',
            'status' => 1 ,
            'role' => 'admin',


        ]);

        // for ($i=0; $i < 10; $i++) {
        //     DB::table('user_entity')->insert([
        //         'user_id' => $faker->word,
        //         'password' => bcrypt('password'),
        //         'firstname' => $faker->firstName,
        //         'lastname' => $faker->lastName,
        //         'email' => $faker->email,
        //         'status' => 1 ,
        //         'role' => 'instructor',
        //     ]);
        // }


    }
}
