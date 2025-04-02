<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hematology Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Hematology Form</h2>
        <a href="{{ route('home') }}"><button>Home</button></a>
        
        <form action="{{ route('hematology.store') }}" method="POST">
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
            <p>OR#: <input type="text" id="orNumber" name="OR" value="{{ $orNumber }}" readonly></p>
            <p>Requested by: <input type="text" name="requested_by" placeholder="Enter requester name"></p>

            <!-- Hematology Fields -->
<div class="form-group">
    <label for="hemogoblin">Hemoglobin:</label>
    <input type="number" name="hemogoblin" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="hematocrit">Hematocrit:</label>
    <input type="number" name="hematocrit" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="rbc">RBC:</label>
    <input type="number" name="rbc" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="wbc">WBC:</label>
    <input type="number" name="wbc" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="segmenters">Segmenters:</label>
    <input type="number" name="segmenters" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="band">Band:</label>
    <input type="number" name="band" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="lymphocyte">Lymphocyte:</label>
    <input type="number" name="lymphocyte" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Monocyte">Monocyte:</label>
    <input type="number" name="Monocyte" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Eosinophil">Eosinophil:</label>
    <input type="number" name="Eosinophil" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Basophil">Basophil:</label>
    <input type="number" name="Basophil" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Metamyelocyte">Metamyelocyte:</label>
    <input type="number" name="Metamyelocyte" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Myelocyte">Myelocyte:</label>
    <input type="number" name="Myelocyte" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Blast_Cell">Blast Cell:</label>
    <input type="number" name="Blast_Cell" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="platelet">Platelet:</label>
    <input type="number" name="platelet" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="Reticulocyte">Reticulocyte:</label>
    <input type="number" name="Reticulocyte" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="BLOOD_TYPING">Blood Typing:</label>
    <input type="text" name="BLOOD_TYPING" class="form-control">
</div>

<div class="form-group">
    <label for="rh_factor">Rh Factor:</label>
    <input type="text" name="rh_factor" class="form-control">
</div>

<div class="form-group">
    <label for="esr">ESR:</label>
    <input type="number" name="esr" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="clotting_time">Clotting Time:</label>
    <input type="number" name="clotting_time" step="0.01" class="form-control">
</div>

<div class="form-group">
    <label for="bleeding_time">Bleeding Time:</label>
    <input type="number" name="bleeding_time" step="0.01" class="form-control">
</div>


            <h2>Medical Technologist:</h2>
            @if($medtech)
                <input type="text" name="medtech" value="{{ $medtech->fname . ' ' . $medtech->lname ?? '' }}" />
                <input type="text" id="medtechLicNo" value="{{ $medtech->LicNo ?? '' }}" readonly />
            @elseif($pathologist)
                <select id="medtechDropdown" name="medtech">
                    <option value="">Select a MedTech</option> <!-- Default option -->
                    @foreach($medtechs as $medtech)
                        <option value="{{ $medtech->fname . ' ' . $medtech->lname }}" data-licno="{{ $medtech->LicNo }}">
                            {{ $medtech->fname . ' ' . $medtech->lname }}
                        </option>
                    @endforeach
                </select>
                <input type="text" id="medtechLicNo" value="" readonly /> <!-- LicNo textbox -->
            @endif

            <h2>Pathologist:</h2>
            @if($pathologist)
                <input type="text" name="pathologist" value="{{ $pathologist->fname . ' ' . $pathologist->lname ?? '' }}" />
                <input type="text" id="pathologistLicNo" value="{{ $pathologist->LicNo ?? '' }}" readonly />
            @elseif($medtech)
                <select id="pathologistDropdown" name="pathologist">
                    <option value="">Select a Pathologist</option> <!-- Default option -->
                    @foreach($pathologists as $pathologist)
                        <option value="{{ $pathologist->fname . ' ' . $pathologist->lname }}" data-licno="{{ $pathologist->LicNo }}">
                            {{ $pathologist->fname . ' ' . $pathologist->lname }}
                        </option>
                    @endforeach
                </select>
                <input type="text" id="pathologistLicNo" value="" readonly /> <!-- LicNo textbox -->
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

            let ac = selectedOption.getAttribute('data-ac') || ''; 
            let age = selectedOption.getAttribute('data-age') || ''; 
            let sex = selectedOption.getAttribute('data-sex') || ''; 

            document.getElementById('ac').value = ac;
            document.getElementById('age').value = age;
            document.getElementById('sex').value = sex;
            document.getElementById('date').value = new Date().toISOString().split('T')[0]; 
        }

        document.getElementById('pathologistDropdown')?.addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            document.getElementById('pathologistLicNo').value = selectedOption.dataset.licno || '';
        });

        document.getElementById('medtechDropdown')?.addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            document.getElementById('medtechLicNo').value = selectedOption.dataset.licno || '';
        });

        window.addEventListener('load', function() {
            if (document.getElementById('medtechDropdown')) {
                var medtechDropdown = document.getElementById('medtechDropdown');
                if (medtechDropdown.selectedIndex >= 0) {
                    var selectedOption = medtechDropdown.options[medtechDropdown.selectedIndex];
                    var licNo = selectedOption.getAttribute('data-licno');
                    document.getElementById('medtechLicNo').value = licNo;
                }
            }

            if (document.getElementById('pathologistDropdown')) {
                var pathologistDropdown = document.getElementById('pathologistDropdown');
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
