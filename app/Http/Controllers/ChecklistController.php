<?php

namespace App\Http\Controllers;

class ChecklistController extends Controller
{
    public function showChecklist($id)
    {
        return view('checklist', compact('id'));
    }
}
