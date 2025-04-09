<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\misc3;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class Misc3Controller extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = misc3::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('misc3', [
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

            'timec' => 'nullable|date_format:H:i',
            'timer' => 'nullable|date_format:H:i',  //time format

            'color' =>'nullable|string',
            'viscocity' =>'nullable|string',

            'volume' => 'nullable|string',
            'motile' => 'nullable|numeric',
            'nonmotile' => 'nullable|numeric',


            'motilegrade' =>'nullable|string',

            'normal' =>'nullable|numeric',
            'abnormal' =>'nullable|numeric',
            'Thead' =>'nullable|numeric',
            'Ghead' =>'nullable|numeric',
            'Phead' =>'nullable|numeric',
            'Ctail' =>'nullable|numeric',
            'Chead' =>'nullable|numeric',
            
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in misc3 table
        misc3::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,

    'timec' => $request->timec,  // nullable|date_format:h:i A
    'timer' => $request->timer,  // nullable|date_format:h:i A

    'color' => $request->color,  // nullable|string
    'viscocity' => $request->viscocity,  // nullable|string

    'volume' => $request->volume,  // nullable|string
    'motile' => $request->motile,  // nullable|numeric
    'nonmotile' => $request->nonmotile,  // nullable|numeric

    'motilegrade' => $request->motilegrade,  // nullable|string

    'normal' => $request->normal,  // nullable|numeric
    'abnormal' => $request->abnormal,  // nullable|numeric
    'Thead' => $request->Thead,  // nullable|numeric
    'Ghead' => $request->Ghead,  // nullable|numeric
    'Phead' => $request->Phead,  // nullable|numeric
    'Ctail' => $request->Ctail,  // nullable|numeric
    'Chead' => $request->Chead,  // nullable|numeric
            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('misc3.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^MCIII$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            $lastNumber = (int) $matches[1] + 1;
        }

        return "MCIII" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }


}
