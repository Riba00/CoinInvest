<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $balance = $user->getCryptoBalance();

        return view('wallet',[
            'balance' => $balance,
        ]);
    }
}
