<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return Program::with(['creator','zakatType','donations','wallet'])->get();
    }

    public function show($id)
    {
        return Program::with(['creator','zakatType','donations','wallet'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program'=>'required|string|max:200',
            'kategori'=>'required|in:zakat,infak,sedekah,wakaf,umum',
            'deskripsi'=>'required|string',
            'target_dana'=>'required|numeric',
            'status'=>'sometimes|in:aktif,selesai',
            'created_by'=>'required|exists:users,user_id',
            'zakat_type_id'=>'nullable|exists:zakat_types,zakat_type_id'
        ]);

        $program = Program::create($validated);

        return response()->json($program,201);
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'nama_program'=>'sometimes|string|max:200',
            'kategori'=>'sometimes|in:zakat,infak,sedekah,wakaf,umum',
            'deskripsi'=>'sometimes|string',
            'target_dana'=>'sometimes|numeric',
            'status'=>'sometimes|in:aktif,selesai',
            'zakat_type_id'=>'nullable|exists:zakat_types,zakat_type_id'
        ]);

        $program->update($validated);

        return response()->json($program);
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return response()->json(['message'=>'Program deleted']);
    }
}
