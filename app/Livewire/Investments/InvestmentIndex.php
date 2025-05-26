<?php

namespace App\Livewire\Investments;

use App\Models\Cashflow;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InvestmentIndex extends Component
{
    use HasToastNotifications;

    public $investments;
    public $confirmingDelete = '';


    public function mount()
    {
        $this->investments = Cashflow::where('flow_type', 'outflow')
        ->where('user_id', Auth::id())
        ->get();

    }

    public function confirmDelete()
    {
        // Add this check at the start
        if (!$this->confirmingDelete) {
            return;
        }

        try {
            Cashflow::findOrFail($this->confirmingDelete)->delete();

            // Reset the confirmingDelete state immediately
            $this->reset('confirmingDelete');

            $this->toastSuccess('Item Deleted Successfully');
            return redirect()->route('expense.index');
        } catch (\Exception $e) {
            $this->toastError('Delete failed: ' . $e->getMessage());
            $this->reset('confirmingDelete');
        }
    }

    public function render()
    {
        return view('livewire.investments.investment-index');
    }
}
