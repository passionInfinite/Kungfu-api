<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progresses';

    protected $guarded = [];

    public function toRank() {
        return $this->belongsTo(Rank::class);
    }

    public function fromRank() {
        return $this->belongsTo(Rank::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
