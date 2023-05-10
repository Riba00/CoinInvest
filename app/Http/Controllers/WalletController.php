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

        $cryptos = Deposit::select('crypto_id')
                    ->where('user_id', $user->id)
                    ->groupBy('crypto_id')
                    ->get();

        return view('wallet.index',[
            'wallets' => $balance,
            'cryptos' => $cryptos
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();

        $crypto = Crypto::findOrFail($id);

        $deposits = Deposit::where('user_id', $user->id)
                            ->where('crypto_id', $crypto->id)
                            ->get();

        $actualWalletValue = (double)$crypto->getCurrencyEurPrice() * $user->getCryptoQuantity($id);

        return view('wallet.show', [
            'crypto' => $crypto,
            'totalCryptoQuantity' =>$user->getCryptoQuantity($crypto->id),
            'totalCryptoAmount' =>$user->getCryptoAmount($crypto->id),
            'deposits' => $deposits,
            'actualWalletValue' => $actualWalletValue,

        ]);
    }

}
