<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_amount = Payment::sum('amount');
        $user_amount = Payment::where('user_id', Auth::id())->sum('amount');

        $total_kitta = $total_amount / 10;
        $user_kitta = $user_amount / 10;

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
            'total_amount' => $total_amount,
            'user_amount' => $user_amount,
            'total_kitta' => $total_kitta,
            'user_kitta' => $user_kitta,
            'months' => $months,
            'totals' => $totals,
        ]);
    }
}
