<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        'model_name',
        'mc_checklist_pc',
        'scanned_qr_pc',
        'sir_qs',
        'vmi_mn',
        'sir_mn',
        'sir_mc',
        'vmi_mc',
        'specific_label_mc',
        'sir_pn',
        'vmi_pn',
        'sci_label_pn',
        'qr_qa_pn',
        'qr_mc_pn',
        'qr_mgtz_pn',
        'sir_po',
        'vmi_po',
        'specific_label_po',
        'sci_label_po'
    ];
    protected $casts = [
        'mc_checklist_pc' => 'boolean',
        'scanned_qr_pc' => 'boolean',
        'sir_qs' => 'boolean',
        'vmi_mn' => 'boolean',
        'sir_mn' => 'boolean',
        'sir_mc' => 'boolean',
        'vmi_mc' => 'boolean',
        'specific_label_mc' => 'boolean',
        'sir_pn' => 'boolean',
        'vmi_pn' => 'boolean',
        'sci_label_pn' => 'boolean',
        'qr_qa_pn' => 'boolean',
        'qr_mc_pn' => 'boolean',
        'qr_mgtz_pn' => 'boolean',
        'sir_po' => 'boolean',
        'vmi_po' => 'boolean',
        'specific_label_po' => 'boolean',
        'sci_label_po' => 'boolean',
    ];

    public function getSection(){
        return $this->belongsTo(Sections::class, 'section_id', 'id');
    }
}
