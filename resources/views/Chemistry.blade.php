<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Chemistry Form</title>
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
        display: flex;
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
        grid-template-columns: 1fr 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .genderdifference {
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
        <a href="{{ route('PatDataManage')}}" class="w3-bar-item w3-button">Manage Patient Data</a>
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>
    <h3 style="text-align: center;">Chemistry Form - Creation</h3>
    <p>
  This is for data creation of the chemistry form.
  If you want to search for existing chemistry form data,
  <a href="{{ route('chemistry.search') }}">click here</a>
</p>
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
        <form action="{{ route('chemistry.store') }}" method="POST">
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
                <p>Requested by: <input type="text" id="Reqby" name="Reqby"></p>
                </div>
            </div>
            <!-- Chemistry Fields -->
            <div class="table-like">
                <div class="table-like-section">
                    <div class="tablelabel">
                        <h3>Tests</h3>
                        <h3>Results</h3>
                        <h3>Reference Range</h3>
                    </div>
                    <div class="form-group">
                        <label for="glucose">Glucose:</label>
                        <input type="number" name="glucose" step="0.01" class="form-control">
                        <p style="font-size: 10px">4.2 - 6.4 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="urea_nitrogen">Urea Nitrogen:</label>
                        <input type="number" name="urea_nitrogen" step="0.01" class="form-control">
                        <p style="font-size: 10px">1.6 - 8.3 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="creatine">Creatine:</label>
                        <input type="number" name="creatine" step="0.01" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">62 - 124 umol/L</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">62 - 106 umol/L</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="uric_acid">Uric Acid:</label>
                        <input type="number" name="uric_acid" step="0.01" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">203 - 417 umol/L</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">143 - 340 umol/L</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total_cholesterol">Total Cholesterol:</label>
                        <input type="number" name="total_cholesterol" step="0.01" class="form-control">
                        <p style="font-size: 10px">< 5.14 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="triglyceride">Triglyceride:</label>
                        <input type="number" name="triglyceride" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.45 - 1.86 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="hdl">HDL:</label>
                        <input type="number" name="hdl" step="0.01" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">> 1.42 mmol/L</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">> 1.68 mmol/L</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ldl">LDL:</label>
                        <input type="number" name="ldl" step="0.01" class="form-control">
                        <p style="font-size: 10px">1.72 - 4.63 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="vldl">VLDL:</label>
                        <input type="number" name="vldl" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.0 - 1.04 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="ratio">Ratio:</label>
                        <input type="number" name="ratio" step="0.01" class="form-control">
                        <p style="font-size: 10px">LESS THAN 4.0</p>
                    </div>

                    <div class="form-group">
                        <label for="ast">SGOT (AST):</label>
                        <input type="number" name="ast" step="0.01" class="form-control">
                        <p style="font-size: 10px">UP TO 40 U/L</p>
                    </div>

                    <div class="form-group">
                        <label for="alt">SGOT (ALT):</label>
                        <input type="number" name="alt" step="0.01" class="form-control">
                        <p style="font-size: 10px">UP TO 30 U/L</p>
                    </div>
                </div>
                <div class="table-like-section">
                    <div class="tablelabel">
                        <h3>Tests</h3>
                        <h3>Results</h3>
                        <h3>Reference Range</h3>
                    </div>
                    <div class="form-group">
                        <label for="sodium">Sodium:</label>
                        <input type="number" name="sodium" step="0.01" class="form-control">
                        <p style="font-size: 10px">135 - 148 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="potassium">Potassium:</label>
                        <input type="number" name="potassium" step="0.01" class="form-control">
                        <p style="font-size: 10px">3.5 - 5.3 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="chloride">Chloride:</label>
                        <input type="number" name="chloride" step="0.01" class="form-control">
                        <p style="font-size: 10px">98 - 107 mmol/L</p>
                    </div>


                    <div class="form-group">
                        <label for="ionized_calcium">Ionized calcium:</label>
                        <input type="number" name="ionized_calcium" step="0.01" class="form-control">
                        <p style="font-size: 10px">98 - 107 mmol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="protein">Protein:</label>
                        <input type="number" name="protein" step="0.01" class="form-control">
                        <p style="font-size: 10px">65 - 83 g/L</p>
                    </div>

                    <div class="form-group">
                        <label for="albumin">Albumin:</label>
                        <input type="number" name="albumin" step="0.01" class="form-control">
                        <p style="font-size: 10px">35 - 50 g/L</p>
                    </div>

                    <div class="form-group">
                        <label for="globulin">Globulin:</label>
                        <input type="number" name="globulin" step="0.01" class="form-control">
                        <p style="font-size: 10px">23 - 35 g/L</p>
                    </div>

                    <div class="form-group">
                        <label for="ag_ratio">A/G Ratio:</label>
                        <input type="number" name="ag_ratio" step="0.01" class="form-control">
                        <p style="font-size: 10px">1.3 - 3:1</p>
                    </div>

                    <div class="form-group">
                        <label for="alkaline">Alkaline Phosphatase:</label>
                        <input type="number" name="alkaline" step="0.01" class="form-control">
                        <p style="font-size: 10px">30 - 90 U/L</p>
                    </div>

                    <div class="form-group">
                        <label for="bilirubin">Bilirubin:</label>
                        <input type="number" name="bilirubin" step="0.01" class="form-control">
                        <p style="font-size: 10px">3 - 17 umol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="b2">Indirect Bilirubin:</label>
                        <input type="number" name="b2" step="0.01" class="form-control">
                        <p style="font-size: 10px">0 - 3 umol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="b1">Direct Bilirubin:</label>
                        <input type="number" name="b1" step="0.01" class="form-control">
                        <p style="font-size: 10px">3 - 14 umol/L</p>
                    </div>

                    <div class="form-group">
                        <label for="others">Others:</label>
                        <textarea type="text" name="others" rows="4" cols="50"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <input type="text" name="remarks" class="form-control">
                </div>
            </div>
        </div>
        <br>
        <div class="table-like">
            <div class="table-like-section">
             <h3>Medical Technologist:</h3>
                @if($medtech)
                    <input type="text" name="medtech" value="{{ $medtech->fname . ' ' . $medtech->lname ?? '' }}" />
                    <input type="text" name="mtlicno" id="medtechLicNo" value="{{ $medtech->LicNo ?? '' }}" readonly />

                @elseif($pathologist)
                    <select id="medtechDropdown" name="medtech">
                        <option value="">Select a MedTech</option> <!-- Default option -->
                        @foreach($medtechs as $medtech)
                            <option value="{{ $medtech->fname . ' ' . $medtech->lname }}" data-licno="{{ $medtech->LicNo }}">
                                {{ $medtech->fname . ' ' . $medtech->lname }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" id="medtechLicNo" name="mtlicno" readonly /><!-- LicNo textbox -->
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

                    <input type="text" id="pathologistLicNo" readonly name="ptlicno" />
                     <!-- LicNo textbox -->
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
