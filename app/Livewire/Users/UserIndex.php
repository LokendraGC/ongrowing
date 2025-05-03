<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class UserIndex extends Component
{
    public function render()
    {
        return view('livewire.users.user-index');
    }
}
