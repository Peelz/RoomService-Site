<?php

use Illuminate\Database\Seeder;

class SubjectSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_section')->delete();

        $faker = Faker\Factory::create();
        $timestamps = Carbon\Carbon::now();

        $subjects = \App\Models\Subject::all() ;
        $instuctor = \App\Models\Instuctor::all() ;

        foreach ($subjects as $subject) {
            DB::table('subject_entity')->insert([
                'sub_id' => $subject->entity_id, // 79907610
                'section' => $faker->numerify('80#'),
                'instructor_id' => $instuctor->entity_id,

                'created_at' => $timestamps,
                'updated_at' => $timestamps
            ]);
        }
    }
}
