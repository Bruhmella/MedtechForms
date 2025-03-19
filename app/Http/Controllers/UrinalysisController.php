<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urinalysis;
use App\Models\BasicPatData;

class UrinalysisController extends Controller
{
    public function create()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $patients = BasicPatData::all();

        if ($patients->isEmpty()) {
            dd("No patients found in database");
        }

        // Generate OR Number
        $latestRecord = Urinalysis::latest()->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        return view('urinalysis', compact('patients', 'user', 'orNumber'));
    }

public function store(Request $request)
{
    // Validate input (optional, since fields are nullable)
    $request->validate([
        'or' => 'required|string',
        'date' => 'required|date', // Ensure the date is valid
        'requested_by' => 'required|string', // Add validation for 'requested_by'
        'color' => 'nullable|string', // Validate color input
        'transparency' => 'nullable|string', // Validate transparency input
        'ph' => 'nullable|string', // Validate pH input
        'gravity' => 'nullable|string', // Validate gravity input
        'rbc' => 'nullable|numeric', // Validate RBC input as numeric
        'wbc' => 'nullable|numeric', // Validate WBC input as numeric
        'SEC' => 'nullable|string', // Validate Squamous Epithelial Cells input
        'Thread' => 'nullable|string', // Validate Mucus Threads input
        'bacteria' => 'nullable|string', // Validate Bacteria input
    ]);

    // Save to database
    Urinalysis::create([
        'OR' => $request->or,
        'Date' => $request->date, // Save date correctly
        'ReqBy' => $request->requested_by, // Save 'Requested by' input to 'ReqBy'
        'color' => $request->color, // Save color input
        'transparency' => $request->transparency, // Save transparency input
        'ph' => $request->ph, // Save pH input
        'gravity' => $request->gravity, // Save gravity input
        'rbc' => $request->rbc, // Save RBC input
        'wbc' => $request->wbc, // Save WBC input
        'SEC' => $request->SEC, // Save Squamous Epithelial Cells input
        'Thread' => $request->Thread, // Save Mucus Threads input
        'bacteria' => $request->bacteria, // Save Bacteria input
    ]);

    return redirect()->route('urinalysis.create')->with('success', 'Data saved successfully.');
}






private function generateOrNumber($latestRecord)
{
    // Generate the date part (MMDDYYYY)
    $datePart = now()->format('mdY'); // e.g., "03172025"

    // Default the last number to 1 if no records exist
    $lastNumber = 1;

    if ($latestRecord) {
        // Check if the OR starts with "UR" and the current date part
        if (str_starts_with($latestRecord->OR, "UR$datePart")) {
            // Extract the last 4 digits (last number) from the OR number
            $lastNumber = (int) substr($latestRecord->OR, -4);

            // Increment the last number, but check if it exceeds 9999
            $lastNumber = ($lastNumber >= 9999) ? 10000 : $lastNumber + 1;
        }
    }

    // Format the OR number correctly (e.g., UR031720250001, UR0317202510000)
    return "UR" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
}
}
