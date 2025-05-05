<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Status extends Component
{
    use HasToastNotifications;
    public $transactions;
    public $status;

    public function mount()
    {
        $this->transactions = Payment::all();
    }

    public function updateStatus($transactionId, $status)
    {
        $transaction = Payment::find($transactionId);
        if ($transaction) {
            $transaction->status = $status;
            $transaction->save();

            $this->toastSuccess('Status Updated Successfully');
        }
    }


    public function render()
    {
        return view('livewire.payments.status');
    }
}
