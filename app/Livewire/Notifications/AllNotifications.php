<?php

namespace App\Livewire\Notifications;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AllNotifications extends Component
{
    public $payments;
    public $count;

    public function mount()
    {
        $clearedPaymentIds = DB::table('notification_user_clears')
            ->where('user_id', Auth::user()->id)
            ->pluck('payment_id')
            ->toArray();

        $this->payments = Payment::where('status', 'paid')
            ->whereNotIn('id', $clearedPaymentIds)
            ->orderByDesc('created_at')
            ->get();

        $this->count = $this->payments->count();
    }

    public function clearAll()
    {
        foreach ($this->payments as $payment) {
            DB::table('notification_user_clears')->insertOrIgnore([
                'user_id' => Auth::user()->id,
                'payment_id' => $payment->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->payments = collect();
        $this->count = 0;
    }


    public function render()
    {
        return view('livewire.notifications.all-notifications');
    }
}
