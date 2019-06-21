@php

    /**
     * @var \App\Contracts\ViewModels\QuestionInterface $question
     */

@endphp


@extends('layout.default', [

])

@section('content')
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <hr>
    <div class="jumbotron">
        <h3 class="mb-4">{{ $question->getContent() }}</h3>
        <form action="{{ route('questions.answer') }}" method="post">

            {{ csrf_field() }}
            <input type="hidden" name="question_id" value="{{ $question->getId() }}">

            <ul class="list-unstyled">
                @foreach($question->getAnswers() as $answer)
                    <li class="mb-3">
                        <div class="custom-control custom-radio">
                            <input  class="custom-control-input" id="answer-{{ $answer->getId() }}" type="radio" name="answer_id" value="{{ $answer->getId() }}">
                            <label class="custom-control-label" for="answer-{{ $answer->getId() }}">{{ $answer->getContent() }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
            <button class="mt-4 btn btn-primary" type="submit">Verstuur</button>
        </form>
    </div>



@endsection
