<?php

namespace App\Livewire;

use App\Models\Check_Overall;
use App\Models\Personnel_Check;
use App\Models\preparation_checklist;
use App\Models\shipment_information;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Sections;
use App\Models\checklist as Checklist;
use App\Models\model_settings as ModelSettings;
use App\Models\OBA_Kit_Checklist;
use App\Models\Check_Items;
use App\Models\Similarities_Checking;
use Carbon\Carbon;

class SectionForm extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $sections = [];
    public $models = [];
    public $checklist;

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
        preparation_checklist::create([
            'checklist_id' => $new_id
        ]);
        OBA_Kit_Checklist::create([
            'checklist_id' => $new_id
        ]);
        shipment_information::create([
            'checklist_id' => $new_id
        ]);
        Check_Items::create([
            'checklist_id' => $new_id
        ]);
        Similarities_Checking::create([
            'checklist_id' => $new_id
        ]);
        Check_Overall::create([
            'checklist_id' => $new_id
        ]);
        Personnel_Check::create([
            'checklist_id' => $new_id
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
