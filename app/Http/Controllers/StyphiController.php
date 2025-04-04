<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\styphi;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class styphiController extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = styphi::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('styphi', [
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

            'kit' =>'nullable|string',
            'lotno' => 'nullable|string',
            'result1' =>'nullable|string',
            'result2' =>'nullable|string',
            
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in styphi table
        styphi::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,

            'kit' => $request->kit,
            'lotno' =>$request->lotno,
            'result1' => $request->result1,
            'result2' => $request->result2, 

            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('styphi.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^STY$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            $lastNumber = (int) $matches[1] + 1;
        }

        return "STY" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }


}
