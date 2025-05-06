<?php

namespace App\Livewire\Payments;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts.app')]
class PaymentCreate extends Component
{
    use HasToastNotifications, WithFileUploads;

    public $amount = '';
    public $slip;
    public $pay_date;
    public $user_id;

    public function pay()
    {
        $data = $this->validate([
            'amount' => 'required|numeric',
            'slip' => 'required|image|max:1024',
            'pay_date' => 'required|date',
        ]);

        $slipPath = null;
        if ($this->slip) {
            try {
                $slipPath = $this->slip->store('profiles', 'public');

                if (!Storage::disk('public')->exists($slipPath)) {
                    throw new \Exception("File failed to store");
                }
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        Payment::create([
            'user_id' => Auth::id(),
            "temp_amount" => $data['amount'],
            'pay_date' => $data['pay_date'],
            'slip' => $slipPath,
        ]);

        $this->toastSuccess('Payment successully added');

        return redirect()->route('pay.index');
    }

    public function render()
    {
        return view('livewire.payments.payment-create');
    }
}
