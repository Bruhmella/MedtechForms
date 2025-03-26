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
<!--- script to get patient data from dropdown---->
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
<!---script for dropdown autofill--->
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
<!----script ends---->
        <h2>Physical Characteristics</h2>
        <p>Color: <input type="text" name="color"></p>
        <p>Transparency: <input type="text" name="transparency"></p>
        <p>pH: <input type="text" name="ph"></p>
        <p>Specific Gravity: <input type="text" name="gravity"></p>
        
        <h2>Microscopic Findings</h2>
        <p>RBC: <input type="number" name="rbc" min="0" step="0.1" placeholder="Enter RBC count"></p>
        <p>WBC: <input type="number" name="wbc" min="0" step="0.1" placeholder="Enter WBC count"></p>
        <p>Squamous Epithelial Cells: <input type="text" name="SEC"></p>
        <p>Mucus Threads: <input type="text" name="Thread"></p>
        <p>Bacteria: <input type="text" name="bacteria"></p>

        <h2>Chemical Test</h2>
        <p>Protein: <input type="text" name="protein" placeholder="Enter Protein level"></p>
        <p>Glucose: <input type="text" name="glucose" placeholder="Enter Glucose level"></p>
        <p>Ketones: <input type="text" name="ketones" placeholder="Enter Ketones level"></p>
        <p>Bilirubin: <input type="text" name="bilirubin" placeholder="Enter Bilirubin level"></p>
        <p>Pregnancy Test: <input type="text" name="pregnancy_test" placeholder="Enter Pregnancy Test result"></p>
        <p><b>OTHER/S: </b><input type="text" name="others" style="height: 100px; width: 300px;"></p>

        <h2>Crystals</h2>
        <p>Amorphous Urates: <input type="text" name="au" placeholder="Enter Amorphous Urates level"></p>
        <p>Amorphous Phosphates: <input type="text" name="ap" placeholder="Enter Amorphous Phosphates level"></p>
        <p>Uric Acid: <input type="text" name="ua" placeholder="Enter Uric Acid level"></p>
        <p>Calcium Oxalate: <input type="text" name="co" placeholder="Enter Calcium Oxalate level"></p>
        <p>Triple Phosphate: <input type="text" name="tp" placeholder="Enter Triple Phosphate level"></p>

        <h2>Casts</h2>
        <p>Hyaline: <input type="number" name="hyaline" min="0" step="0.1" placeholder="Enter Hyaline count"></p>
        <p>Granular: <input type="number" name="granular" min="0" step="0.1" placeholder="Enter Granular count"></p>
        <p>WBC: <input type="number" name="wbc2" min="0" step="0.1" placeholder="Enter WBC count"></p>
        <p>RBC: <input type="number" name="rbc2" min="0" step="0.1" placeholder="Enter RBC count"></p>

<!---check if user is medtech/pathologist w script--->
<h2>Medical Technologist:</h2>

@if($medtech)
    <input type="text" value="{{ $medtech->fname . ' ' . $medtech->lname ?? '' }}" />
    <input type="text" value="{{ $medtech->LicNo ?? '' }}" />

@elseif($pathologist)
    <select id="medtechDropdown">
        @foreach($medtechs as $medtech)
            <option value="{{ $medtech->id }}" data-licno="{{ $medtech->LicNo }}">
                {{ $medtech->fname . ' ' . $medtech->lname }}
            </option>
        @endforeach
    </select>

    <input type="text" id="medtechLicNo" value="" readonly />
@endif

<h3>Pathologist:</h3>

@if($pathologist)
    <input type="text" value="{{ $pathologist->fname . ' ' . $pathologist->lname ?? '' }}" />
    <input type="text" value="{{ $pathologist->LicNo ?? '' }}" />
@elseif($medtech)
    <select id="pathologistDropdown">
        @foreach($pathologists as $pathologist)
            <option value="{{ $pathologist->id }}" data-licno="{{ $pathologist->LicNo }}">
                {{ $pathologist->fname . ' ' . $pathologist->lname }}
            </option>
        @endforeach
    </select>

    <input type="text" id="pathologistLicNo" value="" readonly />
@endif

<button type="submit">Save</button>

<script>
    // JavaScript to update the LicNo textbox based on dropdown selection
    document.getElementById('pathologistDropdown')?.addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var licNo = selectedOption.getAttribute('data-licno'); // Get the LicNo from the selected option
        
        // Fill the textbox with the selected pathologist's LicNo
        document.getElementById('pathologistLicNo').value = licNo;
    });

    document.getElementById('medtechDropdown')?.addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var licNo = selectedOption.getAttribute('data-licno'); // Get the LicNo from the selected option
        
        // Fill the textbox with the selected medtech's LicNo
        document.getElementById('medtechLicNo').value = licNo;
    });

    // Trigger the change event to autofill the LicNo for the selected medtech or pathologist on page load
    window.addEventListener('load', function() {
        // Check if we're logged in as a pathologist and medtech dropdown exists
        if (document.getElementById('medtechDropdown')) {
            var medtechDropdown = document.getElementById('medtechDropdown');
            // If the dropdown has a selected option, set the LicNo
            if (medtechDropdown.selectedIndex >= 0) {
                var selectedOption = medtechDropdown.options[medtechDropdown.selectedIndex];
                var licNo = selectedOption.getAttribute('data-licno');
                document.getElementById('medtechLicNo').value = licNo;
            }
        }

        // Check if we're logged in as a medtech and pathologist dropdown exists
        if (document.getElementById('pathologistDropdown')) {
            var pathologistDropdown = document.getElementById('pathologistDropdown');
            // If the dropdown has a selected option, set the LicNo
            if (pathologistDropdown.selectedIndex >= 0) {
                var selectedOption = pathologistDropdown.options[pathologistDropdown.selectedIndex];
                var licNo = selectedOption.getAttribute('data-licno');
                document.getElementById('pathologistLicNo').value = licNo;
            }
        }
    });
</script>
<!-----check acc/script ends--->

 
</body>
</html>
