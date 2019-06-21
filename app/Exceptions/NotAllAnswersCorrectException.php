<?php

namespace App\Exceptions;

use Throwable;

class NotAllAnswersCorrectException extends \Exception
{
    /**
     * @var array
     */
    protected $wrongQuestions;

    public function __construct($message = "", $wrongQuestions = [], $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->wrongQuestions = $wrongQuestions;
    }

    public function getWrongQuestions(): array
    {
        return $this->wrongQuestions;
    }

}
