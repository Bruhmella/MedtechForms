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
 <h3>Urinalysis Form - Search</h3>
<p>
  This is for data search of the urinalysis form.
  If you want to create for existing urinalysis data,
  <a href="{{ route('urinalysis.create') }}">click here</a>

</p>

<h5>Enter OR# Here: </h5> <input type="text" name="OR" value="">
<button>Search</button>


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
                <label for="patientName">Name:</label>
    <!-- Replaced the dropdown with a text input for manual entry -->
            <input type="text" readonly  id="patientName" name="patient_name" placeholder="name" onchange="fillPatientDataFull()">
                    <p>AC#: <input type="text" readonly  id="ac" placeholder="Enter Account Number" name="Poc"></p>
                    <p>Age: <input type="text" readonly  id="age"  name="Page"></p>
                    <p>Sex: <input type="text" readonly  id="sex"  name="Psex"></p>
                </div>
                <div class="form-row2">
                    <p>Date: <input type="date" id="date" name="date" ></p>
                    <p>OR:<input type="text" readonly  id="orNumber" name="OR" value="" > </p>


                    <div class="form-group">
                        <label for="Reqby">Requested By:</label>
                        <input type="text" readonly  name="Reqby" class="form-control">
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
                    <input type="text" readonly  name="color" class="form-control" value="{{ old('color') }}">
                </div>

                <div class="form-group">
                    <label for="transparency">Transparency:</label>
                    <input type="text" readonly  name="transparency" class="form-control" value="{{ old('transparency') }}">
                </div>

                <div class="form-group">
                    <label for="ph">pH:</label>
                    <input type="text" readonly  name="ph" class="form-control" value="{{ old('ph') }}">
                </div>

                <div class="form-group">
                    <label for="gravity">Specific Gravity:</label>
                    <input type="text" readonly  name="gravity" class="form-control" value="{{ old('gravity') }}">
                </div>
            </div>
            <div class="table-like-section">                
            <!-- Microscopic Examination -->
                <h3 style="text-align: center">Microscopic Findings</h3>
                <div class="form-group2">
                    <label for="rbc">RBC (cells/uL):</label>
                    <input type="number" readonly step="0.01" name="rbc" class="form-control" value="{{ old('rbc') }}">
                    <p>/hpf</p>
                </div>

                <div class="form-group2">
                    <label for="wbc">WBC (cells/uL):</label>
                    <input type="number" readonly step="0.01" name="wbc" class="form-control" value="{{ old('wbc') }}">
                    <p>/hpf</p>
                </div>

                <div class="form-group">
                    <label for="sec">Squamous Epithelial Cells:</label>
                    <input type="text" readonly  name="sec" class="form-control" value="{{ old('sec') }}">
                </div>

                <div class="form-group">
                    <label for="mucus">Mucus:</label>
                    <input type="text" readonly  name="mucus" class="form-control" value="{{ old('mucus') }}">
                </div>

                <div class="form-group">
                    <label for="bacteria">Bacteria:</label>
                    <input type="text" readonly  name="bacteria" class="form-control" value="{{ old('bacteria') }}">
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
                    <input type="text" readonly  name="protein" class="form-control" value="{{ old('protein') }}">
                </div>

                <div class="form-group">
                    <label for="glucose">Glucose:</label>
                    <input type="text" readonly  name="glucose" class="form-control" value="{{ old('glucose') }}">
                </div>

                <div class="form-group">
                    <label for="ketones">Ketones:</label>
                    <input type="text" readonly  name="ketones" class="form-control" value="{{ old('ketones') }}">
                </div>

                <div class="form-group">
                    <label for="bilirubin">Bilirubin:</label>
                    <input type="text" readonly  name="bilirubin" class="form-control" value="{{ old('bilirubin') }}">
                </div>

                <div class="form-group">
                    <label for="pregnancy">Pregnancy Test:</label>
                    <input type="text" readonly  name="pregnancy" class="form-control" value="{{ old('pregnancy') }}">
                </div>

                <div class="form-group">
                    <label for="others">Others:</label>
                    <input type="text" readonly  name="others" class="form-control" value="{{ old('others') }}">
                </div>
            </div>
            <div class="table-like-section">  
                <!-- Additional Tests -->
                <div class="form-group">
                    <label for="au">Amorphous Urates:</label>
                    <input type="text" readonly  name="au" class="form-control" value="{{ old('au') }}">
                </div>

                <div class="form-group">
                    <label for="ap">Amorphous Phosphates:</label>
                    <input type="text" readonly  name="ap" class="form-control" value="{{ old('ap') }}">
                </div>

                <div class="form-group">
                    <label for="ua">Uric Acid:</label>
                    <input type="text" readonly  name="ua" class="form-control" value="{{ old('ua') }}">
                </div>

                <div class="form-group">
                    <label for="co">Calcium Oxalate:</label>
                    <input type="text" readonly  name="co" class="form-control" value="{{ old('co') }}">
                </div>

                <div class="form-group">
                    <label for="tp">Triple Phosphates:</label>
                    <input type="text" readonly  name="tp" class="form-control" value="{{ old('tp') }}">
                </div>
            </div>
            <div class="table-like-section">
                <!-- Casts -->
                <div class="form-group">
                    <label for="hyaline">Hyaline Casts:</label>
                    <input type="number" readonly step="0.01" name="hyaline" class="form-control" value="{{ old('hyaline') }}">
                </div>

                <div class="form-group">
                    <label for="granular">Granular Casts:</label>
                    <input type="number" readonly step="0.01" name="granular" class="form-control" value="{{ old('granular') }}">
                </div>

                <div class="form-group">
                    <label for="wbc2">WBC Casts:</label>
                    <input type="number" readonly step="0.01" name="wbc2" class="form-control" value="{{ old('wbc2') }}">
                </div>

                <div class="form-group">
                    <label for="rbc2">RBC Casts:</label>
                    <input type="number" readonly step="0.01" name="rbc2" class="form-control" value="{{ old('rbc2') }}">
                </div>
            </div>
        </div>
        <br>
        <div class="table-like">
            <div class="table-like-section">
            <!-- Medical Technologist -->
<!-- Medical Technologist -->
<div class="table-like-section">
    <h3>Medical Technologist:</h3>
    
        <input type="text" readonly  name="medtech" value="{{ ($medtech->fname ?? '') . ' ' . ($medtech->lname ?? '') }}" />
    
        <input type="text" readonly  id="medtechLicNo" value=""  />   
</div>

<!-- Pathologist -->
<div class="table-like-section">
    <h3>Pathologist:</h3>

        <input type="text" readonly  name="pathologist" value="{{ ($pathologist->fname ?? '') . ' ' . ($pathologist->lname ?? '') }}" />
        <input type="text" readonly  id="pathologistLicNo" value=""  />
</div>

    <div class="center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>

</body>
</html>