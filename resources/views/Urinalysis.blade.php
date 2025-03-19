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
                document.getElementById("ac").value = patient.Poc;
                document.getElementById("date").value = new Date().toISOString().split('T')[0];
            }
        }

        function fillByAC() {
            var enteredAC = document.getElementById("ac").value.trim();
            var patient = patients.find(p => p.Poc == enteredAC);

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
        @csrf 

        <label for="patientSelect">Select Patient:</label>
        <select id="patientSelect" name="patient_id" onchange="fillPatientData()">
            <option value="">-- Select a Patient --</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->Pname }}</option>
            @endforeach
        </select>

        <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="ac" oninput="fillByAC()"></p>
        <p>Age: <input type="text" id="age" readonly></p>
        <p>Sex: <input type="text" id="sex" readonly></p>
        <p>Date: <input type="date" id="date" name="date" readonly></p>
        <p>OR#: <input type="text" id="orNumber" name="or" value="{{ $orNumber }}" readonly></p>
        <p>Requested by: <input type="text" name="requested_by" placeholder="Enter requester name"></p>

        <h2>Physical Characteristics</h2>
        <p>Color: <input type="text" name="color"></p>
        <p>Transparency: <input type="text" name="transparency"></p>
        <p>pH: <input type="text" name="ph"></p>
        <p>Specific Gravity: <input type="text" name="gravity"></p>
        
        <h2>Microscopic Findings</h2>
        <p>RBC: <input type="number" name="rbc" min="0" step="1" placeholder="Enter RBC count"></p>
        <p>WBC: <input type="number" name="wbc" min="0" step="1" placeholder="Enter WBC count"></p>
        <p>Squamous Epithelial Cells: <input type="text" name="SEC"></p>
        <p>Mucus Threads: <input type="text" name="Thread"></p>
        <p>Bacteria: <input type="text" name="bacteria"></p>
        
        <button type="submit">Save</button>
    </form>
</body>
</html>
