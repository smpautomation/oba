<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checklist extends Model
{
    protected $table = 'checklist';
    protected $guarded =[];

    public function prepCheck()
    {
        return $this->hasOne(preparation_checklist::class, 'checklist_id', 'id');
    }
    public function obaCheck()
    {
        return $this->hasOne(OBA_Kit_Checklist::class, 'checklist_id', 'id');
    }
    public function shipInfoCheck(){
        return $this->hasOne(shipment_information::class, 'checklist_id', 'id');
    }
}
