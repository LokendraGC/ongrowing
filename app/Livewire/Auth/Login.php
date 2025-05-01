<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Traits\HasToastNotifications;
use Masmerise\Toaster\Toaster;

class Login extends Component
{
    use HasToastNotifications;

    public $email = '';
    public $password = '';
    public $remember = false;
    public $errorMessage = '';

    public function login()
    {
        $data =  $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt($data)) {
            $this->errorMessage = 'Credentials does not match';
            return;
        }


        session()->regenerate();

        $this->toastSuccess("Logged in Successfully");

        return redirect()->route('dashboard');
    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
