<?php

namespace App\Livewire\Investments;

use App\Models\Cashflow;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;


#[Layout('layouts.app')]
class InvestmentEdit extends Component
{

    use HasToastNotifications,WithFileUploads;

    public $invest_amount = '';
    public $invest_proof;
    public $invest_date;
    public $invest_remarks = '';
    public $investment;

    public function mount($id)
    {
        $investment = Cashflow::find($id);
        $this->investment = $investment;

        if (!$investment) {
            $this->toastError('Investment not found');
            return redirect()->route('investment.index');
        }

        $this->invest_amount = $investment->invest_amount;
        $this->invest_date = $investment->invest_date;
        $this->invest_remarks = $investment->invest_remarks;
        $this->invest_proof = $investment->invest_proof;
    }

    public function updateInvestment()
    {
        $data = $this->validate([
            'invest_amount' => 'required|numeric',
            'invest_date' => 'required|date',
            'invest_remarks' => 'required',
        ]);


        $slipPath = null;

        if ($this->invest_proof instanceof TemporaryUploadedFile) {
            $this->validate([
                'invest_proof' => 'image|max:1024',
            ]);
        }

        $slipPath = $this->investment->invest_proof; // Keep existing by default

        // Handle new file upload
        if ($this->invest_proof instanceof TemporaryUploadedFile) {
            try {
                // Delete old slip image if exists
                if ($this->investment->invest_proof && Storage::disk('public')->exists($this->investment->invest_proof)) {
                    Storage::disk('public')->delete($this->investment->invest_proof);
                }

                $slipPath = $this->invest_proof->store('investments', 'public');
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        $this->investment->update([
            'invest_amount' => $data['invest_amount'],
            'invest_date' => $data['invest_date'],
            'invest_remarks' => $data['invest_remarks'],
            'invest_proof' => $slipPath,
            'flow_type' => 'outflow',
            'user_id' => Auth::id()
        ]);

        $this->toastSuccess('Investment Updated Successfully');

        return redirect()->route('investment.index');
    }


    public function removeSlipImage()
    {
        $this->invest_proof = null;
    }
    public function render()
    {
        return view('livewire.investments.investment-edit');
    }
}
