<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_Overall extends Model
{
    protected $table = 'check_overall';
    protected $guarded = [];

    public function checklist()
    {
        return $this->belongsTo(checklist::class, 'checklist_id', 'id'); // foreign key
    }
    public function items()
    {
        return $this->hasMany(Check_Overall_Item::class, 'check_overall_id', 'id');
    }
    public function pallets()
    {
        return $this->hasMany(Check_Overall_Pallet::class, 'check_overall_id', 'id');
    }

    protected $casts = [
        'expiration_date' => 'date',
    ];
}
