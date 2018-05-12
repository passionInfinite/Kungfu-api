<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function batches() {
        return $this->hasMany(Batch::class);
    }

    public function ranks() {
        return $this->hasMany(Level::class);
    }
}
