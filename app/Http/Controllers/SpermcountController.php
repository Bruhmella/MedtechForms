<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spermcount;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class SpermcountController extends Controller
{
        public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = spermcount::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('spermcount', [
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
            'timer' => 'nullable|date_format:H:i',
            'timel' => 'nullable|date_format:H:i',  //time format

            'color' =>'nullable|string',
            'viscocity' =>'nullable|string',
            'volume' => 'nullable|string',
            
            'motile' => 'nullable|numeric',
            'nonmotile' => 'nullable|numeric',


            'motilegrade' =>'nullable|string',

            'normal' =>'nullable|numeric',
            'abnormal' =>'nullable|numeric',
            'Phead' =>'nullable|numeric',
            'Ghead' =>'nullable|numeric',
            'Dhead' =>'nullable|numeric',
            'Ctail' =>'nullable|numeric',
            'spermatid' =>'nullable|numeric',
            
            'medtech' => 'nullable|string',
            'pathologist' => 'nullable|string',
        ]);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in spermcount table
        spermcount::create([
    'OR' => $request->OR,
    'Pname' => $patient->Pname,
    'Page' => $patient->Page,
    'Psex' => $patient->Psex,
    'Poc' => $patient->Poc,
    'Reqby' => $request->Reqby,

    'timec' => $request->timec,
    'timer' => $request->timer,
    'timel' => $request->timel, // Added based on validation

    'color' => $request->color,
    'viscocity' => $request->viscocity,
    'volume' => $request->volume,

    'motile' => $request->motile,
    'nonmotile' => $request->nonmotile,

    'motilegrade' => $request->motilegrade,

    'normal' => $request->normal,
    'abnormal' => $request->abnormal,
    'Phead' => $request->Phead,
    'Ghead' => $request->Ghead,
    'Dhead' => $request->Dhead,
    'Ctail' => $request->Ctail,
    'spermatid' => $request->spermatid,

    'medtech' => $request->medtech,
    'pathologist' => $request->pathologist,
        ]);

        return redirect()->route('spermcount.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^SPM$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            $lastNumber = (int) $matches[1] + 1;
        }

        return "SPM" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }


}
