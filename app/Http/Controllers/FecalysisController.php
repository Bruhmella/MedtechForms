<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecalysis;
use App\Models\BasicPatData;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class FecalysisController extends Controller
{
    public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();
        $latestRecord = Fecalysis::orderBy('OR', 'desc')->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        $pathologists = Account::where('Pos', 'P')->get();
        $medtechs = Account::where('Pos', 'MT')->get();

        $pathologist = $user->Pos === 'P' ? $user : null;
        $medtech = $user->Pos === 'MT' ? $user : null;

        return view('fecalysis', [
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
            'color' => 'nullable|string',
            'consistency' => 'nullable|string',
            'occult_blood' => 'nullable|string',
            'sudan_stain' => 'nullable|string',
            'bacteria' => 'nullable|string',
            'yeast' => 'nullable|string',
            'fat_globules' => 'nullable|string',
            'others' => 'nullable|string',
            'wbc' => 'nullable|numeric',
            'rbc' => 'nullable|numeric',
            'requested_by' => 'nullable|string',
            'medtech' => 'nullable|string',
            'medtech_licno' => 'nullable|string',
            'pathologist' => 'nullable|string',
            'pathologist_licno' => 'nullable|string',
        ]);

        // Debugging: Log all request data
        \Log::info('Request Data: ', $request->all());

        // Fetch selected MedTech and Pathologist
        $medtech = $request->medtech ?? 'Not Assigned';
        $medtechLicNo = $request->medtech_licno ?? '';

        $pathologist = $request->pathologist ?? 'Not Assigned';
        $pathologistLicNo = $request->pathologist_licno ?? '';

        \Log::info('MedTech: ' . $medtech . ' | LicNo: ' . $medtechLicNo);
        \Log::info('Pathologist: ' . $pathologist . ' | LicNo: ' . $pathologistLicNo);

        // Fetch patient details
        $patient = BasicPatData::findOrFail($request->patient_id);

        // Store data in fecalysis table
        Fecalysis::create([
            'OR' => $request->or,
            'Pname' => $patient->Pname,
            'Page' => $patient->Page,
            'Psex' => $patient->Psex,
            'Poc' => $patient->Poc,
            'color' => $request->color,
            'consistency' => $request->consistency,
            'occult_blood' => $request->occult_blood,
            'sudan_stain' => $request->sudan_stain,
            'bacteria' => $request->bacteria,
            'yeast' => $request->yeast,
            'fat_globules' => $request->fat_globules,
            'others' => $request->others,
            'wbc' => $request->wbc,
            'rbc' => $request->rbc,
            'date' => $request->date,
            'requested_by' => $request->requested_by,
            'medtech' => $medtech,
            'medtech_licno' => $medtechLicNo,
            'pathologist' => $pathologist,
            'pathologist_licno' => $pathologistLicNo,
        ]);

        return redirect()->route('Fecalysis.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY'); // MMDDYYYY format
        $lastNumber = 1;

        if ($latestRecord && isset($latestRecord->OR) && preg_match("/^FC$datePart(\d{4})$/", $latestRecord->OR, $matches)) {
            // Extract last 4-digit number and increment
            $lastNumber = (int) $matches[1] + 1;
        }

        return "FC" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}
