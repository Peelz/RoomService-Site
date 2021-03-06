<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subject_entity')->delete();

        $faker = Faker\Factory::create();
        $timestamps = Carbon\Carbon::now();

        for ($i=0; $i < 100 ; $i++) {
            DB::table('subject_entity')->insert([
                'sub_id' => $faker->randomNumber($nbDigits = 8), // 79907610
                'name' => $faker->text($maxNbChars = 50),
                'created_at' => $timestamps,
                'updated_at' => $timestamps
            ]);
        }

    }
}
