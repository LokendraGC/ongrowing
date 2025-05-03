<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class UserCreate extends Component
{

    use HasToastNotifications, WithFileUploads ;

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $dob = '';
    public $join_date = '';
    public $temp_address = '';
    public $permanent_address = '';
    public $profile;
    public $phone = '';


    public function createUser()
    {

        $data = $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'profile' => 'image|max:1024',
        ]);

        $path = $this->profile->store('profiles', 'public');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile' => $path,
            'dob' => $this->dob,
            'join_date' => $this->join_date,
            'temp_address' => $this->temp_address,
            'permanent_address' => $this->permanent_address,
        ]);

        $user->assignRole('user');

        $this->toastSuccess("User Created in Successfully");

        return redirect()->route('user.index');

    }


    public function render()
    {
        return view('livewire.users.user-create');
    }
}
