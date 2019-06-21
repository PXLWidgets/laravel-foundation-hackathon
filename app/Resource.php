<?php

namespace App;

use App\Contracts\ViewModels\ResourceInterface;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model implements ResourceInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url'
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
     * Get the Resourceables for the Resource.
     */
    public function resourceables()
    {
        return $this->hasMany(\App\Resourceable::class);
    }

    public function label(): ?string
    {
        return $this->title;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
