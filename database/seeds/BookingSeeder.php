<?php

use Illuminate\Database\Seeder;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('classroom_booking')->delete();

        $faker = Faker\Factory::create() ;
        $dt = Carbon\Carbon::now() ;
        for ($i=0; $i < 50; $i++) {

            $start_time = $faker->time();
            $end_time = $start_time ;
            $end_time[1] = $end_time[1]+3 ;
            DB::table('classroom_booking')->insert([
                'sec' => $faker->numerify('8##') ,
                'quan_nisit'=> $faker->numberBetween($min=20,$max=50),
                'note' => 'Test Database',
                'date' => $faker->dateTimeBetween($startDate='-2 years', $endDate='+1 years'),
                'start_time' => $start_time,
                'end_time' => $end_time, // +3 hour
                'user_id' => 'admin',
                'room_id' => $faker->randomElement($array = array (15304,15305)),
                'created_at'=> $dt ,
                'updated_at' => $dt
            ]);
        }


    }
}
