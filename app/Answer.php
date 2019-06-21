<?php

namespace App;

use App\Contracts\ViewModels\AnswerInterface;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model implements AnswerInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer',
        'is_correct',
    ];

    /**
     * Get the Question for the Answer.
     */
    public function question()
    {
        return $this->belongsTo(\App\Question::class);
    }

    public function isCorrect(): bool
    {
        return $this->is_correct;
    }

    public function getContent(): string
    {
        return $this->answer;
    }
}
