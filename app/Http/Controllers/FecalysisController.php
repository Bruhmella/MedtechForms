<?php

namespace App\Http\Controllers;

use App\Models\Fecalysis;
use Illuminate\Http\Request;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class FecalysisController extends Controller
{
    public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = Fecalysis::latest()->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = null;
        $medtech = null;

        if ($user->Pos === 'MT') {
            $medtech = $user;
        } elseif ($user->Pos === 'P') {
            $pathologist = $user;
        }

        return view('fecalysis', [
            'patients' => $patients,
            'orNumber' => $orNumber,
            'user' => $user,
            'pathologists' => $pathologists,
            'pathologist' => $pathologist,
            'medtechs' => $medtechs,
            'medtech' => $medtech,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Pname' => 'required|string',
            'Page' => 'nullable|integer',
            'Psex' => 'nullable|string',
            'Poc' => 'nullable|string|unique:fecalysis',
            'color' => 'nullable|string',
            'consistency' => 'nullable|string',
            'occult_blood' => 'nullable|string',
            'sudan_stain' => 'nullable|string',
            'bacteria' => 'nullable|string',
            'yeast' => 'nullable|string',
            'fat_globules' => 'nullable|string',
            'others' => 'nullable|string',
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
            'wbc' => 'nullable|integer',
            'rbc' => 'nullable|integer',
        ]);

        $fecalysis = Fecalysis::create($validatedData);
        return response()->json($fecalysis, 201);
    }

    public function show(Fecalysis $fecalysis)
    {
        return response()->json($fecalysis);
    }

    public function edit(Fecalysis $fecalysis)
    {
        return view('fecalysis_edit', compact('fecalysis'));
    }

    public function update(Request $request, Fecalysis $fecalysis)
    {
        $validatedData = $request->validate([
            'Pname' => 'sometimes|string',
            'Page' => 'nullable|integer',
            'Psex' => 'nullable|string',
            'Poc' => 'nullable|string|unique:fecalysis,Poc,' . $fecalysis->id,
            'color' => 'nullable|string',
            'consistency' => 'nullable|string',
            'occult_blood' => 'nullable|string',
            'sudan_stain' => 'nullable|string',
            'bacteria' => 'nullable|string',
            'yeast' => 'nullable|string',
            'fat_globules' => 'nullable|string',
            'others' => 'nullable|string',
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
            'wbc' => 'nullable|integer',
            'rbc' => 'nullable|integer',
        ]);

        $fecalysis->update($validatedData);
        return response()->json($fecalysis);
    }

    public function destroy(Fecalysis $fecalysis)
    {
        $fecalysis->delete();
        return response()->json(['message' => 'Fecalysis record deleted']);
    }

    private function generateOrNumber($latestRecord)
    {
        $lastNumber = $latestRecord ? intval($latestRecord->orNumber) : 0;
        return str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
    }
}
