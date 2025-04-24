<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\urinalysis;
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
        $latestRecord = urinalysis::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

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
        // Validate input
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'OR' => 'nullable|string',
            'Reqby' => 'nullable|string',
            'date' => 'nullable|string',
            
            'color' =>'nullable|string',
            'transparency' =>'nullable|string',
            'ph' =>'nullable|string',
            'gravity'=>'nullable|string',

            'protein'=>'nullable|string',
            'glucose'=>'nullable|string',
            'ketones'=>'nullable|string',
            'bilirubin'=>'nullable|string',
            'pregnancy'=>'nullable|string',
            'others'=>'nullable|string',

            'rbc'=>'nullable|numeric',
            'wbc'=>'nullable|numeric',
            'sec'=>'nullable|string',
            'mucus'=>'nullable|string',
            'bacteria'=>'nullable|string',

            'au'=>'nullable|string',
            'ap'=>'nullable|string',
            'ua'=>'nullable|string',
            'co'=>'nullable|string',
            'tp'=>'nullable|string',

            'hyaline'=>'nullable|numeric',
            'granular'=>'nullable|numeric',
            'wbc2'=>'nullable|numeric',
            'rbc2'=>'nullable|numeric',
            
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in urinalysis table
        urinalysis::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,
            'date' => $request->date,

            'color' => $request->color,
            'transparency' => $request->transparency,
            'ph' => $request->ph, 
            'gravity'=> $request->gravity,

            'protein'=> $request->protein,
            'glucose'=> $request->glucose,
            'ketones'=> $request->ketones,
            'bilirubin'=> $request->bilirubin,
            'pregnancy'=> $request->pregnancy,
            'others'=> $request->others,

            'rbc'=> $request->rbc,
            'wbc'=> $request->wbc,
            'sec'=> $request->sec,
            'mucus'=> $request->mucus,
            'bacteria'=> $request->bacteria,

            'au'=> $request->au,
            'ap'=> $request->ap,
            'ua'=> $request->ua,
            'co'=> $request->co,
            'tp'=> $request->tp,

            'hyaline'=> $request->hyaline,
            'granular'=> $request->granular,
            'wbc2'=> $request->wbc2,
            'rbc2'=> $request->rbc2,

            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('urinalysis.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^UR$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "UR" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
    public function search()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        
        $data = urinalysis::where('OR', request('OR'))->first();

        return view('UrinalysisSearch', [
            'data' => $data,
            'user' => $user
        ]);
    }



}
