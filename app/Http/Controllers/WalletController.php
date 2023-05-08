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

        $criptos = Crypto::all();

        return view('wallet.index',[
            'balance' => $balance,
            'cryptos' => $criptos
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();

        $crypto = Crypto::findOrFail($id);

        $deposits = Deposit::where('user_id', $user->id)
                            ->where('crypto_id', $crypto->id)
                            ->get();

        $total = 0;
        $quantity = 0;
        foreach ($deposits as $deposit){
            $total += $deposit->amount;
            $quantity += $deposit->quantity;
        }
        $totalFormatted = (double) number_format($total, 2, ',', '.');


        $actualValue = (double)$crypto->getCurrencyEurPrice() * $totalFormatted;

        return view('wallet.show', [
            'crypto' => $crypto,
            'deposits' => $deposits,
            'actualValue' => $actualValue,
            'invested' => $totalFormatted,
            'quantity' => $quantity
        ]);
    }

}
