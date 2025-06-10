<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_Items extends Model
{
    protected $table = 'check_items';
    protected $guarded = [];

    public function checklist()
    {
        return $this->belongsTo(checklist::class, 'checklist_id', 'id'); // foreign key
    }
}
