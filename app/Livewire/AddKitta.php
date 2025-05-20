<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class AddKitta extends Component
{
    use HasToastNotifications;

    public $per_kitta = '';

    public function mount()
    {
        // Find existing payment for logged-in user

        $payment = Payment::whereNotNull('per_kitta')->first();
        if ($payment) {
            $this->per_kitta = $payment->per_kitta;
        }
    }

    public function submitKitta()
    {
        $data = $this->validate([
            'per_kitta' => 'required|integer'
        ]);

        // Check if user already has a Payment record
        $payment = Payment::whereNotNull('per_kitta')->first();

        if ($payment) {
            // Update existing
            $payment->update([
                'per_kitta' => $data['per_kitta']
            ]);
            $this->toastSuccess('Kitta updated successfully');
        } else {
            // Create new
            Payment::create([
                'per_kitta' => $data['per_kitta'],
                'user_id' => Auth::id(),
                'pay_date' => Date::now(),
                'slip' => ''
            ]);
            $this->toastSuccess('Kitta added successfully');
        }

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.add-kitta');
    }
}
