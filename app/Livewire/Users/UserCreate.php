<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserCreate extends Component
{
    public function render()
    {
        return view('livewire.users.user-create');
    }
}
    