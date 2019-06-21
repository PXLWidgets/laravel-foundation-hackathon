<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'answer', 'is_correct'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];    

    /**
     * Get the Question for the Answers.
     */
    public function question()
    {
        return $this->belongsTo(\App\Question::class);
    }

}