<?php

namespace App\Http\Controllers;

class PrintableChecklistController extends Controller
{
    public function receiveID($checklist_ID)
    {
        return view('printableChecklist', compact('checklist_ID'));
    }
}
