<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\misc2;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class Misc2Controller extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = misc2::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('misc2', [
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
            'specimen' =>'nullable|string',
            'result' =>'nullable|string',

      //      'lotno1' => 'nullable|string',
      //      'lotno2' => 'nullable|string',
        //    'lotno3' => 'nullable|string',


       //     'result1' =>'nullable|string',
        //    'result2' =>'nullable|string',
       //     'result3' =>'nullable|string',
            
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in misc2 table
        misc2::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,

            'exam' => $request->exam,
            'specimen' => $request->specimen,
            'result' => $request->result,
     //       'lotno1' =>$request->lotno1,
     //       'lotno2' =>$request->lotno2,
       //     'lotno3' =>$request->lotno3,
         //   'result1' => $request->result1,
           // 'result2' => $request->result2, 
          //  'result3' => $request->result3,

            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('misc2.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^MCII$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            $lastNumber = (int) $matches[1] + 1;
        }

        return "MCII" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }


}
