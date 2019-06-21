<?php

use App\Answer;
use App\Course;
use App\Question;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstCourse = factory(Course::class)->create([
            'intro' => 'Om te oefenen beginnen we met een de oefenvraag.',
            'order' => 1,
        ]);

        $secondCourse = factory(Course::class)->create([
            'intro' => 'Installeren van Laravel',
            'order' => 2,
            'parent_id' => $firstCourse->id,
        ]);

        $thirdCourse = factory(Course::class)->create([
            'intro' => 'Eloquent',
            'order' => 3,
            'parent_id' => $secondCourse->id,
        ]);

        $fourthCourse = factory(Course::class)->create([
            'intro' => 'Laravel 5.8',
            'order' => 3,
            'parent_id' => $secondCourse->id,
        ]);

        $course_1_Question_1 = factory(Question::class)->create([
            'course_id' => $firstCourse->id,
            'order' => 1,
            'question' => 'Wat heb je nodig bij een hackathon?',
            'type' => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_1_Question_1,
            'answer' => 'Graafmachine',
            'is_correct' => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_1_Question_1,
            'answer' => 'Laptop',
            'is_correct' => true,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_1_Question_1,
            'answer' => 'Basketbal',
            'is_correct' => false,
        ]);

        $course_2_Question_1 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order' => 1,
            'question' => 'Hoe installeer je het gemakkelijkst de nieuwste versie van Laravel?',
            'type' => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_1,
            'answer' => 'composer require laravel',
            'is_correct' => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_1,
            'answer' => 'git clone git@github.com:laravel/laravel.git',
            'is_correct' => false,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_2_Question_1,
            'answer' => 'composer global require laravel/installer && laravel new app',
            'is_correct' => true,
        ]);

        $course_2_Question_2 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order' => 2,
            'question' => 'Welke build-in artisan command kan je afvuren om een server te starten?',
            'type' => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_2,
            'answer' => 'php bin/console server:start',
            'is_correct' => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_2,
            'answer' => 'php artisan serve',
            'is_correct' => true,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_2_Question_2,
            'answer' => 'php artisan server',
            'is_correct' => false,
        ]);

        $course_2_Question_3 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order' => 3,
            'question' => 'Waarom heb je een apllication key nodig?',
            'type' => 'MultipleChoice',
        ]);


        factory(Answer::class)->create([
            'question_id' => $course_2_Question_3,
            'answer' => 'Versleuteld sessies en wordt gebruikt bij encrypten van data',
            'is_correct' => true,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_3,
            'answer' => 'De app heeft een unieke identifier zodat het niet botst met andere laravel applicaties',
            'is_correct' => false,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_2_Question_3,
            'answer' => 'Versioning',
            'is_correct' => false,
        ]);


    }
}
