<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\Helpers\formattedNumber2decimalDigits;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $totalInvested = $user->getTotalInvested();

        $cryptos = Deposit::select('crypto_id')
            ->where('user_id', $user->id)
            ->groupBy('crypto_id')
            ->get();

        $profit = 0;
        foreach ($cryptos as $a){
            $crypto = Crypto::find($a->crypto_id);
            $profit += $crypto->getCurrencyEurPrice() * $user->getCryptoQuantity($a->crypto_id);
        }









        $recentDeposits = Deposit::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->take(3)
            ->get();



        return view('dashboard', [
            'deposits_count' => count($user->deposits),
            'total_invested' => number_format($totalInvested,2,',','.'),
            'recent_diposits' => $recentDeposits,
            'profit' => number_format($profit,2,',','.')
        ]);
    }



}
