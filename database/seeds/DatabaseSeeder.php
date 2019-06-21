<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(CourseSeeder::class);
//        $this->call(ResourceSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(QuestionSeeder::class);
//        $this->call(AnswersSeeder::class);
//        $this->call(ResourceableSeeder::class);
//        $this->call(CertificateSeeder::class);
        $this->call(ContentSeeder::class);
    }
}
