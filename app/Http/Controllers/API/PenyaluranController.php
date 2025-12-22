<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PenyaluranService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyaluranController extends Controller
{
    /**
     * Tampilkan semua penyaluran
     */
    public function index()
    {
        $penyaluran = \App\Models\Penyaluran::with(['program', 'mustahik'])
            ->latest()
            ->get();

        return response()->json($penyaluran);
    }

    /**
     * Tampilkan detail penyaluran
     */
    public function show($id)
    {
        $penyaluran = \App\Models\Penyaluran::with(['program', 'mustahik'])
            ->findOrFail($id);

        return response()->json($penyaluran);
    }

    /**
     * Buat penyaluran baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'program_id'         => 'required|exists:programs,program_id',
            'mustahik_id'        => 'required|exists:mustahik,mustahik_id',
            'nominal_disalurkan' => 'required|numeric|min:1',
            'tanggal_penyaluran' => 'required|date',
            'bukti_penyaluran'   => 'nullable|string|max:255',
        ]);

        // Sertakan user_id (siapa admin yang melakukan penyaluran)
        $user = Auth::user(); // facade Auth
        $validated['user_id'] = $user->id;

        try {
            // Panggil Service
            $penyaluran = PenyaluranService::store($validated);

            return response()->json([
                'message' => 'Penyaluran berhasil',
                'data'    => $penyaluran
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Penyaluran gagal',
                'error'   => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Hapus penyaluran
     */
    public function destroy($id)
    {
        $penyaluran = \App\Models\Penyaluran::findOrFail($id);
        $penyaluran->delete();

        return response()->json([
            'message' => 'Penyaluran berhasil dihapus'
        ]);
    }
}
