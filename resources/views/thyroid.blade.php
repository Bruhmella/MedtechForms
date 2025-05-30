<!DOCTYPE html>
<html>
<head>
    <title>Thyroid form</title>
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
        .form-group{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .form-group2{
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
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>
 <h3 style="text-align:center;">Thyroid Form</h3>
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
        <form action="{{ route('thyroid.store') }}" method="POST">
            @csrf 
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
                    <p>AC#: <input type="text" id="ac" placeholder="Enter Account Number" name="Poc"></p>
                    <p>Age: <input type="text" id="age" readonly name="Page"></p>
                    <p>Sex: <input type="text" id="sex" readonly name="Psex"></p>
                </div>
                <div class="form-row2">
                    <p>Date: <input type="date" id="date" name="date" readonly></p>
                    <p>OR#: <input type="text" id="orNumber" name="OR" value="{{ $orNumber }}" readonly></p>
                    <div class="form-group2">
                        <label for="Reqby">Requested By:</label>
                        <input type="text" name="Reqby" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <div class="table-like2">
                <div class="table-like2-section">
                    <div class="form-group">
                        <h3>Test</h3>
                        <h3>Result</h3>
                        <h3>Unit</h3>
                        <h3>Reference Value</h3>
                    </div>
                    <div class="form-group">
                        <label for="tsh">TSH:</label>
                        <input type="number" name="tsh" step="0.01" class="form-control">
                        <p>mIU/L</p>
                        <p>0.3 - 4.2</p>
                    </div>

                    <div class="form-group">
                        <label for="t3">T3:</label>
                        <input type="number" name="t3" step="0.01" class="form-control">
                        <p>nmol/L</p>
                        <p>1.23 - 3.07</p>
                    </div>

                    <div class="form-group">
                        <label for="psa">PSA:</label>
                        <input type="number" name="psa" step="0.01" class="form-control">
                        <p>ng/mL</p>
                        <p>below 4.0</p>
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
        </form>
    </div>
    <div class="center">
    <button type="submit" class="btn btn-primary">Submit</button>
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
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
    </script>
</body>
</html>