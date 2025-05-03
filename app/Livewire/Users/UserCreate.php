<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class UserCreate extends Component
{

    use HasToastNotifications, WithFileUploads;

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
            'profile' => 'nullable|image|max:1024',
        ]);

        $profilePath = null;
        if ($this->profile) {
            try {
                $profilePath = $this->profile->store('profiles', 'public');

                if (!Storage::disk('public')->exists($profilePath)) {
                    throw new \Exception("File failed to store");
                }
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        // dd($profilePath);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile' => $profilePath,
            'dob' => $this->dob ?: null,
            'join_date' => $this->join_date ?: null,
            'phone' => $this->phone,
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
