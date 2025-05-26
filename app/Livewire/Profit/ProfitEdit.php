<?php

namespace App\Livewire\Profit;

use App\Models\Cashflow;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProfitEdit extends Component
{

    use HasToastNotifications, WithFileUploads;

    public $profit_amount = '';
    public $profit_proof;
    public $profit_date;
    public $profit_remarks = '';
    public $profit;

    public function mount($id)
    {
        $profit = Cashflow::find($id);
        $this->profit = $profit;

        if (!$profit) {
            $this->toastError('profit not found');
            return redirect()->route('profit.index');
        }

        $this->profit_amount = $profit->profit_amount;
        $this->profit_date = $profit->profit_date;
        $this->profit_remarks = $profit->profit_remarks;
        $this->profit_proof = $profit->profit_proof;
    }

    public function updateProfit()
    {
        $data = $this->validate([
            'profit_amount' => 'required|numeric',
            'profit_date' => 'required|date',
            'profit_remarks' => 'required',
        ]);


        $slipPath = null;

        if ($this->profit_proof instanceof TemporaryUploadedFile) {
            $this->validate([
                'profit_proof' => 'image|max:1024',
            ]);
        }

        $slipPath = $this->profit->profit_proof; // Keep existing by default

        // Handle new file upload
        if ($this->profit_proof instanceof TemporaryUploadedFile) {
            try {
                // Delete old slip image if exists
                if ($this->profit->profit_proof && Storage::disk('public')->exists($this->profit->profit_proof)) {
                    Storage::disk('public')->delete($this->profit->profit_proof);
                }

                $slipPath = $this->profit_proof->store('profits', 'public');
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        $this->profit->update([
            'profit_amount' => $data['profit_amount'],
            'profit_date' => $data['profit_date'],
            'profit_remarks' => $data['profit_remarks'],
            'profit_proof' => $slipPath,
            'flow_type' => 'inflow',
            'user_id' => Auth::id()
        ]);

        $this->toastSuccess('profit Updated Successfully');

        return redirect()->route('profit.index');
    }


    public function removeSlipImage()
    {
        $this->profit_proof = null;
    }

    public function render()
    {
        return view('livewire.profit.profit-edit');
    }
}
