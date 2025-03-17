<!DOCTYPE html>
<html>
<head>
    <title>Urinalysis Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        h1, h2 {
            font-family: Cambria;
        }
        a {
            font-family: Calibri;
        }
    </style>
    <script>
        let patients = @json($patients);

        function fillPatientData() {
            var selectedId = document.getElementById("patientSelect").value;
            var patient = patients.find(p => p.id == selectedId);
            
            if (patient) {
                document.getElementById("age").value = patient.Page;
                document.getElementById("sex").value = patient.Psex;
                document.getElementById("ac").value = patient.Poc; // Auto-fill AC#
                document.getElementById("date").value = new Date().toISOString().split('T')[0];
            }
        }

        function fillByAC() {
            var enteredAC = document.getElementById("ac").value.trim();
            var patient = patients.find(p => p.Poc == enteredAC); // Match AC#

            if (patient) {
                document.getElementById("patientSelect").value = patient.id;
                document.getElementById("age").value = patient.Page;
                document.getElementById("sex").value = patient.Psex;
            }
        }
    </script>
</head>
<body>
    <h1>Urinalysis Form</h1>
    <a href="{{ route('home') }}"><button>Home</button></a>
    
    <h2>Patients' Data</h2>

    <form action="{{ route('urinalysis.store') }}" method="POST">
        @csrf <!-- Laravel security token -->

        <label for="patientSelect">Select Patient:</label>
        <select id="patientSelect" name="patient_id" onchange="fillPatientData()">
            <option value="">-- Select a Patient --</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->Pname }}</option>
            @endforeach
        </select>

        <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="ac" oninput="fillByAC()"></p> <!-- ✅ Editable AC# -->
        <p>Age: <input type="text" id="age" readonly></p>
        <p>Sex: <input type="text" id="sex" readonly></p>
        <p>Date: <input type="date" id="date" name="date" readonly></p>
        <p>OR#: <input type="text" id="orNumber" name="or" value="{{ $orNumber }}" readonly></p>

		<!-- Requested by field (editable) -->
		<p>Requested by: <input type="text" name="requested_by" placeholder="Enter requester name"></p>



        <!-- Submit Button -->
        <button type="submit">Save</button>
    </form>
</body>
</html>
