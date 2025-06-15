<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check_Overall_Item extends Model
{
    protected $table = 'check_overall_items';
    protected $fillable = [
        'check_overall_id', 'item_index', 'oqa', 'box_no', 'std_pack',
        'internal_fg_label', 'internal_specific_label', 'internal_carton_condition',
        'internal_magnet_pack', 'internal_magnet_cond', 'internal_dessicant',
        'internal_pack_orientation', 'internal_spacer', 'internal_sir',
        'external_serem', 'external_ship_label', 'external_vmi_label',
        'external_mc_label', 'external_delivery_sheet', 'external_specific_label',
        'external_flux_label', 'identity_tape', 'pick_list', 'remarks',
    ];
    public function checkOverall()
    {
        return $this->belongsTo(Check_Overall::class);
    }
}
