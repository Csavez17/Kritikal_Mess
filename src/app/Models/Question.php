<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function yesVotes(): int
    {
        return $this->votes()->where('vote_value', true)->count();
    }

    public function noVotes(): int
    {
        return $this->votes()->where('vote_value', false)->count();
    }
}
