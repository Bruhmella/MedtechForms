<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Fecalysis - Search</title>
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

    <h3 style="text-align:center;">Fecalysis Form - Search</h3>
    <p>
  This is for searching the Fecalysis form.
  If you want to create new data,
  <a href="{{ route('fecalysis.create') }}">click here</a>
</p>

<form method="GET" action="{{ route('fecalysis.search') }}">
    <h5 style="text-align: center;">Enter OR# Here:</h5>  
    <div class="center">
        <input type="text" name="OR" value="{{ request('OR') }}">
        <button type="submit" class="btn btn-info">Search</button>
        <a href="{{ route('fecalysis.search') }}" class="btn btn-primary">Clear search Data</a>
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
        < action="{{ route('fecalysis.store') }}" method="POST">
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
                    <p>OR#: <input type="text" readonly id="date" name="OR" value="{{ $data->OR ?? '' }}"></p>
                    <p>Requested by: <input type="text" readonly name="Reqby" value="{{ $data->Reqby ?? '' }}"></p>
                </div>
            </div>
            <br>
            <!-- Fecalysis Fields -->
            <div class="table-like2">
                <div class="table-like2-section">
                <h3 style="text-align: center">Consistency</h3>
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input type="text" readonly name="color" class="form-control" value="{{ $data->color ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="consistency">Consistency:</label>
                        <input type="text" readonly name="consistency" value="{{ $data->consistency ?? '' }}" class="form-control">
                    </div>
                </div>
                <div class="table-like2-section">
                <h3 style="text-align: center">Miscellaneous</h3>
                    <div class="form-group">
                        <label for="occult_blood">Occult Blood:</label>
                        <input type="text" readonly name="occult_blood" value="{{ $data->occult_blood ?? '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sudan_stain">Sudan Stain:</label>
                        <input type="text" readonly name="sudan_stain" value="{{ $data->sudan_stain ?? '' }}" class="form-control">
                    </div>
                </div>
                <div class="table-like2-section">
                <h3 style="text-align: center">Microscopic Findings</h3>
                    <div class="form-group">
                        <label for="wbc">WBC:</label>
                        <div class="form-subgroup">
                            <input type="number" name="wbc" class="form-control" value="{{ $data->wbc ?? '' }}" step="any" min="0"
                             pattern="^\d+(\.\d+)?$">
                            <p>/hpf</p>
                        </div>
                        <label for="yeast">Yeast:</label>
                        <input type="text" readonly name="yeast" value="{{ $data->yeast ?? '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="rbc">RBC:</label>
                        <div class="form-subgroup">
                            <input type="number" name="rbc" class="form-control" value="{{ $data->rbc ?? '' }}" step="any" min="0" pattern="^\d+(\.\d+)?$">
                            <p>/hpf</p>
                        </div>
                        <label for="fat_globules">Fat Globules:</label>
                        <input type="text" readonly name="fat_globules" value="{{ $data->fat_globules ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bacteria">Bacteria:</label>
                        <input type="text" readonly name="bacteria" value="{{ $data->bacteria ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group2">
                        <label for="others">Others:</label>
                        <textarea type="text" readonly name="others" value="{{ $data->others ?? '' }}" rows="4" cols="50" class="form-control"></textarea>
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
