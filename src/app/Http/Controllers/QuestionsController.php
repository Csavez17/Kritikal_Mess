<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = Question::all();
        return view('questions.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_name' => 'required|min:3|max:255',
            // 'category_id' => 'required|exists:categories,id',
        ],[
            'question_name.required' => 'A kérdés mező üresen nem menthető.',
            'question_name.min' => 'A kérdésnek legalább 3 karakter hosszúnak kell lennie.',
            'question_name.max' => 'A kérdés nem lehet hosszabb 255 karakternél.',
            // 'category_id.required' => 'A kategória mező üresen nem menthető.',
            // 'category_id.exists' => 'A kiválasztott kategória érvénytelen.',
        ]);

        $question = new Question();
        $question->question_name = $request->input('question_name');
        // $question->category_id = $request->input('category_id');
        $question->save();

        return redirect()->route('questions.index')->with('success', 'A kérdés sikeresen létrehozva.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
