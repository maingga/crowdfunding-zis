<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProgramWallet;
use Illuminate\Http\Request;

class ProgramWalletController extends Controller
{
    public function index()
    {
        return ProgramWallet::with('program')->get();
    }

    public function show($id)
    {
        return ProgramWallet::with('program')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $wallet = ProgramWallet::findOrFail($id);

        $validated = $request->validate([
            'saldo'=>'required|numeric'
        ]);

        $wallet->update($validated);
        return response()->json($wallet);
    }
}
