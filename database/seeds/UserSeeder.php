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
        DB::table('user_entity')->insert([
            'user_id' => 'admin',
            'firstname' =>'Anucha',
            'lastname' => 'Maitripirom',
            'email' => 'admin@admin.com',
            'password' => bcrypt('p4ssw0rd')
        ]);


    }
}
