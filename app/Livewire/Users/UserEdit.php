<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class UserEdit extends Component
{

    use WithFileUploads, HasToastNotifications;

    public $user;
    public $name = '';
    public $email = '';
    public $old_password = '';
    public $new_password = '';
    public $dob;
    public $join_date;
    public $temp_address = '';
    public $permanent_address = '';
    public $profile;
    public $phone = '';

    public function mount($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $this->user = $user;

        $this->fill([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '',
            'dob' => $this->dob === '' ? null : $this->dob,
            'join_date' => $this->join_date === '' ? null : $this->join_date,
            'temp_address' => $user->temp_address ?? '',
            'permanent_address' => $user->permanent_address ?? '',
            'profile' => $user->profile ?? '',
        ]);
    }


    public function editUser()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user->id,
            'profile' => 'nullable|image|max:1024',
        ]);

        if ($this->new_password) {
            if (!Hash::check($this->old_password, $this->user->password)) {
                $this->addError('old_password', 'Old password is incorrect.');
                return;
            }

            $this->validate([
                'new_password' => ['required', 'string', Rules\Password::defaults()],
            ]);
        }

        $profilePath = $this->user->profile;

        if ($this->profile && is_object($this->profile)) {
            try {
                $profilePath = $this->profile->store('profiles', 'public');
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->new_password ? Hash::make($this->new_password) : $this->user->password,
            'profile' => $profilePath,
            'dob' => $this->dob,
            'join_date' => $this->join_date,
            'phone' => $this->phone,
            'temp_address' => $this->temp_address,
            'permanent_address' => $this->permanent_address,
        ]);

        $this->toastSuccess("User updated successfully.");
        return redirect()->route('user.index');
    }


    public function removeProfileImage()
    {
        $this->profile = null;
    }

    public function render()
    {
        return view('livewire.users.user-edit');
    }
}
