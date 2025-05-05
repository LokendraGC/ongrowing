<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $total_amount = Payment::sum('amount');
        $user_amount = Payment::where('user_id', Auth::id())->sum('amount');

        $total_kitta = $total_amount / 10;
        $user_kitta = $user_amount / 10;

        return view('dashboard', [
            'total_amount' => $total_amount,
            'user_amount' => $user_amount,
            'total_kitta' => $total_kitta,
            'user_kitta' => $user_kitta
        ]);
    }
}
