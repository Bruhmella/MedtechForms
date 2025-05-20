<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Fecalysis - Creation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        h1, h3 {
            font-family: Cambria;
        }
        a {
            font-family: Calibri;
        }
        .topcontainer {
        display: grid;
        grid-template-areas:
            "leftimage toptext rightimage";
        grid-template-columns: 1fr 3fr 1fr;
        }
        .topcontainer > div.leftimage{
        grid-area: leftimage;
        }
        .topcontainer > div.toptext {
        grid-area: toptext;
        text-align: left;
        }
        .topcontainer > div.rightimage {
        grid-area: rightimage;
        }
        .container {
        width: 1200px; /* Adjust as needed */
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 20px;
        background-color:#ffffff;
        }
        .innercontainer {
        width: auto;
        margin: auto auto;
        border: 1px solid #000;
        }
        .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        margin-bottom: 5px;
        }
        .form-row2 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
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
        .table-like2 {
        display: grid;
        grid-template-columns: repeat(1fr);
        gap: 10px;
        }
        .table-like2-section {
        border: 1px solid #ccc;
        padding: 10px;
        }
        .form-group{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .form-subgroup{
        display: grid;
        grid-template-columns: 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px; 
        }
        .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        }
    </style>
</head>
<body>
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <a href="{{ route('home')}}" class="w3-bar-item w3-button">Home</a>
        <a href="{{ route('PatDataManage')}}" class="w3-bar-item w3-button">Manage Patient Data</a>
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>

    <h3 style="text-align:center;">Fecalysis Form - Creation</h3>
    <p>
  This is for data creation of the Fecalysis form.
  If you want to search for existing fecalysis data,
  <a href="{{ route('fecalysis.search') }}">click here</a>

</p>

    <div class="container">
        <div class="topcontainer">
            <div class="leftimage">
            <img src="{{ asset('img/Picture1.png') }}" style="scale: 80%;width: 135px; justify-content: center;">
            </div>
            <div class="toptext">
            <h1>FAR EASTERN COLLEGE – SILANG, INC.</h1>
            <p>Metrogate, Silang Estates, Silang, Cavite<br>
            Contact No(s): 123-456-789 | 098-765-432</p>
            </div>
            <div class="rightimage">
            <img src="{{ asset('img/medtech.png') }}" style="scale: 100%;width: 135px; justify-content: center; margin-top: 10px;">
            </div>
        </div>
        <form action="{{ route('fecalysis.store') }}" method="POST">
            @csrf <!-- CSRF Token -->
            <div class="innercontainer">
                <div class="form-row">
                    <label for="patientSelect">Name:
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
                    </label>
                    <p>AC#: <input type="text" required id="ac" readonly name="ac" oninput="fillByAC()"></p>
                    <p>Age: <input type="text" required id="age" readonly></p>
                    <p>Sex: <input type="text" required id="sex" readonly></p>
                </div>
                <div class="form-row2">
                    <p>Date: <input type="date" id="date" name="date" readonly></p>
                    <p>OR#: <input type="text" required id="orNumber" name="or" value="{{ $orNumber }}" readonly></p>
                    <p>Requested by: <input type="text" required name="Reqby" placeholder="Enter requester name"></p>
                </div>
            </div>
            <br>
            <!-- Fecalysis Fields -->
            <div class="table-like2">
                <div class="table-like2-section">
                <h3 style="text-align: center">Consistency</h3>
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input type="text" required name="color" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="consistency">Consistency:</label>
                        <input type="text" required name="consistency" class="form-control">
                    </div>
                </div>
                <div class="table-like2-section">
                <h3 style="text-align: center">Miscellaneous</h3>
                    <div class="form-group">
                        <label for="occult_blood">Occult Blood:</label>
                        <input type="text" required name="occult_blood" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sudan_stain">Sudan Stain:</label>
                        <input type="text" required name="sudan_stain" class="form-control">
                    </div>
                </div>
                <div class="table-like2-section">
                <h3 style="text-align: center">Microscopic Findings</h3>
                    <div class="form-group">
                        <label for="wbc">WBC:</label>
                        <div class="form-subgroup">
                            <input type="number" required name="wbc" class="form-control" step="any" min="0" placeholder="Enter WBC count" pattern="^\d+(\.\d+)?$">
                            <p>/hpf</p>
                        </div>
                        <label for="yeast">Yeast:</label>
                        <input type="text" required name="yeast" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="rbc">RBC:</label>
                        <div class="form-subgroup">
                            <input type="number" required name="rbc" class="form-control" step="any" min="0" placeholder="Enter RBC count" pattern="^\d+(\.\d+)?$">
                            <p>/hpf</p>
                        </div>
                        <label for="fat_globules">Fat Globules:</label>
                        <input type="text" required name="fat_globules" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bacteria">Bacteria:</label>
                        <input type="text" required name="bacteria" class="form-control">
                    </div>
                    <div class="form-group2">
                        <label for="others">Others:</label>
                        <textarea type="text" required name="others" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        <br>
        <div class="table-like">
            <div class="table-like-section">
            <h3>Medical Technologist:</h3>

            @if($medtech)
                <input type="text" required name="medtech" value="{{ $medtech->fname . ' ' . $medtech->lname ?? '' }}" />
                <input type="text" required id="medtechLicNo" name="mtlicno" value="{{ $medtech->LicNo ?? '' }}" readonly />
            @elseif($pathologist)
                <select id="medtechDropdown" name="medtech">
                    <option value="">Select a MedTech</option> <!-- Default option -->
                    @foreach($medtechs as $medtech)
                        <option value="{{ $medtech->fname . ' ' . $medtech->lname }}" data-licno="{{ $medtech->LicNo }}">
                            {{ $medtech->fname . ' ' . $medtech->lname }}
                        </option>
                    @endforeach
                </select>
                <input type="text" required id="medtechLicNo" value="" readonly /> <!-- LicNo textbox -->
            @endif
            </div>
            <div class="table-like-section">

            <h3>Pathologist:</h3>

            @if($pathologist)
                <input type="text" required name="pathologist" value="{{ $pathologist->fname . ' ' . $pathologist->lname ?? '' }}" />
                <input type="text" required id="pathologistLicNo" value="{{ $pathologist->LicNo ?? '' }}" readonly />
            @elseif($medtech)
                <select id="pathologistDropdown" name="pathologist">
                    <option value="">Select a Pathologist</option> <!-- Default option -->
                    @foreach($pathologists as $pathologist)
                        <option value="{{ $pathologist->fname . ' ' . $pathologist->lname }}" data-licno="{{ $pathologist->LicNo }}">
                            {{ $pathologist->fname . ' ' . $pathologist->lname }}
                        </option>
                    @endforeach
                </select>
                <input type="text" required id="pathologistLicNo" value="" readonly name="ptlicno" /> <!-- LicNo textbox -->
            @endif
            </div>
        </div>
    </div>
    <div class="center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
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
    document.getElementById('pathologistDropdown')?.addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('pathologistLicNo').value = selectedOption.dataset.licno || '';
    });
        document.getElementById('medtechDropdown')?.addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('medtechLicNo').value = selectedOption.dataset.licno || '';
    });
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
</body>
</html>
