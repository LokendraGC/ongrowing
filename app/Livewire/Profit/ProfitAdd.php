<?php

namespace App\Livewire\Profit;

use App\Models\Cashflow;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;


#[Layout('layouts.app')]
class ProfitAdd extends Component
{

    use HasToastNotifications, WithFileUploads;

    public $profit_amount = '';
    public $profit_proof;
    public $profit_date;
    public $profit_remarks = '';

    public function saveProfit()
    {
        $data = $this->validate([
            'profit_amount' => 'required|numeric',
            'profit_proof' => 'required|image|max:1024',
            'profit_date' => 'required|date',
            'profit_remarks' => 'required',
        ]);


        $slipPath = null;

        if ($this->profit_proof) {
            try {
                $slipPath = $this->profit_proof->store('profits', 'public');

                if (!Storage::disk('public')->exists($slipPath)) {
                    throw new \Exception("File failed to store");
                }
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        Cashflow::create([
            'profit_amount' => $data['profit_amount'],
            'profit_date' => $data['profit_date'],
            'profit_remarks' => $data['profit_remarks'],
            'profit_proof' => $slipPath,
            'flow_type' => 'inflow',
            'user_id' => Auth::id()
        ]);

        $this->toastSuccess('Profit Added Successfully');

        return redirect()->route('profit.index');
    }

    public function render()
    {
        return view('livewire.profit.profit-add');
    }
}
