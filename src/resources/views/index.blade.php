@extends('layout')

@section('content')
<h1>Főoldal</h1>

<div>
    <a href="{{ route('votes') }}">Szavazok</a>
    <a href="{{ route('questions.create') }}" >Új szavazást indítok</a>
</div>

@endsection