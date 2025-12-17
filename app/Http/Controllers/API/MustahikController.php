<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mustahik;
use Illuminate\Http\Request;

class MustahikController extends Controller
{
    public function index()
    {
        return Mustahik::all();
    }

    public function show($id)
    {
        return Mustahik::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required|string|max:150',
            'kategori_asnaf'=>'required|in:fakir,miskin,amil,mualaf,riqab,gharim,ibnu_sabil,fi_sabilillah',
            'alamat'=>'nullable|string',
            'no_hp'=>'nullable|string|max:20'
        ]);

        $mustahik = Mustahik::create($validated);
        return response()->json($mustahik,201);
    }

    public function update(Request $request, $id)
    {
        $mustahik = Mustahik::findOrFail($id);

        $validated = $request->validate([
            'nama'=>'sometimes|string|max:150',
            'kategori_asnaf'=>'sometimes|in:fakir,miskin,amil,mualaf,riqab,gharim,ibnu_sabil,fi_sabilillah',
            'alamat'=>'nullable|string',
            'no_hp'=>'nullable|string|max:20'
        ]);

        $mustahik->update($validated);

        return response()->json($mustahik);
    }

    public function destroy($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $mustahik->delete();
        return response()->json(['message'=>'Mustahik deleted']);
    }
}
