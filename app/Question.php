<?php

namespace App;

use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\CourseInterface;
use App\Contracts\ViewModels\QuestionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

class Question extends Model implements QuestionInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order',
        'question',
        'type',
    ];

    /**
     * Get the Answer for the Question.
     */
    public function answers()
    {
        return $this->hasMany(\App\Answer::class);
    }

    /**
     * Get the Course for the Question.
     */
    public function course()
    {
        return $this->belongsTo(\App\Course::class);
    }

    public function getContent(): string
    {
        return $this->question;
    }

    /**
     * This is the nth question... (order)
     *
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return Collection|AnswerInterface[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers()->get();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCourse(): CourseInterface
    {
        return $this->course()->first();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCorrectAnswer(): AnswerInterface
    {
        return $this->getAnswers()->where('is_correct', true)->first();
    }

    public function resources(): MorphToMany
    {
        return $this->morphToMany(Resource::class, 'resourceable');
    }

}
