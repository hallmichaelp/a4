<?php

use Illuminate\Database\Seeder;
use App\DifficultyLevel;

class DifficultyLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('difficulty_levels')->insert([
          'created_at'=>Carbon\Carbon::now()->toDateTimeString(),
          'updated_at'=>Carbon\Carbon::now()->toDateTimeString(),
          'difficulty_level'=>'Easy'
        ]);

        DB::table('difficulty_levels')->insert([
          'created_at'=>Carbon\Carbon::now()->toDateTimeString(),
          'updated_at'=>Carbon\Carbon::now()->toDateTimeString(),
          'difficulty_level'=>'Moderate'
        ]);

        DB::table('difficulty_levels')->insert([
          'created_at'=>Carbon\Carbon::now()->toDateTimeString(),
          'updated_at'=>Carbon\Carbon::now()->toDateTimeString(),
          'difficulty_level'=>'Hard'
        ]);
    }
}
