<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hematology;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class HematologyController extends Controller
{
    public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = Hematology::orderBy('OR', 'desc')->first(); // Fix: Correct model name from Patient to Hematology
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('hematology', [
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
            'date' => 'nullable|string',
            'Reqby' => 'nullable|string',
            'hemogoblin' => 'nullable|numeric',
            'hematocrit' => 'nullable|numeric',
            'rbc' => 'nullable|numeric',
            'wbc' => 'nullable|numeric',
            'segmenters' => 'nullable|numeric',
            'band' => 'nullable|numeric',
            'lymphocyte' => 'nullable|numeric',
            'Monocyte' => 'nullable|numeric',
            'Eosinophil' => 'nullable|numeric',
            'Basophil' => 'nullable|numeric',
            'Metamyelocyte' => 'nullable|numeric',
            'Myelocyte' => 'nullable|numeric',
            'Blast_Cell' => 'nullable|numeric',  // Fix here, renamed to match the input field
            'platelet' => 'nullable|numeric',
            'Reticulocyte' => 'nullable|numeric',
            'BLOOD_TYPING' => 'nullable|string',
            'rh_factor' => 'nullable|string',
            'esr' => 'nullable|numeric',
            'clotting_time' => 'nullable|numeric',
            'bleeding_time' => 'nullable|numeric',
            'medtech' => 'nullable|string',
            'mtlicno' => 'nullable|string',
            'pathologist' => 'nullable|string',
            'ptlicno' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in Hematology table
        Hematology::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'date' => $request->date,
            'Reqby' => $request->Reqby,
            'hemogoblin' => $request->hemogoblin,
            'hematocrit' => $request->hematocrit,
            'rbc' => $request->rbc,
            'wbc' => $request->wbc,
            'segmenters' => $request->segmenters,
            'band' => $request->band,
            'lymphocyte' => $request->lymphocyte,
            'Monocyte' => $request->Monocyte,
            'Eosinophil' => $request->Eosinophil,
            'Basophil' => $request->Basophil,
            'Metamyelocyte' => $request->Metamyelocyte,
            'Myelocyte' => $request->Myelocyte,
            'Blast_Cell' => $request->Blast_Cell,  // Fix here, renamed to input method
            'platelet' => $request->platelet,
            'Reticulocyte' => $request->Reticulocyte,
            'BLOOD_TYPING' => $request->BLOOD_TYPING,
            'rh_factor' => $request->rh_factor,
            'esr' => $request->esr,
            'clotting_time' => $request->clotting_time,
            'bleeding_time' => $request->bleeding_time,
            'medtech' => $request->medtech,
            'mtlicno' => $request->mtlicno,
            'pathologist' => $request->pathologist,
            'ptlicno' => $request->ptlicno,
        ]);

        return redirect()->route('hematology.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^HM$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "HM" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }

    public function search()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        
        $data = hematology::where('OR', request('OR'))->first();

        return view('HematologySearch', [
            'data' => $data,
            'user' => $user
        ]);
    }
}
