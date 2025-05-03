<?php

namespace App\Livewire\Auth;

use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    use HasToastNotifications;

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->toastSuccess("Logged Out Successfully");
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
