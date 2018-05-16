<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function children() {
        return $this->belongsToMany(Student::class, 'parents_children','parent_id','child_id', 'id', 'id');
    }

    public function parents() {
        return $this->belongsToMany(Student::class, 'parents_children', 'child_id', 'parent_id', 'id', 'id');
    }

    public function isParent() {
        return $this->parents()->count() == 0 ? false : true;
    }

    public function sales() {
        return $this->hasMany(Sale::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public function rank() {
        return $this->belongsTo(Rank::class);
    }

    public function progress() {
        return $this->hasMany(Progress::class);
    }
}
