<?php

namespace App\Livewire\Calculator;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.app")]
class CalculatorIndex extends Component
{
    public function render()
    {
        return view('livewire.calculator.calculator-index');
    }
}
