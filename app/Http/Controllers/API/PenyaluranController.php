<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    public function index()
    {
        return Penyaluran::with(['program','mustahik'])->get();
    }

    public function show($id)
    {
        return Penyaluran::with(['program','mustahik'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id'=>'required|exists:programs,program_id',
            'mustahik_id'=>'required|exists:mustahik,mustahik_id',
            'nominal_disalurkan'=>'required|numeric',
            'tanggal_penyaluran'=>'required|date',
            'bukti_penyaluran'=>'nullable|string|max:255'
        ]);

        $penyaluran = Penyaluran::create($validated);
        return response()->json($penyaluran,201);
    }

    public function update(Request $request, $id)
    {
        $penyaluran = Penyaluran::findOrFail($id);

        $validated = $request->validate([
            'nominal_disalurkan'=>'sometimes|numeric',
            'tanggal_penyaluran'=>'sometimes|date',
            'bukti_penyaluran'=>'nullable|string|max:255'
        ]);

        $penyaluran->update($validated);
        return response()->json($penyaluran);
    }

    public function destroy($id)
    {
        $penyaluran = Penyaluran::findOrFail($id);
        $penyaluran->delete();
        return response()->json(['message'=>'Penyaluran deleted']);
    }
}
