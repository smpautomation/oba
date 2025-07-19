<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'LogName',
        'LogType',
        'action',
        'description',
    ];
}
