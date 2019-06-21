<?php

namespace App;

use Czim\Paperclip\Config\Steps\ResizeStep;
use Czim\Paperclip\Config\Variant;
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
        $this->hasAttachedFile('image', [
            'variants' => [
                Variant::make('thumb')->steps(ResizeStep::make()->square(100)),
            ],
        ]);

        parent::__construct($attributes);
    }

}
