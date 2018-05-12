<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $guarded = [];

    protected $table = 'batches';

    public function level() {
        return $this->belongsTo(Level::class);
    }
}
