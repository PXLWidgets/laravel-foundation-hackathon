<?php

namespace App;

use Czim\Paperclip\Contracts\AttachableInterface;
use Czim\Paperclip\Model\PaperclipTrait;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model implements AttachableInterface
{
    use PaperclipTrait;

    protected $fillable = [
        'title'
    ];

    public function __construct(array $attributes = [])
    {


        parent::__construct($attributes);
    }


}
