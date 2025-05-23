<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;


class ChangePassword extends Component
{

    use HasToastNotifications;

    public $username = '';
    public $current_password = '';
    public $new_password = '';
    public $user;


    public function mount($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $this->user = $user;
    }

    public function changePassword()
    {
        $this->validate([
            'username' => 'required|string|email',
            'current_password' => 'required',
            'new_password' => 'required',
        ]);



        // Password validation
        if ($this->new_password) {
            if (!Hash::check($this->current_password, $this->user->password)) {
                $this->addError('current_password', 'Old password is incorrect.');
                return;
            }

            $this->validate([
                'new_password' => ['required', 'string', Rules\Password::defaults()],
            ]);
        }

        $this->user->password = Hash::make($this->new_password);
        $this->user->email = $this->username;
        $this->user->save();

        $this->toastSuccess('Password changed successfully');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
