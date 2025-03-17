<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicPatData;

class BasicPatController extends Controller
{

    public function create()
{
    // Check if user session exists
    $user = session('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    return view('add_patient', ['user' => $user]);
}


   public function store(Request $request)
{
    if (!session('user')) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    $request->validate([
        'Pname' => 'required|string|max:255',
        'Page' => 'required|integer|min:0',
        'Psex' => 'required|string|in:M,F',
    ]);

    // Get today's date part (MMDDYY)
    $datePart = now()->format('mdy'); // Example: 031325 (March 13, 2025)

    \DB::beginTransaction(); // 🛑 START TRANSACTION (Prevents race conditions)

    try {
        // ======= Generate Unique Poc (Patient Account Number) =======
        $lastPoc = BasicPatData::withTrashed()
            ->where('Poc', 'like', "AC{$datePart}%") // 🛑 Consider soft-deleted records
            ->lockForUpdate() // 🛑 Prevents race conditions
            ->orderBy('Poc', 'desc')
            ->first();

        if ($lastPoc) {
            $lastPocNumber = (int) substr($lastPoc->Poc, 8); // Extract numeric part
            $nextPocNumber = $lastPocNumber + 1;
        } else {
            $nextPocNumber = 1;
        }

        $numPocPart = str_pad($nextPocNumber, 3, '0', STR_PAD_LEFT);
        $generatedPoc = "AC{$datePart}{$numPocPart}";

        // ======= Generate Unique Por (Official Receipt Number) =======
        $lastPor = BasicPatData::withTrashed()
            ->where('Por', 'like', "OR{$datePart}%") // 🛑 Consider soft-deleted records
            ->lockForUpdate() // 🛑 Prevents race conditions
            ->orderBy('Por', 'desc')
            ->first();

        if ($lastPor) {
            $lastPorNumber = (int) substr($lastPor->Por, 8);
            $nextPorNumber = $lastPorNumber + 1;
        } else {
            $nextPorNumber = 1;
        }

        $numPorPart = str_pad($nextPorNumber, 3, '0', STR_PAD_LEFT);
        $generatedPor = "OR{$datePart}{$numPorPart}";

        // ✅ Now Poc and Por are guaranteed to be unique before inserting!
        BasicPatData::create([
            'Pname' => $request->Pname,
            'Page' => $request->Page,
            'Psex' => $request->Psex,
            'Poc' => $generatedPoc,
            'Por' => $generatedPor,
        ]);

        \DB::commit(); // ✅ COMMIT TRANSACTION (Save changes)

        return redirect()->route('PatDataManage')->with('success', 'Patient data added successfully.');

    } catch (\Exception $e) {
        \DB::rollBack(); // 🛑 ROLLBACK TRANSACTION (Prevent duplicate insertions)
        return redirect()->route('PatDataManage')->with('error', 'Error adding patient data: ' . $e->getMessage());
    }
}

public function search(Request $request)
{
    // Check if user is logged in
    $user = session('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    $query = $request->input('query');

    // Check if input is numeric and has 1-2 digits (prioritize age search)
    if (is_numeric($query) && strlen($query) <= 2) {
        $patients = BasicPatData::where('Page', $query) // Search by age first
            ->orWhere('Poc', 'LIKE', "%{$query}%") // Then search in Account Number
            ->get();
    } else {
        // General search (Name, Account Number, or Age)
        $patients = BasicPatData::where('Pname', 'LIKE', "%{$query}%")
            ->orWhere('Page', $query)
            ->orWhere('Poc', 'LIKE', "%{$query}%")
            ->get();
    }

    return view('PatDataManage', compact('patients', 'user')); // ✅ Pass user session to view
}


    public function edit($id)
{
    $patient = BasicPatData::findOrFail($id);
    return view('PatEdit', compact('patient'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'Pname' => 'required|string|max:255',
        'Page' => 'required|integer|min:0',
        'Psex' => 'required|string|in:M,F',
    ]);

    $patient = BasicPatData::findOrFail($id);
    $patient->update([
        'Pname' => $request->Pname,
        'Page' => $request->Page,
        'Psex' => $request->Psex,
    ]);

    return redirect()->route('PatDataManage')->with('success', 'Patient data updated successfully.');
}

public function archive($id)
{
     $patient = BasicPatData::findOrFail($id);
    $patient->delete(); // Soft delete (archived)
    return redirect()->route('PatDataManage')->with('success', 'Patient data archived successfully.');
}
public function archivedPatients()
{
    $user = session('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    $archivedPatients = BasicPatData::onlyTrashed()->get(); // ✅ Fetch soft-deleted records

    return view('Parchives', compact('archivedPatients', 'user')); // ✅ Pass user session to view
}

public function permanentDelete($id)
{
    $patient = BasicPatData::withTrashed()->findOrFail($id); // ✅ Find including soft-deleted records

    if ($patient) {
        $patient->forceDelete(); // ✅ Fully delete the record
    }

    return redirect()->route('PatDataManage')->with('success', 'Patient permanently deleted.');
}
public function restore($id)
{
    $patient = BasicPatData::withTrashed()->findOrFail($id); // Find the soft-deleted record
    $patient->restore(); // Restore the patient
    return redirect()->route('PatDataManage')->with('success', 'Patient restored successfully.');
}
public function managePatients(Request $request) {
    // Get logged-in user from session
        $user = session('user');

        // Redirect to login if no user is found
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        $sort = $request->query('sort', 'name_asc'); // Default sorting by name A-Z
        $query = BasicPatData::query(); 

        switch ($sort) {
            case 'name_asc':
                $query->orderBy('Pname', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('Pname', 'desc');
                break;
            case 'age_asc':
                $query->orderBy('Page', 'asc');
                break;
            case 'age_desc':
                $query->orderBy('Page', 'desc');
                break;
        }

        $patients = $query->get();

        return view('PatDataManage', compact('patients', 'user'));
}










}
