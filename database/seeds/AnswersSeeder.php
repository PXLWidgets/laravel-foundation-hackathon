<?php

use App\Answers;
use Illuminate\Database\Seeder;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Answers::class, 10)->create();
    }
}