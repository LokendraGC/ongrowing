<?php

namespace App\Livewire\Payments;

use App\Mail\PaymentApprovedMail;
use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

#[Layout('layouts.app')]
class Status extends Component
{
    use HasToastNotifications;
    public $transactions;
    public $status;

    public function mount()
    {
        $this->transactions = Payment::latest()->get();
    }

    public function updateStatus($transactionId, $status)
    {
        $transaction = Payment::find($transactionId);
        if ($transaction) {
            $transaction->status = $status;

            if ($status == 'paid' && $transaction->temp_amount != null) {
                $transaction->amount = $transaction->temp_amount;
            }

            $transaction->save();

            if ($status == 'paid' && $transaction->user && $transaction->user->email) {
                Mail::to($transaction->user->email)->send(new PaymentApprovedMail($transaction));
            }

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
