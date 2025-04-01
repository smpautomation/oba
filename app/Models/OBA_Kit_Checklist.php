<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OBA_Kit_Checklist extends Model
{
    protected $table = 'o_b_a__kit__checklists';
    protected $guarded = [];

    public function checklist()
    {
        return $this->belongsTo(checklist::class, 'checklist_id', 'id'); // foreign key
    }
}
