<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Similarities_Checking extends Model
{
    protected $table = 'similarities_checking';
    protected $guarded = [];

    public function checklist()
    {
        return $this->belongsTo(checklist::class, 'checklist_id', 'id'); // foreign key
    }
}
