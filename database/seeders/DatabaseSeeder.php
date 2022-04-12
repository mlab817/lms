<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(2)->create();
         Teacher::factory(5)->create();

         $subjects = ['English','Math','Science','Filipino'];

         foreach ($subjects as $subject) {
             Subject::create([
                 'name' => $subject,
                 'teacher_id' => Teacher::all()->random()->first()->id,
                 'uuid' => Str::uuid(),
             ]);
         }

         Lesson::factory(3)->create();
    }
}
