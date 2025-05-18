<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class PaymentIndex extends Component
{
    use HasToastNotifications;

    public $payments;
    public $confirmingDelete = null;
    public $payment = '';

    public function mount()
    {
        $this->payments = Payment::where('user_id', Auth::id())->latest()->get();
    }

    public function download()
    {
        $payments = $this->payments;

        $data = [
            'to' => Auth::user()->name,
            'payments' => $payments,
        ];

        return response()->streamDownload(function () use ($data) {
            echo Pdf::loadView('transactions', $data)->stream();
        }, 'transactions_' . Auth::user()->name . '.pdf');
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
