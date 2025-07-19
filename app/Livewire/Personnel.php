<?php
namespace App\Livewire;
use App\Models\checklist;
use App\Models\Personnel_Check;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use App\Models\Log as AppLog;
use Illuminate\Http\Request;

class Personnel extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $inputs = [];
    public $inputStatus = [];
    public $showQrModal = false;
    public $currentQrField = null; // Track which field is being scanned
    
    protected $listeners = ['qrScanned' => 'handleQrScanned'];
    public $userIP;
    public function mount($checklist_id){
        $this->userIP = $this->getClientIpAddress(request());
        try{
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = checklist::find($checklist_id);
        
            $this->inputs = [
                'shipping_pic' => $this->checklistInfo->personnelCheck->shipping_pic ?? null,
                'date' => $this->checklistInfo->personnelCheck->date ?? null,
                'oba_checked_by' => $this->checklistInfo->personnelCheck->oba_checked_by ?? null,
                'check_judgement' => $this->checklistInfo->personnelCheck->check_judgement ?? null,
                'oba_picture_by' => $this->checklistInfo->personnelCheck->oba_picture_by ?? null,
                'picture_judgement' => $this->checklistInfo->personnelCheck->picture_judgement ?? null
            ];
            // if($this->checklistInfo->personnelCheck->oba_picture_by == ""){
            //     $this->openQrScanner('oba_checked_by');
            // }
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_personnel',
                'description' => '{"specific_action":"Personnel Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
        }
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

    public function openQrScanner($fieldName)
    {
        $this->currentQrField = $fieldName;
        $this->showQrModal = true;
        $this->dispatch('initQrScanner');
    }

    public function closeQrScanner()
    {
        $this->showQrModal = false;
        $this->currentQrField = null;
        $this->dispatch('stopQrScanner');
    }

    public function handleQrScanned($content)
    {
        if (!$this->currentQrField) {
            return;
        }

        // Process QR content based on field type
        $processedValue = $this->processQrContent($content, $this->currentQrField);
        
        // Set the value to the current field being scanned
        $this->inputs[$this->currentQrField] = $processedValue;
        
        $this->closeQrScanner();
        $this->dispatchMe($this->currentQrField);
    }

    /**
     * Process QR content based on field requirements
     * You can customize this method to handle different QR formats for different fields
     */
    private function processQrContent($content, $fieldName)
    {
        switch ($fieldName) {
            case 'shipping_pic':
                // For shipping_pic, extract the 3rd element after splitting by semicolon
                $parts = explode(";", $content);
                return isset($parts[2]) ? $parts[2] : $content;
                
            case 'oba_checked_by':
                // For OBA checked by, you might want different processing
                // Example: extract name from QR content
                $parts = explode(";", $content);
                return isset($parts[2]) ? $parts[2] : $content; // Assuming name is 2nd element
                
            case 'oba_picture_by':
                // Another example field - customize as needed
                $parts = explode(";", $content);
                return isset($parts[2]) ? $parts[2] : $content;
                
            default:
                // Default: return content as-is
                return $content;
        }
    }

    public function dispatchMe($field = null){
        DB::beginTransaction();
        try{
            $checklist = Personnel_Check::where('checklist_id', $this->checklist_id)->first();
            $inputData = $this->inputs;
            if ($checklist) {
                $checklist->update($inputData);
            }
            DB::commit();
           
            if(isset($this->inputs[$field]) && $this->inputs[$field] != null){
                $this->inputStatus[$field] = 'success';
            }
        }catch(\Exception $e){
            if ($field) {
                $this->inputStatus[$field] = 'error';
            }
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_personnel',
                'description' => '{"specific_action":"Personnel Dispatch Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .'"}'
            ]);
            DB::rollBack();
        }
    }

    #[On('save-clicked')]
    public function handleSaveFromParent()
    {
        $this->saveChildData();
    }

    public function saveChildData()
    {
        $checklist = Personnel_Check::where('checklist_id', $this->checklist_id)->first();
        if ($checklist) {
            $checklist->update($this->inputs);
        }
    }

    public function render()
    {
        return view('livewire.personnel');
    }
}