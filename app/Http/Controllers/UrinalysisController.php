<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urinalysis;
use App\Models\BasicPatData;
use App\Models\Account; 
use Illuminate\Support\Facades\DB;

class UrinalysisController extends Controller
{
    public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = Urinalysis::latest()->first();
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

        return view('urinalysis', [
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
        $request->validate([
            'or' => 'required|string',
            'date' => 'required|date',
            'requested_by' => 'required|string',
            'color' => 'nullable|string',
            'transparency' => 'nullable|string',
            'ph' => 'nullable|string',
            'gravity' => 'nullable|string',
            'rbc' => 'nullable|string',
            'wbc' => 'nullable|string',
            'SEC' => 'nullable|string',
            'Thread' => 'nullable|string',
            'bacteria' => 'nullable|string',
            'protein' => 'nullable|string',
            'glucose' => 'nullable|string',
            'ketones' => 'nullable|string',
            'bilirubin' => 'nullable|string',
            'pregnancy_test' => 'nullable|string',
            'others' => 'nullable|string',
            'au' => 'nullable|string',
            'ap' => 'nullable|string',
            'ua' => 'nullable|string',
            'co' => 'nullable|string',
            'tp' => 'nullable|string',
            'hyaline' => 'nullable|numeric',
            'granular' => 'nullable|numeric',
            'wbc2' => 'nullable|numeric',
            'rbc2' => 'nullable|numeric',
        ]);

        // Debugging step: Check what is received
        // dd($request->all());

        Urinalysis::create([
            'OR' => $request->input('or'),  
            'Date' => $request->input('date'),
            'ReqBy' => $request->input('requested_by'),
            'color' => $request->input('color'),
            'transparency' => $request->input('transparency'),
            'ph' => $request->input('ph'),
            'gravity' => $request->input('gravity'),
            'rbc' => $request->input('rbc'),
            'wbc' => $request->input('wbc'),
            'SEC' => $request->input('SEC'),
            'Thread' => $request->input('Thread'),
            'bacteria' => $request->input('bacteria'),
            'protein' => $request->input('protein'),
            'glucose' => $request->input('glucose'),
            'ketones' => $request->input('ketones'),
            'bilirubin' => $request->input('bilirubin'),
            'pregnancy_test' => $request->input('pregnancy_test'),
            'others' => $request->input('others'),
            'au' => $request->input('au'),
            'ap' => $request->input('ap'),
            'ua' => $request->input('ua'),
            'co' => $request->input('co'),
            'tp' => $request->input('tp'),
            'hyaline' => $request->input('hyaline'),
            'granular' => $request->input('granular'),
            'wbc2' => $request->input('wbc2'),
            'rbc2' => $request->input('rbc2'),
        ]);

        return redirect()->route('urinalysis.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY');
        $lastNumber = 1;

        if ($latestRecord && str_starts_with($latestRecord->OR, "UR$datePart")) {
            $lastNumber = (int) substr($latestRecord->OR, -4) + 1;
        }

        return "UR" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}
