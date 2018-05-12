<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function children() {
        return $this->belongsToMany(Student::class, 'students','id','parent_id', 'id', 'child_id');
    }

    public function parents() {
        return $this->belongsToMany(Student::class, 'students', 'id', 'student_id', 'id', 'parent_id');
    }

    public function isParent() {
        return $this->parents()->count() == 0 ? false : true;
    }
}
