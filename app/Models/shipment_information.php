<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipment_information extends Model
{
    protected $table = 'shipment_information';
    protected $guarded = [];

    public function checklist()
    {
        return $this->belongsTo(checklist::class, 'checklist_id', 'id'); // foreign key
    }
}
