<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;



#[Layout("layouts.app")]
class AllExpenses extends Component
{
    use HasToastNotifications;

    public $expenses = [];
    public $expense;
    public $confirmingDelete = '';

    public function mount()
    {
        $this->expenses = Expense::where('user_id',Auth::id())->latest()->get();
        // dd($this->expenses);
    }


    public function download()
    {
        $expenses = $this->expenses;

        $data = [
            'to' => Auth::user()->name,
            'expenses' => $expenses,
        ];

        return response()->streamDownload(function () use ($data) {
            echo Pdf::loadView('expenses', $data)->stream();
        }, 'expenses_' . Auth::user()->name . '.pdf');
    }


    public function confirmDelete()
    {
        // Add this check at the start
        if (!$this->confirmingDelete) {
            return;
        }

        try {
            Expense::findOrFail($this->confirmingDelete)->delete();

            // Reset the confirmingDelete state immediately
            $this->reset('confirmingDelete');

            $this->toastSuccess('User Deleted Successfully');
            return redirect()->route('expense.index');
        } catch (\Exception $e) {
            $this->toastError('Delete failed: ' . $e->getMessage());
            $this->reset('confirmingDelete');
        }
    }

    public function render()
    {
        return view('livewire.expenses.all-expenses');
    }
}
