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

        for ($i=0; $i < 200; $i++) {

            $start_time = $faker->time($format = 'H:i');
            $ex = explode( ':', $start_time );
            if( intval($ex[1]) > 30){
                $start_time = $ex[0].':'.'30' ;
            }else{
                $start_time = $ex[0].':'.'00';
            }
            $end_time = $start_time ;
            $end_time[1] = $end_time[1]+3 ;
            $randDate = $faker->dateTimeBetween($startDate='-1 years', $endDate='+0 years');
            DB::table('classroom_booking')->insert([
                'quan_nisit'=> $faker->numberBetween($min=20,$max=50),
                'note' => 'Test Database',
                'date' => $randDate,
                'start_time' => $start_time,
                'end_time' => $end_time, // +3 hour
                'subject_id'=> App\Models\Subject::all()->random(1)->entity_id,
                'user_id' => App\Models\User::all()->random(1)->entity_id,
                'room_id' => App\Models\Classroom::all()->random(1)->room_id,
                'created_at'=> $dt ,
                'updated_at' => $dt
            ]);
        }


    }
}
