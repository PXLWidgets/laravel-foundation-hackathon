@php

    /**
     * @var \App\Contracts\ViewModels\QuestionInterface $question
     */

@endphp


@extends('layout.default', [
])

@section('content')

    <h1>Question: {{ $question->getContent() }}</h1>

    <form action="{{ route('questions.answer') }}" method="post">

        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->getId() }}">

        @foreach($question->getAnswers() as $answer)
            <input id="answer-{{ $answer->getId() }}" type="radio" name="answer_id" value="{{ $answer->getId() }}">
            <label for="answer-{{ $answer->getId() }}">{{ $answer->getContent() }}</label>
        @endforeach

        <button type="submit">Submit</button>
    </form>
@endsection
