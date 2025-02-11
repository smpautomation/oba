<?php

namespace App\Livewire;

use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Sections;
use App\Models\checklist as Checklist;
use App\Models\model_settings as ModelSettings;
use Carbon\Carbon;

class SectionForm extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $sections = [];
    public $models = [];
    public $checklist = [];

    public $selectedSection = 0;
    public $selectedModel = 0;

    public function save()
    {

        $this->checklist = Checklist::latest()->first();
        if (isset($this->checklist->id)) {
            $new_id = $this->checklist->id + 1;
        }else{
            $new_id = Carbon::now()->format('Ym') . 1;
        }



        Checklist::create([
            'id' => $new_id,
            'model' => $this->selectedModel,
            'section' => $this->selectedSection
        ]);

        session()->flash('status', 'OBA Checklist serial is ' . $new_id);

        return redirect()->to('/checklist/'.$new_id);
    }
    public function mount()
    {
        $this->sections = Sections::all();
        $this->models = ModelSettings::all();
    }
    public function render()
    {
        return view('livewire.section-form');
    }
}
