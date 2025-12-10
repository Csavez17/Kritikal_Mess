<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; /* új csomag */
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory; /* csomag használat*/

    protected $fillable = ['question_name', 'category_id', 'user_id'];

// Alap kapcsolat az összes szavazatra
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // JAVÍTOTT RÉSZ:
    // 1. Kivettem a ": int" típust a sor végéről
    // 2. Kivettem a "->count()" hívást a végéről
    // Így ez most egy Kapcsolatot ad vissza, nem egy számot.
    
    public function yesVotes()
    {
        return $this->hasMany(Vote::class)->where('vote_value', 1);
    }

    public function noVotes()
    {
        return $this->hasMany(Vote::class)->where('vote_value', 0);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
