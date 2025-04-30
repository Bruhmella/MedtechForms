<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rbs;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class RbsController extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = rbs::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('rbs', [
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
//start copy here
            'patient_id' => 'required|exists:patients,id',
            'OR' => 'nullable|string',
            'Reqby' => 'nullable|string',
            'date' => 'nullable|string',
//end here
            'result' =>'nullable|string',
            'result2' =>'nullable|string',
//start here
            'medtech' => 'nullable|string',
            'mtlicno' => 'nullable|string',
            'pathologist' => 'nullable|string',
            'ptlicno'=> 'nullable|string',
//end here
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in rbs table
        rbs::create([
//start here
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,
            'date' => $request->date,
//end here
            'result' => $request->result,  // ✅ Added this
            'result2' => $request->result2, // ✅ Added this
//start heree
            'medtech' => $request->medtech,
            'mtlicno' => $request->mtlicno,
            'pathologist' => $request->pathologist,
            'ptlicno' => $request->ptlicno,
//end here
        ]);

        return redirect()->route('rbs.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^RBS$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "RBS" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }

        public function search()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
        
        $data = rbs::where('OR', request('OR'))->first();

        return view('RbsSearch', [
            'data' => $data,
            'user' => $user
        ]);
    }


}
