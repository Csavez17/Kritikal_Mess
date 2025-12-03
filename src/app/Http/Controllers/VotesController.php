<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Vote;

class VotesController extends Controller
{
    /**
     * Szavazat mentése
     */
    public function store(Request $request, Question $question)
    {
        $user = Auth::user();

        if ($user) {
            $alreadyVoted = Vote::where('question_id', $question->id)
                                ->where('user_id', $user->id)
                                ->exists();
        } else {
            $alreadyVoted = session()->has('voted_' . $question->id);
        }

        if ($alreadyVoted) {
            return back()->with('error', 'Erre a kérdésre már szavaztál!');
        }

        $request->validate([
            'vote_value' => 'required|boolean',
        ]);

        $vote = new Vote();
        $vote->question_id = $question->id;
        $vote->vote_value = $request->input('vote_value');
        
        $vote->user_id = $user ? $user->id : null; 
        
        $vote->save();

        session()->put('voted_' . $question->id, true);

        return back()->with('success', 'Köszönjük a szavazatodat!');
    }
}
