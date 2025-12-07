@extends('layout')

@section('content')

    <style>
        .image-wrapper {
            display: block !important; /* Kikapcsolja a középre igazítást */
            padding-top: 120px;        /* Ezzel állítod be, mennyi hely legyen FENT (a logó alatt) */
            overflow-y: auto;          /* Engedélyezi a görgetést, ha nem férne ki */
        }
    </style>

    <div style="padding-bottom: 50px; text-align: center; max-width: 600px; margin: 0 auto;">
        
     
        <div style="margin-bottom: 40px;">
            @include('profile.partials.update-profile-information-form')
        </div>

        <hr style="border-color: rgba(255,255,255,0.2); margin: 30px 0; width: 80%; margin-left: auto; margin-right: auto;">

        <div style="margin-bottom: 40px;">
            @include('profile.partials.update-password-form')
        </div>

        <hr style="border-color: rgba(255,255,255,0.2); margin: 30px 0; width: 80%; margin-left: auto; margin-right: auto;">

        <div style="margin-bottom: 50px;">
            @include('profile.partials.delete-user-form')
        </div>

    </div>

@endsection

