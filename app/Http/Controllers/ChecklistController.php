<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function showChecklist($id)
    {
        return view('checklist', compact('id'));
    }
}
