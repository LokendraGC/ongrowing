<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public $per_kitta;

    public function index()
    {

        $total_amount = Payment::sum('amount');
        $payment = Payment::whereNotNull('per_kitta')->first();

        $this->per_kitta = $payment->per_kitta;

        $total_kitta = $total_amount / $this->per_kitta;

        $expense_amount = Expense::where('user_id', Auth::id())->sum('expense_amount');

        $grand_total = $total_amount;

        if ($expense_amount != 0 && $total_amount > $expense_amount) {
            $grand_total = $total_amount - $expense_amount;
        }
        $user_amount = Payment::where('user_id', Auth::id())->sum('amount');

        $user_kitta = $user_amount / $this->per_kitta;

        // Monthly total payments
        $monthlyPayments = Payment::select(
            DB::raw("DATE_FORMAT(pay_date, '%b') as month"),
            DB::raw("DATE_FORMAT(pay_date, '%Y-%m') as month_order"),
            DB::raw("SUM(amount) as total")
        )
            ->groupBy('month', 'month_order')
            ->orderBy('month_order')
            ->get();


        // Extract month names and totals
        $months = $monthlyPayments->pluck('month');
        $totals = $monthlyPayments->pluck('total');


        return view('dashboard', [
            'total_amount' => $grand_total,
            'user_amount' => $user_amount,
            'total_kitta' => $total_kitta,
            'user_kitta' => $user_kitta,
            'months' => $months,
            'totals' => $totals,
            'per_kitta' => $this->per_kitta
        ]);
    }
}
