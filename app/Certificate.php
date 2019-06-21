<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'course_id'
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
     * Get the Course for the Certificate.
     */
    public function course()
    {
        return $this->belongsTo(\App\Course::class);
    }


    /**
     * Get the Users for the Certificate.
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

}