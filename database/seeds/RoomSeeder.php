<?php

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('classroom_entity')->delete();
        $room = 15304 ;
        for ($i=0; $i < 3; $i++) {
            DB::table('classroom_entity')->insert([
                'room_id' => 15304+$i,
                'build' => 15,
            ]);
        }




    }
}
