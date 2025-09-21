<?php

namespace App\Livewire;

use App\Models\Check_Overall;
use App\Models\Check_Overall_Item;
use App\Models\Check_Overall_Pallet;
use App\Models\checklist;
use App\Models\Log as AppLog;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class CheckOverall extends Component
{
    public $checklist_id;
    public $checklistInfo;
    public $check_overall_id;
    public $showNoticeModal = false;

    public $inputs = [

    ];
    public $inputStatus = [
        'results' => null
    ];
    public $userIP;
    public function mount($checklist_id, $userIP){
        try{
            $this->userIP = $userIP;
            $this->checklist_id = $checklist_id;
            $this->checklistInfo = checklist::find($checklist_id);
            if((Auth::user()->name != $this->checklistInfo->auditor && Auth::user()->name != $this->checklistInfo->assigned_additional_auditor) && Auth::user()->role_id != 2){
                $this->checklistInfo->status = "Closed";
            }
            $this->inputs = [

            ];

            $overall = Check_Overall::where('checklist_id', $checklist_id)->first();
            if ($overall) {
                $this->check_overall_id = $overall->id;

                foreach ($overall->getAttributes() as $key => $value) {
                    if (!in_array($key, ['id', 'checklist_id', 'created_at', 'updated_at'])) {
                        $this->inputs[$key] = $value;
                    }
                }
            }
            $items = Check_Overall_Item::where('check_overall_id', $this->check_overall_id)->get();
            foreach ($items as $item) {
                $index = $item->item_index;
                foreach ($item->getAttributes() as $field => $value) {
                    if (!in_array($field, ['id', 'check_overall_id', 'item_index', 'created_at', 'updated_at'])) {
                        if($value == 1 ){
                            $this->inputs[$index][$field] = true;
                        }
                        else{
                            $this->inputs[$index][$field] = $value;
                        }
                    }
                }
            }


            $pallets = Check_Overall_Pallet::where('check_overall_id', $this->check_overall_id)->get();
            foreach ($pallets as $pallet) {
                $key = 'pallet_' . $pallet->pallet_index;
                if($pallet->value == 1){
                    $this->inputs[$key] = true;
                }else{
                    $this->inputs[$key] = false;
                }
            }
        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checkoverall',
                'description' => '{"specific_action":"CheckOverall Mount Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.check-overall');
    }

    public function dispatchMe($param1, $param2 = null){
        DB::beginTransaction();
        try{
            if (!is_null($param2)) {
                $row = $param1;
                $field = $param2;
                $value = $this->inputs[$row][$field] ?? null;

                Check_Overall_Item::updateOrCreate(
                    ['check_overall_id' => $this->check_overall_id, 'item_index' => $row],
                    [$field => $value]
                );

                $this->inputStatus[$row][$field] = $value !== null ? 'success' : null;
            }else{
                $field = $param1;
                $value = $this->inputs[$field] ?? null;

                if (str_starts_with($field, 'pallet_')) {
                    $palletIndex = (int) str_replace('pallet_', '', $field);
                    Check_Overall_Pallet::updateOrCreate(
                        [
                            'check_overall_id' => $this->check_overall_id,
                            'pallet_index' => $palletIndex
                        ],
                        ['value' => $value]
                    );
                } else {
                    // Save to CheckOverall
                    $model = Check_Overall::where('checklist_id', $this->checklist_id)->first();
                    if ($model) {
                        $model->update([$field => $value]);
                    }
                }

                $this->inputStatus[$field] = $value !== null ? 'success' : null;
            }


            DB::commit();



        }catch(\Exception $e){
            AppLog::create([
                'LogName' => 'System',
                'LogType' => 'error',
                'action' => 'checklist_checkoverall',
                'description' => '{"specific_action":"CheckOverall Dispatch Function Error", "error_msg":"'.$e->getMessage().'", "ip address":"'. $this->userIP .',  user":"'. Auth::user()->name.'"}'
            ]);
            if (!is_null($param2)) {
                $this->inputStatus[$param1][$param2] = 'error';
            } else {
                $this->inputStatus[$param1] = 'error';
            }
            DB::rollBack();
        }

        if($param1 == 'expiration_date')
        {

            $today = new DateTime();
            $expirationDate = new DateTime($this->inputs[$param1]);
            $addOneMonth = clone $expirationDate;

            $addOneMonth->add(new DateInterval('P1M'));

            if($addOneMonth < $today &&  $this->checklistInfo->shipInfoCheck->wood){
                $this->showNoticeModal = true;
            }
        }
    }

    #[On('save-clicked')]
    public function handleSaveFromParent()
    {
        $this->saveChildData();
    }

    public function saveChildData()
    {
        //
    }

    public function expiredNotice()
    {

    }

    public function closeNoticeModal(){
        $this->showNoticeModal = false;
    }
}
