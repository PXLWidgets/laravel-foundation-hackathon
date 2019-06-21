<?php

use App\Answer;
use App\Course;
use App\Question;
use App\Resource;
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
            'intro'     => 'Installeren van Laravel',
            'order'     => 2,
            'parent_id' => $firstCourse->id,
        ]);

        $thirdCourse = factory(Course::class)->create([
            'intro'     => 'Eloquent',
            'order'     => 3,
            'parent_id' => $secondCourse->id,
        ]);

        $fourthCourse = factory(Course::class)->create([
            'intro'     => 'Laravel 5.8',
            'order'     => 3,
            'parent_id' => $secondCourse->id,
        ]);

        $course_1_Question_1 = factory(Question::class)->create([
            'course_id' => $firstCourse->id,
            'order'     => 1,
            'question'  => 'Wat heb je nodig bij een hackathon?',
            'type'      => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_1_Question_1,
            'answer'      => 'Graafmachine',
            'is_correct'  => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_1_Question_1,
            'answer'      => 'Laptop',
            'is_correct'  => true,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_1_Question_1,
            'answer'      => 'Basketbal',
            'is_correct'  => false,
        ]);

        $course_2_Question_1 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order'     => 1,
            'question'  => 'Hoe installeer je het gemakkelijkst de nieuwste versie van Laravel?',
            'type'      => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_1,
            'answer'      => 'composer require laravel',
            'is_correct'  => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_1,
            'answer'      => 'git clone git@github.com:laravel/laravel.git',
            'is_correct'  => false,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_2_Question_1,
            'answer'      => 'composer global require laravel/installer && laravel new app',
            'is_correct'  => true,
        ]);

        $course_2_Question_2 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order'     => 2,
            'question'  => 'Welke build-in artisan command kan je afvuren om een server te starten?',
            'type'      => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_2,
            'answer'      => 'php bin/console server:start',
            'is_correct'  => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_2,
            'answer'      => 'php artisan serve',
            'is_correct'  => true,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_2_Question_2,
            'answer'      => 'php artisan server',
            'is_correct'  => false,
        ]);

        $course_2_Question_3 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order'     => 3,
            'question'  => 'Waarom heb je een apllication key nodig?',
            'type'      => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_3,
            'answer'      => 'Versleuteld sessies en wordt gebruikt bij encrypten van data',
            'is_correct'  => true,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_2_Question_3,
            'answer'      => 'De app heeft een unieke identifier zodat het niet botst met andere laravel applicaties',
            'is_correct'  => false,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_2_Question_3,
            'answer'      => 'Versioning',
            'is_correct'  => false,
        ]);

        /***
         *  Cource 3
         */

        $course_3_Question_1 = factory(Question::class)->create([
            'course_id' => $thirdCourse->id,
            'order'     => 1,
            'question'  => 'Wat is eloquent?',
            'type'      => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_3_Question_1,
            'answer'      => 'Simpele database wrapper rond datamapping',
            'is_correct'  => false,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_3_Question_1,
            'answer'      => 'Simpele database wrapper rondom active record',
            'is_correct'  => false,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_3_Question_1,
            'answer'      => 'Simpele EAV wrapper',
            'is_correct'  => false,
        ]);

        $course_3_Question_2 = factory(Question::class)->create([
            'course_id' => $secondCourse->id,
            'order'     => 2,
            'question'  => 'Wat is een kortere manier om de volgende code te schrijven: ```$article = Article::find($article_id); $article->read_count++; $article->save();```',
            'type'      => 'MultipleChoice',
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_3_Question_2,
            'answer'      => '$article = Article::find($article_id); $article->increment(\'read_count\');',
            'is_correct'  => true,
        ]);

        factory(Answer::class)->create([
            'question_id' => $course_3_Question_2,
            'answer'      => '$article = Article::find($article_id); $article->plus(\'read_count\');',
            'is_correct'  => false,
        ]);
        factory(Answer::class)->create([
            'question_id' => $course_3_Question_2,
            'answer'      => '$article = Article::find($article_id); $article->read_count->plus()',
            'is_correct'  => false,
        ]);

        $resource = factory(Resource::class)->create([
            'title' => 'Meer over data encryptie (aca-it.nl)',
            'url' => 'https://www.aca-it.nl/nieuws/data-encryptie'
        ]);

        $resource1 = factory(Resource::class)->create([
            'title' => 'Meer over hashing (laravel)',
            'url' => 'https://laravel.com/docs/5.8/hashing'
        ]);

        $resource2 = factory(Resource::class)->create([
            'title' => 'Meer over artisan (laravel)',
            'url' => 'https://laravel.com/docs/5.8/artisan'
        ]);

        $resource3 = factory(Resource::class)->create([
            'title' => 'commandline webserver (php.net)',
            'url' => 'https://php.net/manual/en/features.commandline.webserver.php'
        ]);

        $resource4 = factory(Resource::class)->create([
            'title' => 'Meer over Homestead (laravel)',
            'url' => 'https://laravel.com/docs/5.8/homestead'
        ]);

        $resource5 = factory(Resource::class)->create([
            'title' => 'Meer over Eloquent (codeburst)',
            'url' => 'https://codeburst.io/how-to-use-laravels-eloquent-efficiently-d46f5c392ca8'
        ]);

        $resource6 = factory(Resource::class)->create([
            'title' => 'Meer over EAV',
            'url' => 'Https://en.m.wikipedia.org/wiki/Entity–attribute–value_model'
        ]);

        $resource7 = factory(Resource::class)->create([
            'title' => 'Active Wrapper vs Datamapper',
            'url' => 'https://www.thoughtfulcode.com/orm-active-record-vs-data-mapper/'
        ]);

        $secondCourse->resources()->sync([
            $resource->id,
            $resource1->id,
            $resource2->id,
            $resource3->id,
            $resource4->id,
        ]);

        $course_2_Question_2->resources()->sync([
            $resource2->id,
            $resource3->id,
            $resource4->id,
        ]);

        $course_2_Question_3->resources()->sync([
            $resource->id,
            $resource1->id,
        ]);

        $thirdCourse->resources()->sync([
            $resource5->id,
            $resource6->id,
            $resource7->id,
        ]);

        $course_3_Question_1->resources()->sync([
            $resource5->id,
            $resource6->id,
            $resource7->id,
        ]);

        factory(\App\Certificate::class)->create([
            'title' => 'Cursus intro gehaald',
            'description' => 'Jij bent nu in staat om te beginnen met de andere cursussen',
            'course_id' => $firstCourse->id,
        ]);

        factory(\App\Certificate::class)->create([
            'title' => 'Cursus Installeren gehaald',
            'description' => 'Jij bent nu in staat om Laravel te installeren',
            'course_id' => $secondCourse->id,
        ]);

        factory(\App\Certificate::class)->create([
            'title' => 'Cursus Eloquent gehaald',
            'description' => 'Jij bent nu in staat om eloquent te gebruiken',
            'course_id' => $thirdCourse->id,
        ]);

        factory(\App\Certificate::class)->create([
            'title' => 'Cursus Laravel 5.8 gehaald',
            'description' => 'Jij bent op de hoogte van Laravel 5.8',
            'course_id' => $thirdCourse->id,
        ]);
    }
}
