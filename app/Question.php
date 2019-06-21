<?php

namespace App;

use App\Contracts\ViewModels\AnswerInterface;
use App\Contracts\ViewModels\QuestionInterface;
use Illuminate\Database\Eloquent\Model;
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
     * Get the Answers for the Question.
     */
    public function answers()
    {
        return $this->hasMany(\App\Answers::class);
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
}
