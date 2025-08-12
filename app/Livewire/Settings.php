<?php
namespace App\Livewire;

use App\Models\Log as ModelsLog;
use App\Models\model_settings;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;
    public $models;
    public $sections;

    //properties for add/remove section
    public $selectedModelAddRemove = '';
    public $searchTerm = '';
    public $filteredModels;
    public $totalModels;
    public $showAddForm = false;
    public $newModelName = '';
    public $section_id;

    public $selectedSectionAddRemove = '';
    public $searchTermSection = '';
    public $filteredSections;
    public $totalSections;
    public $showAddFormSection = false;
    public $newSectionName = '';

    // properties for model settings
    public $selectedModel = '';
    public $scanned_qr_pc = true;
    public $sir_qs = true;
    public $vmi_mn = true;
    public $sir_mn = true;
    public $sir_mc = true;
    public $vmi_mc = true;
    public $specific_label_mc = true;
    public $sir_pn = true;
    public $vmi_pn = true;
    public $sci_label_pn = true;
    public $qr_qa_pn = true;
    public $qr_mc_pn = true;
    public $qr_mgtz_pn = true;
    public $sir_po = true;
    public $vmi_po = true;
    public $specific_label_po = true;


    //properties for section visibility
    public $showAddRemove = false;
    public $showChecklistConfiguration = false;
    public $showSystemLogs = false;

    //properties for system logs
    // Add these properties at the top of your Settings class
    public $searchTermLogs = '';
    public $startDate = '';
    public $endDate = '';
    public $logTypeFilter = '';
    public $logNameFilter = '';
    public $perPage = 20;

    public $userIP;

    public function mount()
    {
        $this->models = model_settings::all();
        $this->totalModels = $this->models->count();
        $this->filteredModels = $this->models;
        $this->sections = Sections::all();
        $this->totalSections = $this->sections->count();
        $this->filteredSections = $this->sections;
        $this->userIP = $this->getClientIpAddress(request());
    }

    private function getClientIpAddress(Request $request): string
    {
        // Check for various headers that might contain the real IP
        $ipKeys = [
            'HTTP_CF_CONNECTING_IP',     // CloudFlare
            'HTTP_X_REAL_IP',            // Nginx proxy
            'HTTP_X_FORWARDED_FOR',      // Load balancer/proxy
            'HTTP_X_FORWARDED',          // Proxy
            'HTTP_X_CLUSTER_CLIENT_IP',  // Cluster
            'HTTP_CLIENT_IP',            // Proxy
            'REMOTE_ADDR'                // Standard
        ];

        foreach ($ipKeys as $key) {
            if (array_key_exists($key, $_SERVER) && !empty($_SERVER[$key])) {
                $ips = explode(',', $_SERVER[$key]);
                $ip = trim($ips[0]);

                // Validate IP address
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        // Fallback to request IP
        return $request->ip();
    }

    public function showAddRemoveSection()
    {
        $this->showAddRemove = !$this->showAddRemove;
        $this->showChecklistConfiguration = false; // Hide other sections
        $this->showSystemLogs = false; // Hide other sections
    }

    public function showChecklistConfigurationSection()
    {
        $this->showChecklistConfiguration = !$this->showChecklistConfiguration;
        $this->showAddRemove = false; // Hide other sections
        $this->showSystemLogs = false; // Hide other sections
    }

    public function showSystemLogsSection(){
        $this->showSystemLogs = !$this->showSystemLogs;
        $this->showAddRemove = false; // Hide other sections
        $this->showChecklistConfiguration = false; // Hide other sections
    }

    public function updatedSelectedModel($value)
    {
        if (!empty($value)) {
            $modelData = model_settings::where('model_name', $value)->first();

            if ($modelData) {
                $this->scanned_qr_pc = (bool) $modelData->scanned_qr_pc;
                $this->sir_qs = (bool) $modelData->sir_qs;
                $this->vmi_mn = (bool) $modelData->vmi_mn;
                $this->sir_mn = (bool) $modelData->sir_mn;
                $this->sir_mc = (bool) $modelData->sir_mc;
                $this->vmi_mc = (bool) $modelData->vmi_mc;
                $this->specific_label_mc = (bool) $modelData->specific_label_mc;
                $this->sir_pn = (bool) $modelData->sir_pn;
                $this->vmi_pn = (bool) $modelData->vmi_pn;
                $this->sci_label_pn = (bool) $modelData->sci_label_pn;
                $this->qr_qa_pn = (bool) $modelData->qr_qa_pn;
                $this->qr_mc_pn = (bool) $modelData->qr_mc_pn;
                $this->qr_mgtz_pn = (bool) $modelData->qr_mgtz_pn;
                $this->sir_po = (bool) $modelData->sir_po;
                $this->vmi_po = (bool) $modelData->vmi_po;
                $this->specific_label_po = (bool) $modelData->specific_label_po;
            }
        } else {
            $this->resetSettings();
        }

        $this->render();
    }

    private function resetSettings()
    {
        $this->scanned_qr_pc = true;
        $this->sir_qs = true;
        $this->vmi_mn = true;
        $this->sir_mn = true;
        $this->sir_mc = true;
        $this->vmi_mc = true;
        $this->specific_label_mc = true;
        $this->sir_pn = true;
        $this->vmi_pn = true;
        $this->sci_label_pn = true;
        $this->qr_qa_pn = true;
        $this->qr_mc_pn = true;
        $this->qr_mgtz_pn = true;
        $this->sir_po = true;
        $this->vmi_po = true;
        $this->specific_label_po = true;
    }

    public function saveConfiguration()
    {

        if (!empty($this->selectedModel)) {
            $modelData = model_settings::where('model_name', $this->selectedModel)->first();

            if ($modelData) {
                $modelData->update([
                    'scanned_qr_pc' => $this->scanned_qr_pc,
                    'sir_qs' => $this->sir_qs,
                    'vmi_mn' => $this->vmi_mn,
                    'sir_mn' => $this->sir_mn,
                    'sir_mc' => $this->sir_mc,
                    'vmi_mc' => $this->vmi_mc,
                    'specific_label_mc' => $this->specific_label_mc,
                    'sir_pn' => $this->sir_pn,
                    'vmi_pn' => $this->vmi_pn,
                    'sci_label_pn' => $this->sci_label_pn,
                    'qr_qa_pn' => $this->qr_qa_pn,
                    'qr_mc_pn' => $this->qr_mc_pn,
                    'qr_mgtz_pn' => $this->qr_mgtz_pn,
                    'sir_po' => $this->sir_po,
                    'vmi_po' => $this->vmi_po,
                    'specific_label_po' => $this->specific_label_po,
                ]);

                session()->flash('message', 'Configuration saved successfully!');
                ModelsLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'info',
                    'action' => 'save_configuration',
                    'description' => '{"specific_action":"Update Selected Model '.$this->selectedModel.'", "ip address":"'. $this->userIP .'"}'
                ]);
            } else {
                session()->flash('error', 'Model not found in database!');
                ModelsLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'error',
                    'action' => 'save_configuration',
                    'description' => '{"specific_action":"Selected Model '.$this->selectedModel.' Not Found", "ip address":"'. $this->userIP .'"}'
                ]);
            }
        } else {
            session()->flash('error', 'Please select a model first!');
            ModelsLog::create([
                'LogName' => 'User Action',
                'LogType' => 'warning',
                'action' => 'save_configuration',
                'description' => '{"specific_action":"Attempted to save without selectiung model", "ip address":"'. $this->userIP .'"}'
            ]);
        }
    }

    public function updatedSearchTerm()
    {
        $this->filterModels();
    }

    public function filterModels()
    {
        if (empty($this->searchTerm)) {
            $this->filteredModels = $this->models;
        } else {
            $this->filteredModels = $this->models->filter(function ($model) {
                return stripos($model->model_name, $this->searchTerm) !== false;
            });
        }
    }

    public function selectModel($modelName)
    {
        $this->selectedModelAddRemove = $modelName;
        $this->searchTerm = '';
        $this->filteredModels = $this->models;

        // Emit event to parent component if needed

    }

    public function clearSelection()
    {
        $this->selectedModelAddRemove = '';
        $this->searchTerm = '';
        $this->filteredModels = $this->models;

    }

    public function deleteModel()
    {
        if ($this->selectedModelAddRemove) {
            // Find and delete the model from database
            $model = model_settings::where('model_name', $this->selectedModelAddRemove)->first();
            if ($model) {
                $model->delete();

                // Refresh the models list
                $this->models = model_settings::orderBy('model_name')->get();
                $this->totalModels = $this->models->count();
                $this->filteredModels = $this->models;

                // Clear selection after deletion
                $this->selectedModelAddRemove = '';
                $this->searchTerm = '';

                // Show success message
                session()->flash('message', 'Model deleted successfully!');
                ModelsLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'info',
                    'action' => 'add/remove_configuration',
                    'description' => '{"specific_action":"Delete Selected Model '.$this->selectedModelAddRemove.'", "ip address":"'. $this->userIP .'"}'
                ]);
            }
        }
    }

    public function addModel()
    {
        $this->validate([
            'section_id' => 'required|integer',
            'newModelName' => 'required|string|max:255|unique:model_settings,model_name'
        ]);

        // Create new model
        model_settings::create([
            'section_id' => $this->section_id,
            'model_name' => $this->newModelName
        ]);

        // Refresh the models list
        $this->models = model_settings::orderBy('model_name')->get();
        $this->totalModels = $this->models->count();
        $this->filteredModels = $this->models;



        // Show success message
        session()->flash('messageModel', 'Model added successfully!');
        ModelsLog::create([
            'LogName' => 'User Action',
            'LogType' => 'info',
            'action' => 'add/remove_configuration',
            'description' => '{"specific_action":"Add Model '.$this->newModelName.'", "ip address":"'. $this->userIP .'"}'
        ]);

        // Reset form
        $this->newModelName = '';
        $this->showAddForm = false;
    }

    public function cancelAdd()
    {
        $this->newModelName = '';
        $this->showAddForm = false;
    }
    public function updatedSearchTermSection()
    {
        $this->filterSections();
    }

    public function filterSections()
    {
        if (empty($this->searchTermSection)) {
            $this->filteredSections = $this->sections;
        } else {
            $this->filteredSections = $this->sections->filter(function ($section) {
                return stripos($section->section, $this->searchTermSection) !== false;
            });
        }
    }

    public function selectSection($sectionName)
    {
        $this->selectedSectionAddRemove = $sectionName;
        $this->searchTermSection = '';
        $this->filteredSections = $this->sections;

    }

    public function clearSelectionSection()
    {
        $this->selectedSectionAddRemove = '';
        $this->searchTermSection = '';
        $this->filteredSections = $this->sections;

    }

    public function deleteSection()
    {
        if ($this->selectedSectionAddRemove) {
            $section = Sections::where('section', $this->selectedSectionAddRemove)->first();
            if ($section) {
                $section->delete();

                $this->sections = Sections::orderBy('section')->get();
                $this->totalSections = $this->sections->count();
                $this->filteredSections = $this->sections;

                $this->selectedSectionAddRemove = '';
                $this->searchTermSection = '';

                // Show success message
                session()->flash('message', 'Section deleted successfully!');
                ModelsLog::create([
                    'LogName' => 'User Action',
                    'LogType' => 'info',
                    'action' => 'add/remove_configuration',
                    'description' => '{"specific_action":"Delete Section '.$this->selectedSectionAddRemove.'", "ip address":"'. $this->userIP .'"}'
                ]);
            }
        }
    }

    public function addSection()
    {
        $this->validate([
            'newSectionName' => 'required|string|max:15|unique:section,section'
        ]);

        Sections::create([
            'section' => $this->newSectionName
        ]);

        $this->sections = Sections::orderBy('section')->get();
        $this->totalSections = $this->sections->count();
        $this->filteredSections = $this->sections;

        $this->newSectionName = '';
        $this->showAddFormSection = false;

        // Show success message
        session()->flash('message', 'Section added successfully!');
        ModelsLog::create([
            'LogName' => 'User Action',
            'LogType' => 'info',
            'action' => 'add/remove_configuration',
            'description' => '{"specific_action":"Add Section '.$this->newSectionName.'", "ip address":"'. $this->userIP .'"}'
        ]);
    }

    public function cancelAddSection()
    {
        $this->newSectionName = '';
        $this->showAddFormSection = false;
    }

    protected function rules()
    {
        return [
            'newModelName' => 'required|string|max:8|unique:model_settings,model_name',
            'section_id' => 'required|integer',
            'newSectionName' => 'required|string|max:15|unique:section,section'
        ];
    }

    protected function messages()
    {
        return [
            'newModelName.required' => 'Model name is required.',
            'newModelName.unique' => 'This model name already exists.',
            'newModelName.max' => 'Model name cannot exceed 8 characters.',
            'section_id.required' => 'Please pick a section',
            'newSectionName.required' => 'Section name is required.',
            'newSectionName.unique' => 'This section name already exists.',
            'newSectionName.max' => 'Section name cannot exceed 15 characters.'
        ];
    }

    //logs
    public function getSystemLogsProperty()
    {
        $query = ModelsLog::query();

        // Search filter
        if (!empty($this->searchTerm)) {
            $query->where('description', 'like', '%' . $this->searchTerm . '%');
        }

        // Log type filter
        if (!empty($this->logTypeFilter)) {
            $query->where('LogType', $this->logTypeFilter);
        }

        // Log name filter
        if (!empty($this->logNameFilter)) {
            $query->where('LogName', $this->logNameFilter);
        }

        // Date range filter
        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        return $query->orderBy('created_at', 'desc')
                    ->paginate($this->perPage);
    }

    public function clearFilters()
    {
        $this->searchTermLogs = '';
        $this->startDate = '';
        $this->endDate = '';
        $this->logTypeFilter = '';
        $this->logNameFilter = '';
        $this->resetPage();
    }


    public function render()
    {

        return view('livewire.settings');
    }

}
