<?php

namespace App\Livewire\Payments;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Status extends Component
{
    public function render()
    {
        return view('livewire.payments.status');
    }
}
