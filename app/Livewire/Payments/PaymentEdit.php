<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout("layouts.app")]
class PaymentEdit extends Component
{

    use HasToastNotifications,WithFileUploads;

    public $amount = '';
    public $slip;
    public $pay_date;
    public $user_id;
    public $payment;

    public function mount($id)
    {
        $payment = Payment::find($id);

        $this->payment = $payment;
        $actual_amt =  $payment->status == 'paid' ? $payment->amount : $payment->temp_amount;

        $this->fill([
            'amount' => $actual_amt,
            'pay_date' => $payment->pay_date,
            'slip' => $payment->slip ?? '',
        ]);
    }

    public function updatePayment()
    {
        $this->validate([
            'amount' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        if ($this->slip instanceof TemporaryUploadedFile) {
            $this->validate([
                'slip' => 'image|max:1024',
            ]);
        }

        $slipPath = $this->payment->slip; // Keep existing by default

        // Handle new file upload
        if ($this->slip instanceof TemporaryUploadedFile) {
            try {
                // Delete old slip image if exists
                if ($this->payment->slip && Storage::disk('public')->exists($this->payment->slip)) {
                    Storage::disk('public')->delete($this->payment->slip);
                }

                $slipPath = $this->slip->store('profiles', 'public');
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        $this->payment->update([
            "user_id" => Auth::id(),
            "temp_amount" => $this->amount,
            "pay_date" => $this->pay_date,
            "slip" => $slipPath,
            "status" => 'pending'
        ]);

        $this->toastSuccess('Payment Updated Successfully');

        return redirect()->route('pay.index');
    }

    public function removeSlipImage()
    {
        $this->slip = null;
    }

    public function render()
    {
        return view('livewire.payments.payment-edit');
    }
}
