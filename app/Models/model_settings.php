<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'model_name',
        'scanned_qr_pc',
        'sir_qs',
        'vmi_mn',
        'sir_mc',
        'vmi_mc',
        'specific_label_mc',
        'picklist_pn',
        'sir_pn',
        'vmi_pn',
        'sir_po',
        'vmi_po',
        'specific_label_po'
    ];
    protected $casts = [
        'scanned_qr_pc' => 'boolean',
        'sir_qs' => 'boolean',
        'vmi_mn' => 'boolean',
        'sir_mc' => 'boolean',
        'vmi_mc' => 'boolean',
        'specific_label_mc' => 'boolean',
        'picklist_pn' => 'boolean',
        'sir_pn' => 'boolean',
        'vmi_pn' => 'boolean',
        'sir_po' => 'boolean',
        'vmi_po' => 'boolean',
        'specific_label_po' => 'boolean',
    ];
}
