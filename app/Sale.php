<?php

namespace KungFu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public const TYPES = [
        'Membership',
        'Tests',
        'Product',
        'Other'
    ];

    public static function getTypes() {
        return self::TYPES;
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
