<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checklist extends Model
{
    protected $table = 'checklist';
    protected $fillable = [
        'id',
        'model',
        'section',
        'preparationChecklist',
        'obakitchecklist',
        'shipmentInformation',
        'checkItems',
        'checkOverallCondition',
        'personnel'
    ];
}
