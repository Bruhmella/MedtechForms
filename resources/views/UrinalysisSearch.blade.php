<!DOCTYPE html>
<html>
<head>
    <title>Urinalysis - Creation</title>
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
        grid-template-columns: repeat(3, 1fr); /* Two columns */
        gap: 5px; /* Spacing between items */
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
        grid-template-columns: 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .form-group2{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr; /* Label and input */
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

 <h3>Urinalysis Form - Search</h3>
<p>
  This is for data search of the urinalysis form.
  If you want to create for existing urinalysis data,
  <a href="{{ route('urinalysis.create') }}">click here</a>

</p>

<form method="GET" action="{{ route('urinalysis.search') }}">
    <h5 style="text-align: center;">Enter OR# Here:</h5> 
    <div class="center">
        <input type="text" name="OR" value="{{ request('OR') }}">
        <button type="submit" class="btn btn-info">Search</button>
        <a href="{{ route('urinalysis.search') }}" class="btn btn-primary">Clear search Data</a>
    </div>
</form>



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
        <form action="{{ route('urinalysis.store') }}" method="POST">
            @csrf 
            <div class="innercontainer">
                <div class="form-row">      
                <p>Name: <input type="text" readonly name="patient_name" value="{{ $data->Pname ?? '' }}"> </p>

                <p>AC#: <input type="text" readonly  id="ac" name="Poc" value="{{ $data->Poc ?? '' }}"></p>

                <p>Age: <input type="text" readonly  id="age"  name="Page" value="{{ $data->Page ?? '' }}"></p>

                <p>Sex: <input type="text" readonly  id="sex"  name="Psex" value="{{ $data->Psex ?? '' }}"></p>

                </div>
                <div class="form-row2">
                    <p>Date: <input type="text" id="date" name="date" value="{{ $data->date ?? '' }}"></p>
                    <p>OR:<input type="text" readonly  id="orNumber" name="OR" value="{{ $data->OR ?? '' }}" > </p>


                    <div class="form-group">
                        <label for="Reqby">Requested By:</label>
                        <input type="text" readonly  name="Reqby" class="form-control" value="{{ $data->Reqby ?? '' }}">
                    </div>
                </div>
            </div>
        <br>
        <!-- Physical Examination -->
        <div class="table-like">
            <div class="table-like-section">
                <h3 style="text-align: center">Physical Characteristics</h3>
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" readonly  name="color" class="form-control" value="{{ $data->color ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="transparency">Transparency:</label>
                    <input type="text" readonly  name="transparency" class="form-control" value="{{ $data->transparency ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="ph">pH:</label>
                    <input type="text" readonly  name="ph" class="form-control" value="{{ $data->ph ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="gravity">Specific Gravity:</label>
                    <input type="text" readonly  name="gravity" class="form-control" value="{{ $data->gravity ?? '' }}">
                </div>
            </div>
            <div class="table-like-section">                
            <!-- Microscopic Examination -->
                <h3 style="text-align: center">Microscopic Findings</h3>
                <div class="form-group2">
                    <label for="rbc">RBC (cells/uL):</label>
                    <input type="number" readonly step="0.01" name="rbc" class="form-control" value="{{ $data->rbc ?? '' }}">
                    <p>/hpf</p>
                </div>

                <div class="form-group2">
                    <label for="wbc">WBC (cells/uL):</label>
                    <input type="number" readonly step="0.01" name="wbc" class="form-control" value="{{ $data->wbc ?? '' }}">
                    <p>/hpf</p>
                </div>

                <div class="form-group">
                    <label for="sec">Squamous Epithelial Cells:</label>
                    <input type="text" readonly  name="sec" class="form-control" value="{{ $data->sec ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="mucus">Mucus:</label>
                    <input type="text" readonly  name="mucus" class="form-control" value="{{ $data->mucus ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="bacteria">Bacteria:</label>
                    <input type="text" readonly  name="bacteria" class="form-control" vvalue="{{ $data->bacteria ?? '' }}">
                </div>
            </div>
        </div>
        <br>
        <div class="table-like2">
            <div class="table-like-section">  
                <!-- Chemical Examination -->
                <h3 style="text-align: center">Chemical Test</h3>
                <div class="form-group">
                    <label for="protein">Protein:</label>
                    <input type="text" readonly  name="protein" class="form-control" value="{{ $data->protein ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="glucose">Glucose:</label>
                    <input type="text" readonly  name="glucose" class="form-control" value="{{ $data->glucose ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="ketones">Ketones:</label>
                    <input type="text" readonly  name="ketones" class="form-control" value="{{ $data->ketones ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="bilirubin">Bilirubin:</label>
                    <input type="text" readonly  name="bilirubin" class="form-control" value="{{ $data->bilirubin ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="pregnancy">Pregnancy Test:</label>
                    <input type="text" readonly  name="pregnancy" class="form-control" value="{{ $data->pregnancy ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="others">Others:</label>
                    <input type="text" readonly  name="others" class="form-control" value="{{ $data->others ?? '' }}">
                </div>
            </div>
            <div class="table-like-section">  
                <!-- Additional Tests -->
                <div class="form-group">
                    <label for="au">Amorphous Urates:</label>
                    <input type="text" readonly  name="au" class="form-control" value="{{ $data->au ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="ap">Amorphous Phosphates:</label>
                    <input type="text" readonly  name="ap" class="form-control" value="{{ $data->ap ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="ua">Uric Acid:</label>
                    <input type="text" readonly  name="ua" class="form-control" value="{{ $data->ua ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="co">Calcium Oxalate:</label>
                    <input type="text" readonly  name="co" class="form-control" value="{{ $data->co ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="tp">Triple Phosphates:</label>
                    <input type="text" readonly  name="tp" class="form-control" value="{{ $data->tp ?? '' }}">
                </div>
            </div>
            <div class="table-like-section">
                <!-- Casts -->
                <div class="form-group">
                    <label for="hyaline">Hyaline Casts:</label>
                    <input type="number" readonly step="0.01" name="hyaline" class="form-control" value="{{ $data->hyaline ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="granular">Granular Casts:</label>
                    <input type="number" readonly step="0.01" name="granular" class="form-control" value="{{ $data->granular ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="wbc2">WBC Casts:</label>
                    <input type="number" readonly step="0.01" name="wbc2" class="form-control" value="{{ $data->wbc2 ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="rbc2">RBC Casts:</label>
                    <input type="number" readonly step="0.01" name="rbc2" class="form-control" value="{{ $data->rbc2 ?? '' }}">
                </div>
            </div>
        </div>
        <br>
        <div class="table-like">
            <div class="table-like-section">
            <!-- Medical Technologist -->
<!-- Medical Technologist -->
                    <h3>Medical Technologist:</h3>
                    
                        <input type="text" readonly  name="medtech" value="{{ $data->medtech ?? '' }}">
                    
                        <input type="text" readonly  id="medtechLicNo" value="{{ $data->mtlicno ?? '' }}"  />   
            </div>
            <div class="table-like-section">
<!-- Pathologist -->
                    <h3>Pathologist:</h3>

                        <input type="text" readonly  name="pathologist" value="{{ $data->pathologist ?? '' }}" />
                        <input type="text" readonly  id="pathologistLicNo" value="{{ $data->ptlicno ?? '' }}"  />
            </div>
        </div>
    </div>
</form>
    <div class="center">
    <button type="submit" class="btn btn-primary">print</button>
    </div>
<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>  
</body>
</html>