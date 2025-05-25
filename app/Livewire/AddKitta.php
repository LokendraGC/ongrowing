<?php

namespace App\Livewire;

use App\Models\Kitta;
use App\Traits\HasToastNotifications;

use Livewire\Component;

class AddKitta extends Component
{
    use HasToastNotifications;

    public $per_kitta = '';

    public function mount()
    {
        // Find existing payment for logged-in user

        $kitta_number = Kitta::whereNotNull('per_kitta')->first();
        if ($kitta_number) {
            $this->per_kitta = $kitta_number->per_kitta;
        }
    }



    public function submitKitta()
    {
        $data = $this->validate([
            'per_kitta' => 'required|integer'
        ]);

        // Check if user already has a Payment record
        $payment = Kitta::whereNotNull('per_kitta')->first();

        if ($payment) {
            // Update existing
            $payment->update([
                'per_kitta' => $data['per_kitta']
            ]);
            $this->toastSuccess('Kitta updated successfully');
        } else {
            // Create new
            Kitta::create([
                'per_kitta' => $data['per_kitta'],      
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
