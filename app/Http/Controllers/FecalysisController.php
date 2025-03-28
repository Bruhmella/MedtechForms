<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecalysis;
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

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

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
    // Validate the data from the form
    $request->validate([
        'patient_id' => 'required|exists:patients,id', // Ensure patient exists
        'color' => 'nullable|string',
        'consistency' => 'nullable|string',
        'occult_blood' => 'nullable|string',
        'sudan_stain' => 'nullable|string',
        'bacteria' => 'nullable|string',
        'yeast' => 'nullable|string',
        'fat_globules' => 'nullable|string',
        'others' => 'nullable|string',
        'wbc' => 'nullable|numeric',
        'rbc' => 'nullable|numeric',
        'medtech' => 'nullable|string',
        'pathologist' => 'nullable|string',
        // Other validation rules
    ]);

    // Store fecalysis data
    Fecalysis::create([
        'OR' => $request->or,
        'patient_id' => $request->patient_id, // Ensure this is the patient ID being passed
        'color' => $request->color,
        'consistency' => $request->consistency,
        'occult_blood' => $request->occult_blood,
        'sudan_stain' => $request->sudan_stain,
        'bacteria' => $request->bacteria,
        'yeast' => $request->yeast,
        'fat_globules' => $request->fat_globules,
        'others' => $request->others,
        'wbc' => $request->wbc,
        'rbc' => $request->rbc,
        'medtech' => $request->medtech,
        'pathologist' => $request->pathologist,
        'Poc' => $request->ac, // If this is the account number
        'Pname' => $request->Pname, // Assuming patient name is passed as Pname
        'Page' => $request->Page, // Assuming patient age
        'Psex' => $request->Psex, // Assuming patient sex
        'date' => $request->date, // Assuming date is passed
        'or' => $request->or, // OR number
        'requested_by' => $request->requested_by, // Requester's name
    ]);

    return redirect()->route('Fecalysis.create')->with('success', 'Data saved successfully.');
}


    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY');
        $lastNumber = 1;

        if ($latestRecord && str_starts_with($latestRecord->Poc, "FC$datePart")) {
            $lastNumber = (int) substr($latestRecord->Poc, -4) + 1;
        }

        return "FC" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}
