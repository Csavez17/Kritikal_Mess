@extends('layout')

@section('content')
<h1>Kérdések amikre szavazni lehet:</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($questions->isEmpty())
    <p>Nincsenek kérdések.</p>
@else
    <ul>
        @foreach($questions as $question)
            <li>
                <strong>{{ $question->id }} - {{ $question->question_name }}</strong>
            </li>
            
        @endforeach
    </ul>
@endif
@endsection
