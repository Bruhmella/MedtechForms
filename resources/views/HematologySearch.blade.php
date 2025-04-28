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
    <h3 style="text-align: center;">Hematology Form - Search</h3>

    <p>
  This is for searching the hematology form.
  If you want to create new data,
  <a href="{{ route('hematology.create') }}">click here</a>
</p>

<form method="GET" action="{{ route('hematology.search') }}">
    <h5>Enter OR# Here:</h5> 
    <input type="text" name="OR" value="{{ request('OR') }}">
    <button type="submit">Search</button>
    <a href="{{ route('hematology.search') }}" class="btn btn-primary">Clear search Data</a>

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
        
        <form action="{{ route('hematology.store') }}" method="POST">
            @csrf <!-- CSRF Token -->
            <div class="innercontainer">
                <div class="form-row">
                    <p>Name: <input type="text" readonly value="{{ $data->Pname ?? '' }}" ></p>
                    <p>AC#: <input type="text" readonly id="ac" value="{{ $data->Poc ?? '' }}"></p>
                    <p>Age: <input type="text" readonly id="age" value="{{ $data->Page ?? '' }}" ></p>
                    <p>Sex: <input type="text" readonly id="sex" value="{{ $data->Psex ?? '' }}" ></p>
                </div>
                <div class="form-row2">
                    <p>Date: <input type="text" readonly id="date" name="date" value="{{ $data->date ?? '' }}" ></p>
                    <p>OR#: <input type="text" readonly name="OR" value="{{ $data->OR ?? '' }}"></p>
                    <p>Requested by: <input type="text" readonly name="Reqby" value="{{ $data->Reqby ?? '' }}"></p>
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
                        <input type="number" name="hemogoblin" step="0.01" value="{{ $data->hemogoblin ?? '' }}" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">140 - 180 g/L</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">120 - 150 g/L</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hematocrit">Hematocrit:</label>
                        <input type="number" name="hematocrit" step="0.01" value="{{ $data->hematocrit ?? '' }}" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">0.40 - 0.54 vol. %</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">0.35 - 0.49 vol. %</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rbc">RBC:</label>
                        <input type="number" name="rbc" step="0.01" value="{{ $data->rbc ?? '' }}"class="form-control">
                        <p style="font-size: 10px">4.0 - 6.0 x M/cu mm</p>
                    </div>

                    <div class="form-group">
                        <label for="wbc">WBC:</label>
                        <input type="number" name="wbc" step="0.01" value="{{ $data->wbc ?? '' }}" class="form-control">
                        <p style="font-size: 10px">4,000 - 12,000 / cu mm</p>
                    </div>
                <div class="tablelabel">
                    <p><b>Differential Count</b><p>
                </div>
                    <div class="form-group">
                        <label for="segmenters">Segmenters:</label>
                        <input type="number" name="segmenters" step="0.01" value="{{ $data->segmenters ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.50 - 0.70</p>
                    </div>

                    <div class="form-group">
                        <label for="band">Band:</label>
                        <input type="number" name="band" value="{{ $data->band ?? '' }}" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.00 - 0.05</p>
                    </div>

                    <div class="form-group">
                        <label for="lymphocyte">Lymphocyte:</label>
                        <input type="number" name="lymphocyte" value="{{ $data->lymphocyte ?? '' }}" step="0.01" class="form-control">
                        <p style="font-size: 10px">0.18 - 0.42</p>
                    </div>

                    <div class="form-group">
                        <label for="Monocyte">Monocyte:</label>
                        <input type="number" name="Monocyte" step="0.01" value="{{ $data->Monocyte ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.02 - 0.11</p>
                    </div>

                    <div class="form-group">
                        <label for="Eosinophil">Eosinophil:</label>
                        <input type="number" name="Eosinophil" step="0.01" value="{{ $data->Eosinophil ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.01 - 0.03</p>
                    </div>

                    <div class="form-group">
                        <label for="Basophil">Basophil:</label>
                        <input type="number" name="Basophil" step="0.01" value="{{ $data->Basophil ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="Metamyelocyte">Metamyelocyte:</label>
                        <input type="number" name="Metamyelocyte" step="0.01" value="{{ $data->Metamyelocyte ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="Myelocyte">Myelocyte:</label>
                        <input type="number" name="Myelocyte" step="0.01" value="{{ $data->Myelocyte ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="Blast_Cell">Blast Cell:</label>
                        <input type="number" name="Blast_Cell" step="0.01" value="{{ $data->Blast_Cell ?? '' }}" class="form-control">
                        <p style="font-size: 10px">0.00</p>
                    </div>

                    <div class="form-group">
                        <label for="platelet">Platelet Count:</label>
                        <input type="number" name="platelet" step="0.01" value="{{ $data->platelet ?? '' }}" class="form-control">
                        <p style="font-size: 10px">15,000 - 450,000 x cu mm</p>
                    </div>

                    <div class="form-group">
                        <label for="Reticulocyte">Reticulocyte Count:</label>
                        <input type="number" name="Reticulocyte" step="0.01" value="{{ $data->Reticulocyte ?? '' }}" class="form-control">
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
                        <input type="text" name="BLOOD_TYPING" value="{{ $data->BLOOD_TYPING ?? '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="rh_factor">Rh Factor:</label>
                        <input type="text" name="rh_factor" value="{{ $data->rh_factor ?? '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="esr">ESR:</label>
                        <input type="number" name="esr" step="0.01" value="{{ $data->esr ?? '' }}" class="form-control">
                        <div class="genderdifference">
                            <p style="font-size: 10px">Male:</p>
                            <p style="font-size: 10px">0 - 15 mm/hr</p>
                            <p style="font-size: 10px">Female:</p>
                            <p style="font-size: 10px">0 - 20 mm/hr</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="clotting_time">Clotting Time:</label>
                        <input type="number" name="clotting_time" step="0.01" value="{{ $data->clotting_time ?? '' }}" class="form-control">
                        <p style="font-size: 10px">2 - 8 minutes</p>
                    </div>

                    <div class="form-group">
                        <label for="bleeding_time">Bleeding Time:</label>
                        <input type="number" name="bleeding_time" step="0.01"  value="{{ $data->bleeding_time ?? '' }}"class="form-control">
                        <p style="font-size: 10px">1 - 5 minutes</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-like">
                <div class="table-like-section">
                    <h3>Medical Technologist:</h3>
    
        <input type="text" readonly   name="medtech" value="{{ $data->medtech ?? '' }}">
    
        <input type="text" readonly   id="medtechLicNo" value="{{ $data->mtlicno ?? '' }}"  />   
</div>

<!-- Pathologist -->
<div class="table-like-section">
    <h3>Pathologist:</h3>

        <input type="text" readonly   name="pathologist" value="{{ $data->pathologist ?? '' }}" />
        <input type="text" readonly   id="pathologistLicNo" value="{{ $data->ptlicno ?? '' }}"  />
</div>
</form>
    <div class="center">
        <button type="submit" class="btn btn-primary">print</button>
    </div>
    
</body>
</html>
