<?php

namespace App\Livewire\Calculator;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.app")]
class CalculatorIndex extends Component
{

    public $amount = '';
    public $per_kitta = '';
    public $result = '';

    public function calculate()
    {
        $validated = $this->validate([
            'amount' => 'required|numeric',
            'per_kitta' => 'required|numeric|gt:0',
        ]);

        $this->result =  round($this->amount / $this->per_kitta, 2);
    }


    public function render()
    {
        return view('livewire.calculator.calculator-index');
    }
}
