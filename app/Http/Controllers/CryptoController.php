<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cryptos.index', [
            'cryptos' => Crypto::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $crypto = Crypto::create([
            'name' => $request->name,
            'acronym' => $request->acronym,
            'logo' => $request->logo_url
        ]);

        session()->flash('created', 'Crypto created!');

        return redirect()->route('cryptos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('cryptos.edit', [
            'crypto' => Crypto::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $crypto = Crypto::findOrFail($id);

        $crypto->name = $request->name;
        $crypto->acronym = $request->acronym;
        $crypto->logo = $request->logo_url;
        $crypto->save();

        session()->flash('updated', 'Crypto updated!');
        return redirect()->route('cryptos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Crypto::find($id)->delete();

        session()->flash('deleted', 'Crypto deleted!');

        return redirect()->route('cryptos.index');
    }
}
