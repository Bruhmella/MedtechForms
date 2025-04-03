<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chemistry;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class ChemistryController extends Controller
{
    public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = Chemistry::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('chemistry', [
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
            'glucose' => 'nullable|numeric',
            'urea_nitrogen' => 'nullable|numeric',
            'creatine' => 'nullable|numeric',
            'uric_acid' => 'nullable|numeric',
            'total_cholesterol' => 'nullable|numeric',
            'triglyceride' => 'nullable|numeric',
            'hdl' => 'nullable|numeric',
            'ldl' => 'nullable|numeric',
            'vldl' => 'nullable|numeric',
            'ratio' => 'nullable|numeric',
            'ast' => 'nullable|numeric',
            'alt' => 'nullable|numeric',
            'sodium' => 'nullable|numeric',
            'potassium' => 'nullable|numeric',
            'chloride' => 'nullable|numeric',
            'ionized_calcium' => 'nullable|numeric',
            'protein' => 'nullable|numeric',
            'albumin' => 'nullable|numeric',
            'globulin' => 'nullable|numeric',
            'ag_ratio' => 'nullable|numeric',
            'alkaline' => 'nullable|numeric',
            'bilirubin' => 'nullable|numeric',
            'b2' => 'nullable|numeric',
            'b1' => 'nullable|numeric',
            'others' =>'nullable|string',
            'remarks' =>'nullable|string',
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in Chemistry table
        Chemistry::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,
            'glucose' => $request->glucose,
            'urea_nitrogen' => $request->urea_nitrogen,
            'creatine' => $request->creatine,
            'uric_acid' => $request->uric_acid,
            'total_cholesterol' => $request->total_cholesterol,
            'triglyceride' => $request->triglyceride,
            'hdl' => $request->hdl,
            'ldl' => $request->ldl,
            'vldl' => $request->vldl,
            'ratio' => $request->ratio,
            'ast' => $request->ast,
            'alt' => $request->alt,
            'sodium' => $request->sodium,
            'potassium' => $request->potassium,
            'chloride' => $request->chloride,
            'ionized_calcium' => $request->ionized_calcium,
            'protein' => $request->protein,
            'albumin' => $request->albumin,
            'globulin' => $request->globulin,
            'ag_ratio' => $request->ag_ratio,
            'alkaline' => $request->alkaline,
            'bilirubin' => $request->bilirubin,
            'b2' => $request->b2,
            'b1' => $request->b1,
            'others' => $request->others,  // ✅ Added this
            'remarks' => $request->remarks, // ✅ Added this
            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('chemistry.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^CH$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "CH" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}
