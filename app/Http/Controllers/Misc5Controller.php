<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\misc5;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class Misc5Controller extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = misc5::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('misc5', [
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
            'lotno' => 'nullable|string',
            'result' =>'nullable|string',

      //      
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

        // Store data in misc5 table
        misc5::create([
            'OR' => $request->OR,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'Reqby' => $request->Reqby,

            'exam' => $request->exam,
            'kit' => $request->kit,
            'lotno' =>$request->lotno,
            'result' => $request->result,
     //       
     //       'lotno2' =>$request->lotno2,
       //     'lotno3' =>$request->lotno3,
         //   'result1' => $request->result1,
           // 'result2' => $request->result2, 
          //  'result3' => $request->result3,

            'medtech' => $request->medtech,
            'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('misc5.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^MCV$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            $lastNumber = (int) $matches[1] + 1;
        }

        return "MCV" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }


}
