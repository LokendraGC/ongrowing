<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class PaymentIndex extends Component
{

    use HasToastNotifications;

    public $payments;
    public $confirmingDelete = null;

    public function mount()
    {
        $this->payments = Payment::all();
    }

    public function confirmDelete()
    {
        // Add this check at the start
        if (!$this->confirmingDelete) {
            return;
        }

        try {
            Payment::findOrFail($this->confirmingDelete)->delete();

            // Reset the confirmingDelete state immediately
            $this->reset('confirmingDelete');

            $this->toastSuccess('User Deleted Successfully');
            return redirect()->route('pay.index');
        } catch (\Exception $e) {
            $this->toastError('Delete failed: ' . $e->getMessage());
            $this->reset('confirmingDelete');
        }
    }

    public function render()
    {
        return view('livewire.payments.payment-index');
    }
}
