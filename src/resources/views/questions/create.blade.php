@extends('layout')

@section('content')
<h1>Új szavazást indítok</h1>

@error('question_name')
<div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('questions.store') }}" method="post">
    @csrf
    <label for="question_name">Kérdés:</label>
    <input type="text" id="question_name" name="question_name">
    <button type="submit">Ment</button>
</form>
@endsection