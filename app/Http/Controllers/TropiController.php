<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tropi;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class tropiController extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = tropi::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('tropi', [
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

            'exam' =>'nullable|string',
            'kit' =>'nullable|string',
            'result' =>'nullable|numeric',
            
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in tropi table
        tropi::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,

            'exam' => $request->exam,
            'kit' => $request->kit,
            'result' => $request->result, 

            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('tropi.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^TROPI$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "TROPI" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }


}
