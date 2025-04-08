<!DOCTYPE html>
<html>
<head>
    <title>Urinalysis Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        h1, h2 {
            font-family: Cambria;
        }
        a {
            font-family: Calibri;
        }
        .topcontainer {
        display: grid;
        grid-template-areas:
            "toptext image";
        grid-template-columns: 4fr 1fr;
        }
        .topcontainer > div.toptext {
        grid-area: toptext;
        text-align: left;
        }
        .topcontainer > div.image {
        grid-area: image;
        }
        .container {
        width: 1200px; /* Adjust as needed */
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 20px;
        background-color:#ffffff;
        }
        .form-row {
        display: flex;
        margin-bottom: 5px;
        }
        .form-label {
        width: 200px; /* Adjust label width */
        text-align: right;
        padding-right: 10px;
        }
        .form-input {
        width: 250px; /* Adjust input width */
        }
        /* Style for the table-like structure */
        .table-like {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* Two columns */
        gap: 10px; /* Spacing between items */
        }

        .table-like-section {
        border: 1px solid #ccc;
        padding: 10px;
        }

        .table-like-subsection {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }

        .table-like-label {
        text-align: right;
        padding-right: 5px;
        }
        .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
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
<!---script ends here--->
</head>
<body>
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <a href="{{ route('home')}}" class="w3-bar-item w3-button">Home</a>
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>
    <h1 style="text-align:center">Urinalysis Form</h1>
<div class="container">
    <div class="topcontainer">
        <div class="toptext">
        <h1>Far Eastern University - Cavite</h1>
        <p>Kapt. Isko Street Brgy. 2 Lian, Batangas<br>
        Contact No(s): 123-456-789 | 098-765-432<br>
        Email Address: labcondiagnosticcenter@gmail.com</p>
        </div>
        <div class="image">
        <img src="{{ asset('img/medtech.png') }}" style="scale: 100%;width: 135px; justify-content: center;">
        </div>
    </div>
    <form action="{{ route('urinalysis.store') }}" method="POST">
        @csrf 
        <div class="form-row">
<!---script for dropdown autofill--->
        <label for="patientSelect">Select Patient:</label>
        <select id="patientSelect" name="patient_id" onchange="fillPatientData()">
            <option value="">-- Select a Patient --</option>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->Pname }}</option>
            @endforeach
        </select>
        </div>
        <div class="form-row">
        <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="ac" oninput="fillByAC()"></p>
        <p>Age: <input type="text" id="age" readonly></p>
        <p>Sex: <input type="text" id="sex" readonly></p>
        </div>
        <div class="form-row">
        <p>Date: <input type="date" id="date" name="date" readonly></p>
        <p>OR#: <input type="text" id="orNumber" name="or" value="{{ $orNumber }}" readonly></p>
        <p>Requested by: <input type="text" name="requested_by" placeholder="Enter requester name"></p>
        </div>
<!----script ends---->
        <div class="table-like">
            <div class="table-like-section">
                <h2>Physical Characteristics</h2>
                <div class="table-like-subsection">
                    <p>Color: <input type="text" name="color"></p>
                </div>
                <div class="table-like-subsection">
                    <p>Transparency: <input type="text" name="transparency"></p>
                </div>
                <div class="table-like-subsection">
                    <p>pH: <input type="text" name="ph"></p>
                </div>
                <div class="table-like-subsection">
                    <p>Specific Gravity: <input type="text" name="gravity"></p>
                </div>
            </div>
            <div class="table-like-section">
                <h2>Microscopic Findings</h2>
                <div class="table-like-subsection">
                <p>RBC: <input type="number" name="rbc" min="0" step="0.1" placeholder="Enter RBC count"></p>
                </div>
                <div class="table-like-subsection">
                <p>WBC: <input type="number" name="wbc" min="0" step="0.1" placeholder="Enter WBC count"></p>
                </div>
                <div class="table-like-subsection">
                <p>Squamous Epithelial Cells: <input type="text" name="SEC"></p>
                </div>
                <div class="table-like-subsection">
                <p>Mucus Threads: <input type="text" name="Thread"></p>
                </div>
                <div class="table-like-subsection">
                <p>Bacteria: <input type="text" name="bacteria"></p>
                </div>
            </div>
            <div class="table-like-section">
                <h2>Chemical Test</h2>
                <div class="table-like-subsection">
                <p>Protein: <input type="text" name="protein" placeholder="Enter Protein level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Glucose: <input type="text" name="glucose" placeholder="Enter Glucose level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Ketones: <input type="text" name="ketones" placeholder="Enter Ketones level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Bilirubin: <input type="text" name="bilirubin" placeholder="Enter Bilirubin level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Pregnancy Test: <input type="text" name="pregnancy_test" placeholder="Enter Pregnancy Test result"></p>
                </div>
                <div class="table-like-subsection">
                <p><b>OTHER/S: </b><input type="text" name="others" style="height: 100px; width: 300px;"></p>
                </div>
            </div>
            <div class="table-like-section">
                <h2>Crystals</h2>
                <div class="table-like-subsection">
                <p>Amorphous Urates: <input type="text" name="au" placeholder="Enter Amorphous Urates level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Amorphous Phosphates: <input type="text" name="ap" placeholder="Enter Amorphous Phosphates level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Uric Acid: <input type="text" name="ua" placeholder="Enter Uric Acid level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Calcium Oxalate: <input type="text" name="co" placeholder="Enter Calcium Oxalate level"></p>
                </div>
                <div class="table-like-subsection">
                <p>Triple Phosphate: <input type="text" name="tp" placeholder="Enter Triple Phosphate level"></p>
                </div>
            </div>
            <div class="table-like-section">
                <h2>Casts</h2>
                <div class="table-like-subsection">
                <p>Hyaline: <input type="number" name="hyaline" min="0" step="0.1" placeholder="Enter Hyaline count"></p>
                </div>
                <div class="table-like-subsection">
                <p>Granular: <input type="number" name="granular" min="0" step="0.1" placeholder="Enter Granular count"></p>
                </div>
                <div class="table-like-subsection">
                <p>WBC: <input type="number" name="wbc2" min="0" step="0.1" placeholder="Enter WBC count"></p>
                </div>
                <div class="table-like-subsection">
                <p>RBC: <input type="number" name="rbc2" min="0" step="0.1" placeholder="Enter RBC count"></p>
                </div>
            </div>
        </div>
<!---check if user is medtech/pathologist w script--->
    <div class="table-like">
        <div class="table-like-section">
            
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
            <br>
        </div>
        <div class="table-like-section">
            <h2>Pathologist:</h2>

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
            <p style="font-size: 10px; text-align: right; color: grey">*for academic purposes only</p>
        </div>
    </div>
</div>
<div class="center">
<button type="submit" class="btn btn-primary">Save</button>
</div>
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
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>
<!-----check acc/script ends--->

 
</body>
</html>
