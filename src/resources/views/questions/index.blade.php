@extends('layout')

@section('content')
<h1>Kérdések amikre szavazni lehet:</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

/* FLEXBOX BEÁLLÍTÁS KELL!!! */

@if($questions->isEmpty())
    <p>Nincsenek kérdések.</p>
@else
    <ul>
        @foreach($questions as $question)
            <li class="mb-3">
                <strong>{{ $question->question_name }}</strong>

                <form action="{{ route('questions.vote', $question->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="vote_value" value="1">
                    <button type="submit" class="btn btn-success btn-sm">👍 Igen</button>
                </form>

                <form action="{{ route('questions.vote', $question->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="vote_value" value="0">
                    <button type="submit" class="btn btn-danger btn-sm">👎 Nem</button>
                </form>
            </li>
        @endforeach
    </ul>
@endif
@endsection