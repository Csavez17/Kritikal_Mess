<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['question_id', 'vote_value'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
