<!DOCTYPE html>
<html>
<head>
	<title>RBS form</title>
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
        grid-template-columns: repeat(1fr);
        gap: 10px;
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
        grid-template-columns: 1fr 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .form-group2{
        display: grid;
        grid-template-columns: 1fr 1fr; /* Label and input */
        gap: 5px;
        margin-bottom: 3px;
        }
        .form-group3{
        display: grid;
        grid-template-columns: 1fr 2fr; /* Label and input */
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
<!--start here-->
 <h3>RBS Form - Search</h3>
<p>
  This is for data search of the RBS form.
  If you want to create for existing RBS data,
  <a href="{{ route('rbs.create') }}">click here</a>

</p>

<form method="GET" action="{{ route('rbs.search') }}">
    <h5>Enter OR# Here:</h5> 
    <input type="text" name="OR" value="{{ request('OR') }}">
    <button type="submit">Search</button>
    <a href="{{ route('rbs.search') }}" class="btn btn-primary">Clear search Data</a>

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
        <form action="{{ route('rbs.store') }}" method="POST">
            @csrf 
<!--start here-->
           <div class="innercontainer">
                <div class="form-row">
                <p>Name: <input type="text" readonly  name="patient_name" value="{{ $data->Pname ?? '' }}"> </p>

                <p>AC#: <input type="text" readonly   id="ac" name="Poc" value="{{ $data->Poc ?? '' }}"></p>

                <p>Age: <input type="text" readonly   id="age"  name="Page" value="{{ $data->Page ?? '' }}"></p>

                <p>Sex: <input type="text" readonly   id="sex"  name="Psex" value="{{ $data->Psex ?? '' }}"></p>

                </div>
                <div class="form-row2">
                    <p>Date: <input type="text" readonly id="date" name="date" value="{{ $data->date ?? '' }}"></p>
                    <p>OR:<input type="text" readonly   id="orNumber" name="OR" value="{{ $data->OR ?? '' }}" > </p>


                    <div class="form-group">
                        <label for="Reqby">Requested By:</label>
                        <input type="text" readonly   name="Reqby" class="form-control" value="{{ $data->Reqby ?? '' }}">               
            </div>
<!--end here-->
            <div class="table-like2">
                <div class="table-like-section">
                    <div class="form-group3">
                        <h3><br>Test</h3>
                        <div class="form-group2">
                            <h3 style="text-align:center;">System International</h3>
                            <h3 style="text-align:center;">Conventional</h3>
                            <div class="form-group">
                                <h3>Result</h3>
                                <h3>Unit</h3>
                                <h3>Reference</h3>
                            </div>
                            <div class="form-group">
                                <h3>Result</h3>
                                <h3>Unit</h3>
                                <h3>Reference</h3>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>RBS</p>
                        <div class="form-group">
                            <input type="number" readonly name="result" step="0.01" value="{{ $data->result ?? '' }}" class="form-control">
                            <p>mmol/L</p>
                            <p>3.8 - 6.9</p>
                        </div>
                        <div class="form-group">
                            <input type="number" value="{{ $data->result2 ?? '' }}" readonly name="result2" step="0.01" class="form-control">
                            <p>mmol/L</p>
                            <p>68.4 - 124.2</p>
                        </div>
                    </div>
                </div>
            </div>
<!-- start copy here -->
       <div class="table-like">

            <div class="table-like-section">
    <h3>Medical Technologist:</h3>
    
        <input type="text" readonly   name="medtech" value="{{ $data->medtech ?? '' }}">
    
        <input type="text" readonly   id="medtechLicNo" value="{{ $data->mtlicno ?? '' }}"  />   
</div>

<div class="table-like-section">
    <h3>Pathologist:</h3>
        <input type="text" readonly   name="pathologist" value="{{ $data->pathologist ?? '' }}" />
        <input type="text" readonly   id="pathologistLicNo" value="{{ $data->ptlicno ?? '' }}"  />
</div>
</form>
    <div class="center">
    <button type="submit" class="btn btn-primary">print</button>
    </div>

 <!-- end here -->
</body>
</html>