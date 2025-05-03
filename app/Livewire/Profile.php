<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Profile extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
