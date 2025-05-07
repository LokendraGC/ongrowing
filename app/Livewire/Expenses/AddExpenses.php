<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout("layouts.app")]
class AddExpenses extends Component
{
    use HasToastNotifications, WithFileUploads;

    public $expense_amount = '';
    public $slip;
    public $invest_date;
    public $detail = '';

    public function save()
    {
        $data = $this->validate([
            'expense_amount' => 'required|numeric',
            'slip' => 'required|image|max:1024',
            'invest_date' => 'required|date',
            'detail' => 'required',
        ]);

        $slipPath = null;

        if ($this->slip) {
            try {
                $slipPath = $this->slip->store('expenses', 'public');

                if (!Storage::disk('public')->exists($slipPath)) {
                    throw new \Exception("File failed to store");
                }
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        Expense::create([
            'expense_amount' => $data['expense_amount'],
            'invest_date' => $data['invest_date'],
            'detail' => $data['detail'],
            'slip' => $slipPath,
            'user_id' => Auth::id()
        ]);

        $this->toastSuccess('Expense Added Successfully');

        return redirect()->route('expense.index');
    }

    public function render()
    {
        return view('livewire.expenses.add-expenses');
    }
}
