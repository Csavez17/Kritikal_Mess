@extends('layout')

@section('content')
<h1>Új szavazást indítok</h1>

@error('question_name')
    <div class="alert alert-warning">{{ $message }}</div>
@enderror

<form action="{{ route('questions.store') }}" method="post">
    @csrf
    
    <label class="form-label" for="question_name">A kérdésem:</label>
    <textarea class="form-textarea" id="question_name" name="question_name"></textarea>

    <label class="form-label" for="category_id">Kategória</label>
    <select class="category" name="category_id" id="category_id">
        
        <option value="" disabled selected>Válassz kategóriát...</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach

    </select>
    <button class="button" type="submit">Mentés</button>
</form>
@endsection