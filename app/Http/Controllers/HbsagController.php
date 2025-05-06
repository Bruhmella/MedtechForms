<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hbsag;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class HbsagController extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = hbsag::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('hbsag', [
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
        // Validate input
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'OR' => 'nullable|string',
            'Reqby' => 'nullable|string',
            'date' => 'nullable|string',

        //'test' => 'required|array|min:1|max:3',
        //'test.*' => 'nullable|string',
            'exam' =>'required|array|min:1|max:3',
            'exam.*' => 'nullable|string',

            'kit' => 'required|array|min:1|max:3',
            'kit.*' =>'nullable|string',

            'lotno' =>'required|array|min:1|max:3',
            'lotno.*' =>'nullable|string',

            'result' => 'required|array|min:1|max:3',
            'result.*' =>'nullable|string',
            
            'medtech' => 'nullable|string',
            'mtlicno' => 'nullable|string',
            'pathologist' => 'nullable|string',
            'ptlicno' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in hbsag table
        hbsag::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,
            'date' => $request->date,

            //'test' => $request->test[$i],
            'exam' => $request->exam[$i],
            'kit' => $request->kit[$i],
            'lotno' => $request->lotno[$i],  
            'result' => $request->result[$i], 

            'medtech' => $request->medtech,
            'mtlicno' => $request->mtlicno,
            'pathologist' => $request->pathologist,
            'ptlicno' => $request->ptlicno,
        ]);

        return redirect()->route('hbsag.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^HBS$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "HBS" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
    public function search()
{
    $user = session('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    // Fetch main record
    $data = hbsag::where('OR', request('OR'))->first();

    // Fetch related test rows (assuming table is hba1c_tests and has a foreign key 'OR')
    $dataRows = hbsag::where('OR', request('OR'))->get();

    return view('hbsagsearch', [
        'data' => $data,
        'dataRows' => $dataRows,
        'user' => $user
    ]);
}


}
