<?php

namespace App\Livewire\Investments;

use App\Models\Cashflow;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class InvestmentAdd extends Component
{

    use HasToastNotifications, WithFileUploads;

    public $invest_amount = '';
    public $invest_proof;
    public $invest_date;
    public $invest_remarks = '';

    public function saveInvestment()
    {
        $data = $this->validate([
            'invest_amount' => 'required|numeric',
            'invest_proof' => 'required|image|max:1024',
            'invest_date' => 'required|date',
            'invest_remarks' => 'required',
        ]);


        $slipPath = null;

        if ($this->invest_proof) {
            try {
                $slipPath = $this->invest_proof->store('investments', 'public');

                if (!Storage::disk('public')->exists($slipPath)) {
                    throw new \Exception("File failed to store");
                }
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        Cashflow::create([
            'invest_amount' => $data['invest_amount'],
            'invest_date' => $data['invest_date'],
            'invest_remarks' => $data['invest_remarks'],
            'invest_proof' => $slipPath,
            'flow_type' => 'outflow',
            'user_id' => Auth::id()
        ]);

        $this->toastSuccess('Expense Added Successfully');

        return redirect()->route('investment.index');
    }

    public function render()
    {
        return view('livewire.investments.investment-add');
    }
}
