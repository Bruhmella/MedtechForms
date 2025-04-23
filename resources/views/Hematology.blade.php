<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hematology Form</title>
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
        .tablelabel {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        }
        .form-group{
        display: grid;
        grid-template-columns: 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .genderdifference{
        display: grid;
        grid-template-columns: 0.5fr 0.5fr;
        grid-template-rows: 0.5fr 0.5fr;
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
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>
    <h3 style="text-align: center;">Hematology Form</h3>
    <div class="container">
        <div class="topcontainer">
            <div class="leftimage">
            <img src="{{ asset('img/picture1.png') }}" style="scale: 80%;width: 135px; justify-content: center;">
            </div>
            <div class="toptext">
            <h1>Far Eastern University - Cavite</h1>
            <p>Metrogate, Silang Estates, Silang, Cavite<br>
            Contact No(s): 123-456-789 | 098-765-432</p>
            </div>
            <div class="rightimage">
            <img src="{{ asset('img/medtech.png') }}" style="scale: 100%;width: 135px; justify-content: center; margin-top: 10px;">
            </div>
        </div>
        
        <form action="{{ route('hematology.store') }}" method="POST">
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
                <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="ac" class="form-control" oninput="fillByAC()"></p>
                <p>Age: <input type="text" id="age" class="form-control" readonly></p>
                <p>Sex: <input type="text" id="sex" class="form-control" readonly></p>
                </div>
                <div class="form-row2">
                <p>Date: <input type="date" id="date" name="date" class="form-control" readonly></p>
                <p>OR#: <input type="text" id="orNumber" name="OR" value="{{ $orNumber }}" class="form-control" readonly></p>
                <p>Requested by: <input type="text" name="requested_by" placeholder="Enter requester name" class="form-control"></p>
                </div>
            </div>
            <!-- Hematology Fields -->
            <div class="table-like">
                <div class="table-like-section">
                    <div class="tablelabel">
                        <h3>Tests</h3>
                        <h3>Results</h3>
                        <h3>Reference Range</h3>
                    </div>
                    <div class="form-group">
                        <label for="hemogoblin">Hemoglobin:</label>
                        <input type="number" name="hemogoblin" step="0.01" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">140 - 180 g/L</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">120 - 150 g/L</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hematocrit">Hematocrit:</label>
                        <input type="number" name="hematocrit" step="0.01" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">0.40 - 0.54 vol. %</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">0.35 - 0.49 vol. %</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rbc">RBC:</label>
                        <input type="number" name="rbc" step="0.01" class="form-control">
                        <p style="font-size: 10px">4.0 - 6.0 x M/cu mm</p>
                    </div>

                    <div class="form-group">
                        <label for="wbc">WBC:</label>
                        <input type="number" name="wbc" step="0.01" class="form-control">
                        <p style="font-size: 10px">4,000 - 12,000 / cu mm</p>
                    </div>
                <div class="tablelabel">
                    <p><b>Differential Count</b><p>
                </div>
                    <div class="form-group">
                        <label for="segmenters">Segmenters:</label>
                        <input type="number" name="segmenters" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.50 - 0.70</p>
                    </div>

                    <div class="form-group">
                        <label for="band">Band:</label>
                        <input type="number" name="band" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.00 - 0.05</p>
                    </div>

                    <div class="form-group">
                        <label for="lymphocyte">Lymphocyte:</label>
                        <input type="number" name="lymphocyte" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.18 - 0.42</p>
                    </div>

                    <div class="form-group">
                        <label for="Monocyte">Monocyte:</label>
                        <input type="number" name="Monocyte" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.02 - 0.11</p>
                    </div>

                    <div class="form-group">
                        <label for="Eosinophil">Eosinophil:</label>
                        <input type="number" name="Eosinophil" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.01 - 0.03</p>
                    </div>

                    <div class="form-group">
                        <label for="Basophil">Basophil:</label>
                        <input type="number" name="Basophil" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="Metamyelocyte">Metamyelocyte:</label>
                        <input type="number" name="Metamyelocyte" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="Myelocyte">Myelocyte:</label>
                        <input type="number" name="Myelocyte" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="Blast_Cell">Blast Cell:</label>
                        <input type="number" name="Blast_Cell" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="platelet">Platelet Count:</label>
                        <input type="number" name="platelet" step="0.01" class="form-control">
                        <p style="font-size: 10px">15,000 - 450,000 x cu mm</p>
                    </div>

                    <div class="form-group">
                        <label for="Reticulocyte">Reticulocyte Count:</label>
                        <input type="number" name="Reticulocyte" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.50 - 1.5%</p>
                    </div>
                </div>
                <div class="table-like-section">
                    <div class="tablelabel">
                        <h3>Tests</h3>
                        <h3>Results</h3>
                        <h3>Reference Range</h3>
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
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">0 - 15 mm/hr</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">0 - 20 mm/hr</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="clotting_time">Clotting Time:</label>
                        <input type="number" name="clotting_time" step="0.01" class="form-control">
                        <p style="font-size: 10px">2 - 8 minutes</p>
                    </div>

                    <div class="form-group">
                        <label for="bleeding_time">Bleeding Time:</label>
                        <input type="number" name="bleeding_time" step="0.01" class="form-control">
                        <p style="font-size: 10px">1 - 5 minutes</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-like">
                <div class="table-like-section">
                    <h3>Medical Technologist:</h3>
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
                </div>
                <div class="table-like-section">
                    <h3>Pathologist:</h3>
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
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
    </script>
</body>
</html>
