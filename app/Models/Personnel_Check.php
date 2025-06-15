<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel_Check extends Model
{
    protected $table = 'personnel';
    protected $guarded = [];

    public function checklist()
    {
        return $this->belongsTo(checklist::class, 'checklist_id', 'id'); // foreign key
    }
}
