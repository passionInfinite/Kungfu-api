<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $guarded = [];

    public function batch() {
        return $this->belongsTo(Batch::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
