<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'intro',
        'order',
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
     * Get the Questions for the Course.
     */
    public function questions()
    {
        return $this->hasMany(\App\Question::class);
    }


    /**
     * Get the Certificates for the Course.
     */
    public function certificates()
    {
        return $this->hasMany(\App\Certificate::class);
    }

    public function resource(): MorphToMany
    {
        return $this->morphToMany(Resource::class, 'resourceable');
    }

}
