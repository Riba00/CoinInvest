<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $total = 0;
        foreach ($user->deposits as $deposit){
            $total += $deposit->amount;
        }
        $totalFormatted = number_format($total, 2, ',', '.');

        $recentDeposits = Deposit::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->take(3)
            ->get();


        return view('dashboard', [
            'deposits_count' => count($user->deposits),
            'total_invested' => $totalFormatted,
            'recent_diposits' => $recentDeposits
        ]);
    }



}
