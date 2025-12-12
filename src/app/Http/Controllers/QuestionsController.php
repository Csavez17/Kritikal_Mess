<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Előkészítjük a lekérdezést (még nem kérjük le az adatot)
        // A 'with' előre betölti a kategória adatait (hogy ne legyen lassú)
        $query = Question::withCount(['yesVotes', 'noVotes'])->with('category');

        // 2. SZŰRÉS LOGIKA: Ha van kiválasztva kategória...
        if ($request->filled('category_id')) {
            // ...akkor csak azokat kérjük le, ahol egyezik az ID
            $query->where('category_id', $request->input('category_id'));
        }

        // 3. Most futtatjuk le a lekérdezést
        $questions = $query->latest()->get();

        // 4. Lekérjük az összes kategóriát a legördülő menühöz
        $categories = Category::all();

        // 5. Átadjuk a kérdéseket ÉS a kategóriákat is a nézetnek
        return view('questions.index', compact('questions', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_name' => 'required|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
        ],[
            'question_name.required' => 'A kérdés mező üresen nem menthető.',
            'question_name.min' => 'A kérdésnek legalább 3 karakter hosszúnak kell lennie.',
            'question_name.max' => 'A kérdés nem lehet hosszabb 255 karakternél.',
            'category_id.required' => 'A kategória mező üresen nem menthető.',
            'category_id.exists' => 'A kiválasztott kategória érvénytelen.',
        ]);

        $question = new Question();
        $question->question_name = $request->input('question_name');
        $question->category_id = $request->input('category_id');
        $question->user_id = Auth::id();
        $question->save();

        return redirect()->route('questions.index')->with('success', 'A kérdés sikeresen létrehozva.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $yesVotes = $question->yesVotes();
        $noVotes = $question->noVotes();
        return view('questions.show', [
            'question' => $question,
            'yesVotes' => $yesVotes,
            'noVotes' => $noVotes
        ]);
    }

    /**
     * Kérdés törlése (Csak adminnak)
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('success', 'A kérdés törölve lett.');
    }
}
