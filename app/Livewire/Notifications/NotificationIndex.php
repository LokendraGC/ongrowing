<?php

namespace App\Livewire\Notifications;

use App\Models\Payment;
use Livewire\Component;

class NotificationIndex extends Component
{
    public $payments;
    public $count;

    public function mount()
    {

        $this->payments = Payment::where('status', 'paid')
            ->orderByDesc('created_at')
            ->get();

        $this->count = $this->payments->count();
    }

    public function render()
    {
        return view('livewire.notifications.notification-index');
    }
}
