<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return Donation::with(['user','program','transaction'])->get();
    }

    public function show($id)
    {
        return Donation::with(['user','program','transaction'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'=>'nullable|exists:users,user_id',
            'program_id'=>'required|exists:programs,program_id',
            'nominal'=>'required|numeric',
            'metode_pembayaran'=>'required|in:midtrans,transfer_manual,tunai',
            'is_anonymous'=>'boolean'
        ]);

        $validated['status'] = 'pending';

        $donation = Donation::create($validated);

        return response()->json($donation,201);
    }

    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $validated = $request->validate([
            'nominal'=>'sometimes|numeric',
            'metode_pembayaran'=>'sometimes|in:midtrans,transfer_manual,tunai',
            'status'=>'sometimes|in:pending,berhasil,gagal',
            'is_anonymous'=>'sometimes|boolean'
        ]);

        $donation->update($validated);

        return response()->json($donation);
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return response()->json(['message'=>'Donation deleted']);
    }
}
