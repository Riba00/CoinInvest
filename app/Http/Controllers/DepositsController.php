<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $deposits = Deposit::where('user_id',$user->id)
                            ->orderBy('date', 'desc')
                            ->get();

        return view('deposits.index',[
            'deposits' => collect($deposits),
            'cryptos' => Crypto::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'quantity' => 'required',
            'crypto_id' => 'required',
            'date' => 'required'
        ]);

        $user = Auth::user();

        $deposit = Deposit::create([
            'amount' => $request->amount,
            'crypto_id' => $request->crypto_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'user_id' => $user->id
        ]);

        session()->flash('created', 'Deposit created!');

        return redirect()->route('deposits.index');
    }

    public function edit($id)
    {
        return view('deposits.edit', [
            'deposit' => Deposit::findOrFail($id),
            'cryptos' => Crypto::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $deposit = Deposit::findOrFail($id);

        $deposit->amount = $request->amount;
        $deposit->crypto_id = $request->crypto_id;
        $deposit->quantity = $request->quantity;
        $deposit->date = $request->date;
        $deposit->save();

        session()->flash('updated', 'Deposit updated!');
        return redirect()->route('deposits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Deposit::find($id)->delete();

        session()->flash('deleted', 'Deposit deleted!');

        return redirect()->route('deposits.index');
    }
}
