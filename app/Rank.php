<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $guarded = [];

    public function level() {
        return $this->belongsTo(Level::class);
    }
}
