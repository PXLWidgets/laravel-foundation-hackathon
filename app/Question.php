<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'order', 'question', 'type'
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

}