<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_Overall_Pallet extends Model
{
    protected $table = 'check_overall_pallets';
    protected $guarded = [];

    public function checkOverall()
    {
        return $this->belongsTo(Check_Overall::class);
    }
}
