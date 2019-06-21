<?php

namespace App;

use App\Contracts\ViewModels\CourseInterface;
use App\Contracts\ViewModels\QuestionInterface;
use App\Contracts\ViewModels\ResourceInterface;
use Czim\Paperclip\Config\Steps\ResizeStep;
use Czim\Paperclip\Config\Variant;
use Czim\Paperclip\Contracts\AttachableInterface;
use Czim\Paperclip\Model\PaperclipTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

class Course extends Model implements CourseInterface, AttachableInterface
{
    use PaperclipTrait;

    public function __construct(array $attributes = [])
    {
        $this->hasAttachedFile('image', [
            'variants' => [
                Variant::make('thumb')->steps(ResizeStep::make()->square(100)),
            ],
        ]);

        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'intro',
        'order',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(\App\Question::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(\App\Certificate::class);
    }

    public function resources(): MorphToMany
    {
        return $this->morphToMany(Resource::class, 'resourceable');
    }

    public function getImageUrl(): string
    {
        return $this->image->url('thumb');
    }

    public function getImageAlt(): ?string
    {
        return $this->getTitle();
    }

    public function getPageUrl(): string
    {
        return route('courses.show', ['course' => $this->id]);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getQuestionCount(): int
    {
        return $this->questions()->count();
    }

    public function getDescription(): string
    {
        return $this->intro;
    }

    /**
     * @return Collection|ResourceInterface[]
     */
    public function getResources(): Collection
    {
        return $this->resources()->get();
    }

    /**
     * @return Collection|QuestionInterface[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions()->get();
    }

    public function isCompletedByUser(): bool
    {
        /** @var User $user */
        $user = \Auth::user();
        return $user->courses()->has($this->id);
    }
}
