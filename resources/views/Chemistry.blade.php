<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chemistry Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Chemistry Form</h2>
        <a href="{{ route('home') }}"><button>Home</button></a>
        
        <form action="{{ route('chemistry.store') }}" method="POST">
            @csrf 
            
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

            <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="Poc"></p>
            <p>Age: <input type="text" id="age" readonly name="Page"></p>
            <p>Sex: <input type="text" id="sex" readonly name="Psex"></p>
            <p>Date: <input type="date" id="date" name="date" readonly></p>
            <p>OR#: <input type="text" id="orNumber" name="OR" value="{{ $orNumber }}" readonly></p>

            <!-- Chemistry Fields -->
            <div class="form-group">
                <label for="Reqby">Requested By:</label>
                <input type="text" name="Reqby" class="form-control">
            </div>


            <div class="form-group">
                <label for="glucose">Glucose:</label>
                <input type="number" name="glucose" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="urea_nitrogen">Urea Nitrogen:</label>
                <input type="number" name="urea_nitrogen" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="creatine">Creatine:</label>
                <input type="number" name="creatine" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="uric_acid">Uric Acid:</label>
                <input type="number" name="uric_acid" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="total_cholesterol">Total Cholesterol:</label>
                <input type="number" name="total_cholesterol" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="triglyceride">Triglyceride:</label>
                <input type="number" name="triglyceride" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="hdl">HDL:</label>
                <input type="number" name="hdl" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="ldl">LDL:</label>
                <input type="number" name="ldl" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="vldl">VLDL:</label>
                <input type="number" name="vldl" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="ratio">Ratio:</label>
                <input type="number" name="ratio" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="ast">SGOT (AST):</label>
                <input type="number" name="ast" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="alt">SGOT (ALT):</label>
                <input type="number" name="alt" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="sodium">Sodium:</label>
                <input type="number" name="sodium" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="potassium">Potassium:</label>
                <input type="number" name="potassium" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="chloride">Chloride:</label>
                <input type="number" name="chloride" step="0.01" class="form-control">
            </div>


			<div class="form-group">
                <label for="ionized_calcium">Ionized calcium:</label>
                <input type="number" name="ionized_calcium" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="protein">Protein:</label>
                <input type="number" name="protein" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="albumin">Albumin:</label>
                <input type="number" name="albumin" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="globulin">Globulin:</label>
                <input type="number" name="globulin" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="ag_ratio">A/G Ratio:</label>
                <input type="number" name="ag_ratio" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="alkaline">Alkaline:</label>
                <input type="number" name="alkaline" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="bilirubin">Bilirubin:</label>
                <input type="number" name="bilirubin" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="b2">Indirect Bilirubin:</label>
                <input type="number" name="b2" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="b1">Direct Bilirubin:</label>
                <input type="number" name="b1" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="others">Others:</label>
                <input type="text" name="others" class="form-control">
            </div>

            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" name="remarks" class="form-control">
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
