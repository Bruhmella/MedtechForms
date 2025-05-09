<!DOCTYPE html>
<html>
<head>
    <title>Miscellaneous form 1 - Search</title>
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
        gap: 5px;
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
   <!--start here-->
 <h3>Miscellaneous Form 1 - Search</h3>
<p>
  This is for data search of the form.
  If you want to create new data,
  <a href="{{ route('hba1c.create') }}">click here</a>

</p>

<form method="GET" action="{{ route('hba1c.search') }}">
    <h5 style="text-align: center;">Enter OR# Here:</h5> 
    <div class="center">
        <input type="text" name="OR" value="{{ request('OR') }}">
        <button type="submit">Search</button>
        <a href="{{ route('hba1c.search') }}" class="btn btn-primary">Clear search Data</a>
    </div>

</form>
<!--end here-->

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
        <form action="{{ route('hba1c.store') }}" method="POST">
            @csrf 
@php $first = $data; @endphp


<!--start here-->
<div class="innercontainer">
    <div class="form-row">
        <p>Name: <input type="text" readonly  id="Pname" name="Pname" value="{{ $first->Pname ?? '' }}"> </p>
        <p>AC#: <input type="text" readonly  id="ac" name="Poc" value="{{ $first->Poc ?? '' }}"></p>
        <p>Age: <input type="text" readonly  id="age" name="Page" value="{{ $first->Page ?? '' }}"></p>
        <p>Sex: <input type="text" readonly  id="sex" name="Psex" value="{{ $first->Psex ?? '' }}"></p>
    </div>
    <div class="form-row2">
        <p>Date: <input type="text" readonly  id="date" name="date" value="{{ $first->date ?? '' }}"></p>
        <p>OR:<input type="text" readonly  id="orNumber" name="OR" value="{{ $first->OR ?? '' }}"> </p>
        <div class="form-group">
            <label for="Reqby">Requested By:</label>
            <input type="text" readonly  name="Reqby" class="form-control" value="{{ $first->Reqby ?? '' }}">
        </div>
    </div>
</div>
<!--end here-->

            <br>
            <div class="table-like2">
<div class="table-like2-section">
    <div class="form-group">
        <h3>Test</h3>
        <h3>Result</h3>
        <h3>Unit</h3>
    </div>

    @if(!empty($dataRows) && $dataRows->count() > 0)
        @foreach($dataRows as $test)
        <div class="form-group row-entry">
            <select disabled name="test[]">
                <option value="">--Select--</option>
                <option value="HBsAg" {{ $test->test === 'HBsAg' ? 'selected' : '' }}>HBsAg</option>
                <option value="Anti-HIV 1" {{ $test->test === 'Anti-HIV 1' ? 'selected' : '' }}>Anti-HIV 1</option>
                <option value="Anti-HIV 2" {{ $test->test === 'Anti-HIV 2' ? 'selected' : '' }}>Anti-HIV 2</option>
                <option value="RPR" {{ $test->test === 'RPR' ? 'selected' : '' }}>RPR</option>
                <option value="Anti-HBs" {{ $test->test === 'Anti-HBs' ? 'selected' : '' }}>Anti-HBs</option>
                <option value="HAV" {{ $test->test === 'HAV' ? 'selected' : '' }}>HAV</option>
                <option value="Denguo Duo" {{ $test->test === 'Denguo Duo' ? 'selected' : '' }}>Denguo Duo</option>
                <option value="Dengue NS1" {{ $test->test === 'Dengue NS1' ? 'selected' : '' }}>Dengue NS1</option>
                <option value="HCV" {{ $test->test === 'HCV' ? 'selected' : '' }}>HCV</option>
                <option value="Thyroid" {{ $test->test === 'Thyroid' ? 'selected' : '' }}>Thyroid</option>
            </select>
            <input type="text" readonly name="result[]" class="form-control" value="{{ $test->result }}">
            <input type="text" readonly name="unit[]" class="form-control" value="{{ $test->unit }}">
        </div>
        @endforeach
    @else
        <div class="form-group row-entry">
            <select disabled name="test[]">
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
            </select>
            <input type="text" readonly name="result[]" class="form-control">
            <input type="text" readonly name="unit[]" class="form-control">

        </div>
    @endif
</div>

            </div>

           

            <br>
@php $first = $data; @endphp


<!-- start copy here -->
<div class="table-like">
    <div class="table-like-section">
        <h3>Medical Technologist:</h3>
        <input type="text" readonly  name="medtech" value="{{ $first->medtech ?? '' }}">
        <input type="text" readonly  id="medtechLicNo" value="{{ $first->mtlicno ?? '' }}" />
    </div>

    <div class="table-like-section">
        <h3>Pathologist:</h3>
        <input type="text" readonly  name="pathologist" value="{{ $first->pathologist ?? '' }}" />
        <input type="text" readonly  id="pathologistLicNo" value="{{ $first->ptlicno ?? '' }}" />
    </div>
</div>
</div>
</form>
<div class="center">
    <button type="submit" class="btn btn-primary">print</button>
</div>
<!-- end here -->


<script>
function addRow() {
    const rows = document.querySelectorAll('.row-entry');
    if (rows.length >= 3) {
        alert('You can only have a maximum of 3 rows.');
        return;
    }

    const container = document.createElement('div');
    container.classList.add('form-group', 'row-entry');
    container.innerHTML = `
        <select disabled name="test[]">
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
        </select>
        <input type="text" readonly name="result[]" class="form-control">
        <input type="text" readonly name="unit[]" class="form-control">
    `;
    document.querySelector('.table-like2-section').appendChild(container);
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