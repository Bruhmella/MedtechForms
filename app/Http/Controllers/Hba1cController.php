<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hba1c;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class Hba1cController extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = hba1c::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('hba1c', [
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
    'patient_id' => 'required|exists:patients,id',
    'OR' => 'nullable|string',
    'Reqby' => 'nullable|string',
    'date' => 'nullable|string',

    'test' => 'required|array|min:1|max:3',
    'test.*' => 'nullable|string',

    'result' => 'required|array|min:1|max:3',
    'result.*' => 'nullable|numeric',

    'unit' => 'required|array|min:1|max:3',
    'unit.*' => 'nullable|string',


    'medtech' => 'nullable|string',
    'mtlicno' => 'nullable|string',
    'pathologist' => 'nullable|string',
    'ptlicno' => 'nullable|string',
]);


        // Fetch patient details
$patient = BasicPatData::findOrFail($request->patient_id);

for ($i = 0; $i <= count($request->result); $i++) {
    // Skip empty rows
    if (empty($request->test[$i]) && empty($request->result[$i]) && empty($request->unit[$i])) {
        continue;
    }

    hba1c::create([
        'OR' => $request->OR,
        'Pname' => $patient->Pname,
        'Page' => $patient->Page,
        'Psex' => $patient->Psex,
        'Poc' => $patient->Poc,
        'Reqby' => $request->Reqby,
        'date' => $request->date,

        'test' => $request->test[$i],
        'result' => $request->result[$i],
        'unit' => $request->unit[$i],

        'medtech' => $request->medtech,
        'mtlicno' => $request->mtlicno,
        'pathologist' => $request->pathologist,
        'ptlicno' => $request->ptlicno,
    ]);
}

        return redirect()->route('hba1c.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^MISC1$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "MISC1" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
    
public function search()
{
    $user = session('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    // Fetch main record
    $data = hba1c::where('OR', request('OR'))->first();

    // Fetch related test rows (assuming table is hba1c_tests and has a foreign key 'OR')
    $dataRows = hba1c::where('OR', request('OR'))->get();

    return view('hba1csearch', [
        'data' => $data,
        'dataRows' => $dataRows,
        'user' => $user
    ]);
}




}
