<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;


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

    public function downloadAll()
    {
        $transactions = $this->transactions;
        $data = [
            'to' => Auth::user()->name,
            'transactions' => $transactions
        ];

        return response()->streamDownload(function () use ($data) {
            echo Pdf::loadView('all_transactions', $data)->stream();
        }, 'transactions_' . Auth::user()->name . '.pdf');
    }


    public function render()
    {
        return view('livewire.payments.status');
    }
}
