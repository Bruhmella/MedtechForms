<!DOCTYPE html>
<html>
<head>
    <title>Miscellaneous form 1 - Creation</title>
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
        .table-like2 {
        display: grid;
        grid-template-columns: repeat(1fr);
        gap: 10px;
        }
        .table-like-section {
        border: 1px solid #ccc;
        padding: 10px;
        }
        .table-like2-section {
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
        <a href="{{ route('PatDataManage')}}" class="w3-bar-item w3-button">Manage Patient Data</a>
    </div>
    <div class="w3-teal">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>
    <h2 style="text-align:center;">Miscellaneous Form 1 - Creation</h2>

    <p>
  This is for data creation of the form.
  If you want to search for existing data,
  <a href="{{ route('hba1c.search') }}">click here</a>

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
        <form action="{{ route('hba1c.store') }}" method="POST">
            @csrf 
            <div class="innercontainer">
                <div class="form-row">
                    <label for="patientSelect">Name:
                    <select required id="patientSelect" name="patient_id" onchange="fillPatientData()">
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
                    <p>AC#: <input type="text" required id="ac" readonly placeholder="Enter Account Number" name="Poc"></p>
                    <p>Age: <input type="text" required id="age" readonly name="Page"></p>
                    <p>Sex: <input type="text" required id="sex" readonly name="Psex"></p>
                </div>
                <div class="form-row2">
                    <p>Date: <input type="date" id="date" name="date" readonly></p>
                    <p>OR#: <input type="text" required id="orNumber" name="OR" value="{{ $orNumber }}" readonly></p>
                    <div class="form-group2">
                        <label for="Reqby">Requested By:</label>
                        <input type="text" required name="Reqby" class="form-control">
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
                    </div>
                    <div class="form-group row-entry">
                        <select required id="myDropdown" name="test[]">
            <option value="">--Select--</option>
            <option value="HBsAg">HBsAg</option>
            <option value="Anti-HIV 1">Anti-HIV 1</option>
            <option value="Anti-HIV 2">Anti-HIV 2</option>
            <option value="RPR">RPR</option>
            <option value="Anti-HBs">Anti-HBs</option>
            <option value="HAV">HAV</option>
            <option value="Denguo Duo">Denguo Duo</option>
            <option value="Dengue NS1">Dengue NS1</option>
            <option value="HCV">HCV</option>
            <option value="Thyroid">Thyroid</option>
            <option value="HBsAG">HBsAG</option>
            <option value="TROP">TROP</option>
            <option value="S. Typhi">S. Typhi</option>
            <option value="Anti-Hav">Anti-Hav</option>
            <option value="Anti-Tp">Anti-Tp</option>
                        </select>
                        <select required name="result[]">
  <option value="">--Select--</option>
  <option value="Reactive">Reactive</option>
  <option value="Non-Reactive">Non-Reactive</option>
</select>
                        <input type="text" required name="unit[]" class="form-control">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-success" onclick="addRow()">Add Row</button>

            <br>
<!--start here-->
        <div class="table-like">
            <div class="table-like-section">
             <h3>Medical Technologist:</h3>
                @if($medtech)
                    <input type="text" required name="medtech" value="{{ $medtech->fname . ' ' . $medtech->lname ?? '' }}" />
                    <input type="text" required name="mtlicno" id="medtechLicNo" value="{{ $medtech->LicNo ?? '' }}" readonly />

                @elseif($pathologist)
                    <select required id="medtechDropdown" name="medtech">
                        <option value="">Select a MedTech</option> <!-- Default option -->
                        @foreach($medtechs as $medtech)
                            <option value="{{ $medtech->fname . ' ' . $medtech->lname }}" data-licno="{{ $medtech->LicNo }}">
                                {{ $medtech->fname . ' ' . $medtech->lname }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" required id="medtechLicNo" name="mtlicno" readonly /><!-- LicNo textbox -->
                @endif
            </div>
            <div class="table-like-section">

                <h3>Pathologist:</h3>

                @if($pathologist)
                    <input type="text" required name="pathologist" value="{{ $pathologist->fname . ' ' . $pathologist->lname ?? '' }}" />
                    <input type="text" required id="pathologistLicNo" value="{{ $pathologist->LicNo ?? '' }}" readonly />

                @elseif($medtech)
                    <select required id="pathologistDropdown" name="pathologist">
                        <option value="">Select a Pathologist</option> <!-- Default option -->
                        @foreach($pathologists as $pathologist)
                            <option value="{{ $pathologist->fname . ' ' . $pathologist->lname }}" data-licno="{{ $pathologist->LicNo }}">
                                {{ $pathologist->fname . ' ' . $pathologist->lname }}
                            </option>

                        @endforeach

                    </select>

                    <input type="text" required id="pathologistLicNo" readonly name="ptlicno" />
                     <!-- LicNo textbox -->
                @endif
            </div>
        </div>
    </div>
    <div class="center">
    <button type="submit" class="btn btn-primary">Submit</button>

    </div>
    </form>
<!-- end here -->

<script>
        function addRow() {
            const rows = document.querySelectorAll('.row-entry');  // All rows added
            if (rows.length >= 3) {
                alert('You can only have a maximum of 3 rows.');
                return;  // Stop adding a new row
            }

            const container = document.createElement('div');
            container.classList.add('form-group', 'row-entry');
            container.innerHTML = `
                 <select required id="myDropdown" name="test[]">
            <option value="">--Select--</option>
            <option value="HBsAg">HBsAg</option>
            <option value="Anti-HIV 1">Anti-HIV 1</option>
            <option value="Anti-HIV 2">Anti-HIV 2</option>
            <option value="RPR">RPR</option>
            <option value="Anti-HBs">Anti-HBs</option>
            <option value="HAV">HAV</option>
            <option value="Denguo Duo">Denguo Duo</option>
            <option value="Dengue NS1">Dengue NS1</option>
            <option value="HCV">HCV</option>
            <option value="Thyroid">Thyroid</option>
            <option value="HBsAG">HBsAG</option>
            <option value="TROP">TROP</option>
            <option value="S. Typhi">S. Typhi</option>
            <option value="Anti-Hav">Anti-Hav</option>
            <option value="Anti-Tp">Anti-Tp</option>
                        </select>
                        <select required name="result[]">
  <option value="">--Select--</option>
  <option value="Reactive">Reactive</option>
  <option value="Non-Reactive">Non-Reactive</option>
</select>
                        <input type="text" required name="unit[]" class="form-control">
                <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
            `;
            document.querySelector('.table-like2-section').appendChild(container);
        }


        function removeRow(button) {
            button.parentNode.remove();
        }

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