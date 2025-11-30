@extends('layout')

@section('content')
<h1>Új szavazást indítok</h1>

@error('question_name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('questions.store') }}" method="post">
    @csrf
    <label class= "form-label" for="question_name">A kérdésem:</label>
    <textarea class= "form-textarea" type="text" id="question_name" name="question_name"></textarea>
    <button class= "button" type="submit">Ment</button>
</form>
@endsection