@extends('layout')

@section('hatterkep', asset('KM_kerdes_oldal.jpg'))
@section('content')

    <div class="image-wrapper-questions">

        <div class="content-on-image">
            <h1 style="text-align: center;">Kérdések amikre szavazni lehet:</h1>

            <div class="filter-container">
                <form action="{{ route('questions.index') }}" method="GET">
                    <label for="category_filter" class="filter-label">
                        Válassz kategóriát:
                    </label>
                    <select name="category_id" id="category_filter" onchange="this.form.submit()" 
                            class="category filter-select">
                        <option value="">-- Összes kategória --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="question-scroll-area">

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            @if($questions->isEmpty())
                <p style="text-align: center; margin-top: 20px;">Nincsenek kérdések a megadott feltételekkel.</p>
            @else
                <ul class="question-list">
                    @foreach($questions as $question)
                        <li class="question-card">
                            
                            <div class="question-header">
                                <strong class="question-title">
                                    {{ $question->question_name }}
                                </strong>

                                <span class="category-badge">
                                    {{ $question->category->category_name ?? 'Egyéb' }}
                                </span>
                            </div>

                            <div class="vote-container">
                                
                                <form action="{{ route('questions.vote', $question->id) }}" method="POST" class="vote-form">
                                    @csrf
                                    <input type="hidden" name="vote_value" value="1">
                                    
                                    <button type="submit" class="button">
                                        👍 Igen 
                                        <span class="vote-count text-success">
                                            {{ $question->yes_votes_count ?? 0 }}
                                        </span>
                                    </button>
                                </form>

                                <form action="{{ route('questions.vote', $question->id) }}" method="POST" class="vote-form-right">
                                    @csrf
                                    <input type="hidden" name="vote_value" value="0">
                                    
                                    <button type="submit" class="button">
                                        👎 Nem 
                                        <span class="vote-count text-danger">
                                            {{ $question->no_votes_count ?? 0 }}
                                        </span>
                                    </button>
                                </form>
                            </div>

                        </li>
                    @endforeach
                </ul>
            @endif

        </div> </div> @endsection