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

        $latestRecord = Urinalysis::latest()->first();
        $orNumber = $this->generateOrNumber($latestRecord);

        return view('urinalysis', compact('patients', 'user', 'orNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'or' => 'required|string',
            'date' => 'required|date',
            'requested_by' => 'required|string',
            'color' => 'nullable|string',
            'transparency' => 'nullable|string',
            'ph' => 'nullable|string',
            'gravity' => 'nullable|string',
            'rbc' => 'nullable|string',
            'wbc' => 'nullable|string',
            'SEC' => 'nullable|string',
            'Thread' => 'nullable|string',
            'bacteria' => 'nullable|string',
            'protein' => 'nullable|string',
            'glucose' => 'nullable|string',
            'ketones' => 'nullable|string',
            'bilirubin' => 'nullable|string',
            'pregnancy_test' => 'nullable|string',
            'others' => 'nullable|string',
            'au' => 'nullable|string',
            'ap' => 'nullable|string',
            'ua' => 'nullable|string',
            'co' => 'nullable|string',
            'tp' => 'nullable|string',
                    'hyaline' => 'nullable|numeric',
        'granular' => 'nullable|numeric',
        'wbc2' => 'nullable|numeric',
        'rbc2' => 'nullable|numeric',
        ]);

        Urinalysis::create($request->all());

        return redirect()->route('urinalysis.create')->with('success', 'Data saved successfully.');
    }

    private function generateOrNumber($latestRecord)
    {
        $datePart = now()->format('mdY');
        $lastNumber = 1;

        if ($latestRecord && str_starts_with($latestRecord->OR, "UR$datePart")) {
            $lastNumber = (int) substr($latestRecord->OR, -4) + 1;
        }

        return "UR" . $datePart . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}



