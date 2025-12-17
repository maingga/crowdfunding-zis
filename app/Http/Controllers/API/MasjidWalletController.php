<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasjidWallet;
use Illuminate\Http\Request;

class MasjidWalletController extends Controller
{
    public function show($id)
    {
        return MasjidWallet::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $wallet = MasjidWallet::findOrFail($id);

        $validated = $request->validate([
            'saldo_total'=>'required|numeric'
        ]);

        $wallet->update($validated);
        return response()->json($wallet);
    }
}
