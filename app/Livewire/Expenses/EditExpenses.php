<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use App\Traits\HasToastNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;


#[Layout("layouts.app")]
class EditExpenses extends Component
{

    use HasToastNotifications, WithFileUploads;


    public $expense_amount = '';
    public $slip;
    public $invest_date;
    public $detail = '';
    public $expense;

    public function mount($id)
    {
        $expense = Expense::find($id);

        $this->expense = $expense;

        $this->fill([
            'expense_amount' => $expense->expense_amount,
            'invest_date' => $expense->invest_date,
            'slip' => $expense->slip ?? '',
            'detail' => $expense->detail
        ]);
    }

    public function update()
    {
        $this->validate([
            'expense_amount' => 'required|numeric',
            'invest_date' => 'required|date',
            'detail' => 'required',
        ]);

        if ($this->slip instanceof TemporaryUploadedFile) {
            $this->validate([
                'slip' => 'image|max:1024',
            ]);
        }

        $slipPath = $this->expense->slip; // Keep existing by default

        // Handle new file upload
        if ($this->slip instanceof TemporaryUploadedFile) {
            try {
                // Delete old slip image if exists
                if ($this->expense->slip && Storage::disk('public')->exists($this->expense->slip)) {
                    Storage::disk('public')->delete($this->expense->slip);
                }

                $slipPath = $this->slip->store('expenses', 'public');
            } catch (\Exception $e) {
                $this->toastError("File upload failed: " . $e->getMessage());
                return;
            }
        }

        $this->expense->update([
            "user_id" => Auth::id(),
            "expense_amount" => $this->expense_amount,
            "invest_date" => $this->invest_date,
            "slip" => $slipPath,
            "detail"=> $this->detail
        ]);

        $this->toastSuccess('Expense Updated Successfully');

        return redirect()->route('expense.index');
    }

    public function removeSlipImage()
    {
        $this->slip = null;
    }

    public function render()
    {
        return view('livewire.expenses.edit-expenses');
    }
}
