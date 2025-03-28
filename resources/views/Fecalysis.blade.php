<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecalysis Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Fecalysis Form</h2>
        <a href="{{ route('home') }}"><button>Home</button></a>
        
        <form action="{{ route('fecalysis.store') }}" method="POST">
            @csrf <!-- CSRF Token -->
            
            <label for="patientSelect">Name:</label>
            <select id="patientSelect" name="patient_id" onchange="fillPatientData()">
                <option value="">-- Select a Patient --</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" 
                            data-ac="{{ $patient->Poc ?? '' }}"
                            data-age="{{ $patient->Page ?? '' }}" 
                            data-sex="{{ $patient->Psex ?? '' }}">
                        {{ $patient->Pname }}
                    </option>
                @endforeach
            </select>

            <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="ac" oninput="fillByAC()"></p>
            <p>Age: <input type="text" id="age" readonly></p>
            <p>Sex: <input type="text" id="sex" readonly></p>
            <p>Date: <input type="date" id="date" name="date" readonly></p>
            <p>OR#: <input type="text" id="orNumber" name="or" value="{{ $orNumber }}" readonly></p>
            <p>Requested by: <input type="text" name="requested_by" placeholder="Enter requester name"></p>

            <!-- Fecalysis Fields -->
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" name="color" class="form-control">
            </div>

            <div class="form-group">
                <label for="consistency">Consistency:</label>
                <input type="text" name="consistency" class="form-control">
            </div>

            <div class="form-group">
                <label for="occult_blood">Occult Blood:</label>
                <input type="text" name="occult_blood" class="form-control">
            </div>

            <div class="form-group">
                <label for="sudan_stain">Sudan Stain:</label>
                <input type="text" name="sudan_stain" class="form-control">
            </div>

            <div class="form-group">
                <label for="bacteria">Bacteria:</label>
                <input type="text" name="bacteria" class="form-control">
            </div>

            <div class="form-group">
                <label for="yeast">Yeast:</label>
                <input type="text" name="yeast" class="form-control">
            </div>

            <div class="form-group">
                <label for="fat_globules">Fat Globules:</label>
                <input type="text" name="fat_globules" class="form-control">
            </div>

            <div class="form-group">
                <label for="others">Others:</label>
                <input type="text" name="others" class="form-control">
            </div>

            <div class="form-group">
                <label for="wbc">WBC:</label>
                <input type="number" name="wbc" class="form-control" step="0.01" min="0" placeholder="Enter WBC count">
            </div>

            <div class="form-group">
                <label for="rbc">RBC:</label>
                <input type="number" name="rbc" class="form-control" step="0.01" min="0" placeholder="Enter RBC count">
            </div>

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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function fillPatientData() {
            let patientSelect = document.getElementById('patientSelect');
            let selectedOption = patientSelect.options[patientSelect.selectedIndex];

            if (selectedOption.value === "") {
                document.getElementById('ac').value = "";
                document.getElementById('age').value = "";
                document.getElementById('sex').value = "";
                return;
            }

            // Get data attributes from the selected option
            let ac = selectedOption.getAttribute('data-ac') || ''; 
            let age = selectedOption.getAttribute('data-age') || ''; 
            let sex = selectedOption.getAttribute('data-sex') || ''; 

            console.log("Selected AC:", ac); // Debugging

            // Autofill the input fields
            document.getElementById('ac').value = ac;
            document.getElementById('age').value = age;
            document.getElementById('sex').value = sex;
            document.getElementById('date').value = new Date().toISOString().split('T')[0]; // Autofill today's date
        }

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
</body>
</html>
