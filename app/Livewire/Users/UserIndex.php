<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Traits\HasToastNotifications;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class UserIndex extends Component
{
    use HasToastNotifications;
    public $users;
    public $confirmingDelete = null;

    public function mount()
    {
        $users_with_role = User::with('roles')->get();
        $this->users = $users_with_role;
    }

    public function confirmDelete()
    {
        // Add this check at the start
        if (!$this->confirmingDelete) {
            return;
        }

        try {
            User::findOrFail($this->confirmingDelete)->delete();

            // Reset the confirmingDelete state immediately
            $this->reset('confirmingDelete');

            $this->toastSuccess('User Deleted Successfully');
            return redirect()->route("user.index");
        } catch (\Exception $e) {
            $this->toastError('Delete failed: ' . $e->getMessage());
            $this->reset('confirmingDelete');
        }
    }

    public function render()
    {
        return view('livewire.users.user-index');
    }
}
