<?php

namespace KungFu;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Faculty extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $table = 'faculties';

    protected $hidden = ['password'];
}
