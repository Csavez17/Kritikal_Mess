@extends('layout')

@section('content')

<p class="text">Ahol a kritikus többség dönt helyetted.</p>

<div class="button-group">

    <div class="button-block">
        <a href="{{ route('votes') }}" class="big_button">Szavazok</a>
    </div>

    <div class="button-block">
        <a href="{{ route('questions.create') }}" class="big_button">Kérdezek</a>
    </div>

</div>

@endsection