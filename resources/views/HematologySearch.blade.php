<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hematology Form</title>
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
            width: 1200px;
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
            width: 200px;
            text-align: right;
            padding-right: 10px;
        }
        .form-input {
            width: 250px;
        }
        .table-like {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .table-like-section {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .table-like-subsection {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
            margin-bottom: 3px;
        }
        .tablelabel {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
        }
        .form-group{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
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
            gap: 5px;
            height: 50px;
        }
        
        /* PRINT-SPECIFIC STYLES */
    @media print {
        /* Hide everything except the printable area */
        body * {
            visibility: hidden;
        }
        
        /* Printable container and its contents */
        .printable-container,
        .printable-container * {
            visibility: visible;
        }
        
        /* Position the printable area */
        .printable-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        
        /* Adjust container for print */
        .container {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 5mm !important;
            border: none !important;
            height: auto !important;
            overflow: visible !important;
        }
        
        /* Typography adjustments */
        h1 {
            font-size: 16px !important;
            margin: 2px 0 !important;
        }
        h3 {
            font-size: 12px !important;
            margin: 2px 0 !important;
        }
        p, label {
            font-size: 9px !important;
            margin: 1px 0 !important;
        }
        
        /* Address line break fix */
        .toptext p {
            white-space: pre-line !important;
        }
        
        /* Form elements */
        input, textarea, select {
            width: 100% !important;
            border: 1px solid #000 !important;
            padding: 0 2px !important;
            font-size: 9px !important;
            height: auto !important;
            line-height: 1.2 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            background: transparent !important;
        }
        
        /* Grid layouts */
        .topcontainer {
            grid-template-columns: 20mm 1fr 20mm !important;
            margin-bottom: 3px !important;
        }
        
        .form-row, 
        .form-row2,
        .table-like {
            gap: 2px !important;
            margin-bottom: 2px !important;
        }
        
        /* Inner container adjustments */
        .innercontainer {
            border: none !important;
            padding: 0 !important;
        }
        
        /* Table-like sections */
        .table-like-section {
            padding: 3px !important;
            margin-bottom: 3px !important;
            border: 1px solid #000 !important;
        }
        
        /* Table label styling */
        .tablelabel {
            display: grid !important;
            grid-template-columns: 1fr 1fr 1fr !important;
            margin-bottom: 3px !important;
        }
        
        /* Form group adjustments */
        .form-group {
            gap: 2px !important;
            margin-bottom: 2px !important;
        }
        
        /* Gender difference styling */
        .genderdifference {
            display: grid !important;
            grid-template-columns: 0.5fr 0.5fr !important;
            grid-template-rows: 0.5fr 0.5fr !important;
        }
        .genderdifference p {
            font-size: 8px !important;
            margin: 1px 0 !important;
        }
        
        /* Medical Technologist and Pathologist sections */
        .table-like-section h3 {
            margin-bottom: 3px !important;
        }
        .table-like-section input {
            display: block !important;
            visibility: visible !important;
            margin-top: 2px !important;
            width: 100% !important;
            border: 1px solid #000 !important;
        }
        
        /* Images */
        .leftimage img, .rightimage img {
            width: 20mm !important;
            height: auto !important;
        }
        
        /* Remove line breaks */
        br {
            display: none !important;
        }
        
        /* Page settings */
        @page {
            size: A4;
            margin: 5mm;
        }
    }
    </style>
</head>
<body>
    <!-- Non-printable sidebar -->
    <div class="w3-sidebar w3-bar-block w3-border-right no-print" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <a href="{{ route('home')}}" class="w3-bar-item w3-button">Home</a>
        <a href="{{ route('PatDataManage')}}" class="w3-bar-item w3-button">Manage Patient Data</a>
    </div>
    
    <!-- Non-printable header -->
    <div class="w3-teal no-print">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
    </div>

    <!-- Non-printable search section -->
    <div class="no-print">
        <h3 style="text-align: center;">Hematology Form - Search</h3>
        <p>
            This is for searching the hematology form.
            If you want to create new data,
            <a href="{{ route('hematology.create') }}">click here</a>
        </p>
        <form method="GET" action="{{ route('hematology.search') }}">
            <h5 style="text-align: center;">Enter OR# Here:</h5> 
            <div class="center">
                <input type="text" name="OR" value="{{ request('OR') }}">
                <button type="submit" class="btn btn-info">Search</button>
                <a href="{{ route('hematology.search') }}" class="btn btn-primary">Clear search Data</a>
            </div>
        </form>
    </div>

    <!-- Printable container - wraps all content that should print -->
    <div class="printable-container">
        <div class="container">
            <div class="topcontainer">
                <div class="leftimage">
                    <img src="{{ asset('img/Picture1.png') }}" style="width: 135px; justify-content: center;">
                </div>
                <div class="toptext">
                    <h1>FAR EASTERN COLLEGE – SILANG, INC.</h1>
                    <p>Metrogate, Silang Estates, Silang, Cavite<br>
                    Contact No(s): 123-456-789 | 098-765-432</p>
                </div>
                <div class="rightimage">
                    <img src="{{ asset('img/medtech.png') }}" style="width: 135px; justify-content: center; margin-top: 10px;">
                </div>
            </div>
            
            <form action="{{ route('hematology.store') }}" method="POST">
                @csrf
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
                                <p>Male:</p>
                                <p>140 - 180 g/L</p>
                                <p>Female:</p>
                                <p>120 - 150 g/L</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="hematocrit">Hematocrit:</label>
                            <input type="number" name="hematocrit" step="0.01" value="{{ $data->hematocrit ?? '' }}" class="form-control">
                            <div class="genderdifference">
                                <p>Male:</p>
                                <p>0.40 - 0.54 vol. %</p>
                                <p>Female:</p>
                                <p>0.35 - 0.49 vol. %</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rbc">RBC:</label>
                            <input type="number" name="rbc" step="0.01" value="{{ $data->rbc ?? '' }}"class="form-control">
                            <p>4.0 - 6.0 x M/cu mm</p>
                        </div>

                        <div class="form-group">
                            <label for="wbc">WBC:</label>
                            <input type="number" name="wbc" step="0.01" value="{{ $data->wbc ?? '' }}" class="form-control">
                            <p>4,000 - 12,000 / cu mm</p>
                        </div>
                        
                        <div class="tablelabel">
                            <p><b>Differential Count</b><p>
                        </div>
                        
                        <div class="form-group">
                            <label for="segmenters">Segmenters:</label>
                            <input type="number" name="segmenters" step="0.01" value="{{ $data->segmenters ?? '' }}" class="form-control">
                            <p>0.50 - 0.70</p>
                        </div>

                        <div class="form-group">
                            <label for="band">Band:</label>
                            <input type="number" name="band" value="{{ $data->band ?? '' }}" step="0.01" class="form-control">
                            <p>0.00 - 0.05</p>
                        </div>

                        <div class="form-group">
                            <label for="lymphocyte">Lymphocyte:</label>
                            <input type="number" name="lymphocyte" value="{{ $data->lymphocyte ?? '' }}" step="0.01" class="form-control">
                            <p>0.18 - 0.42</p>
                        </div>

                        <div class="form-group">
                            <label for="Monocyte">Monocyte:</label>
                            <input type="number" name="Monocyte" step="0.01" value="{{ $data->Monocyte ?? '' }}" class="form-control">
                            <p>0.02 - 0.11</p>
                        </div>

                        <div class="form-group">
                            <label for="Eosinophil">Eosinophil:</label>
                            <input type="number" name="Eosinophil" step="0.01" value="{{ $data->Eosinophil ?? '' }}" class="form-control">
                            <p>0.01 - 0.03</p>
                        </div>

                        <div class="form-group">
                            <label for="Basophil">Basophil:</label>
                            <input type="number" name="Basophil" step="0.01" value="{{ $data->Basophil ?? '' }}" class="form-control">
                            <p>0.00</p>
                        </div>

                        <div class="form-group">
                            <label for="Metamyelocyte">Metamyelocyte:</label>
                            <input type="number" name="Metamyelocyte" step="0.01" value="{{ $data->Metamyelocyte ?? '' }}" class="form-control">
                            <p>0.00</p>
                        </div>

                        <div class="form-group">
                            <label for="Myelocyte">Myelocyte:</label>
                            <input type="number" name="Myelocyte" step="0.01" value="{{ $data->Myelocyte ?? '' }}" class="form-control">
                            <p>0.00</p>
                        </div>

                        <div class="form-group">
                            <label for="Blast_Cell">Blast Cell:</label>
                            <input type="number" name="Blast_Cell" step="0.01" value="{{ $data->Blast_Cell ?? '' }}" class="form-control">
                            <p>0.00</p>
                        </div>

                        <div class="form-group">
                            <label for="platelet">Platelet Count:</label>
                            <input type="number" name="platelet" step="0.01" value="{{ $data->platelet ?? '' }}" class="form-control">
                            <p>15,000 - 450,000 x cu mm</p>
                        </div>

                        <div class="form-group">
                            <label for="Reticulocyte">Reticulocyte Count:</label>
                            <input type="number" name="Reticulocyte" step="0.01" value="{{ $data->Reticulocyte ?? '' }}" class="form-control">
                            <p>0.50 - 1.5%</p>
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
                                <p>Male:</p>
                                <p>0 - 15 mm/hr</p>
                                <p>Female:</p>
                                <p>0 - 20 mm/hr</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="clotting_time">Clotting Time:</label>
                            <input type="number" name="clotting_time" step="0.01" value="{{ $data->clotting_time ?? '' }}" class="form-control">
                            <p>2 - 8 minutes</p>
                        </div>

                        <div class="form-group">
                            <label for="bleeding_time">Bleeding Time:</label>
                            <input type="number" name="bleeding_time" step="0.01"  value="{{ $data->bleeding_time ?? '' }}"class="form-control">
                            <p>1 - 5 minutes</p>
                        </div>
                    </div>
                </div>
                
                <br>
                
                <div class="table-like">
                    <div class="table-like-section">
                        <h3>Medical Technologist:</h3>
                        <input type="text" readonly name="medtech" value="{{ $data->medtech ?? '' }}">
                        <input type="text" readonly id="medtechLicNo" value="{{ $data->mtlicno ?? '' }}" />   
                    </div>
                    <div class="table-like-section">
                        <h3>Pathologist:</h3>
                        <input type="text" readonly name="pathologist" value="{{ $data->pathologist ?? '' }}" />
                        <input type="text" readonly id="pathologistLicNo" value="{{ $data->ptlicno ?? '' }}" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Non-printable print button -->
    <div class="center no-print">
        <button type="button" class="btn btn-primary" id="print">Print</button>
    </div>

    <script>
        // Improved print function
        document.getElementById("print").addEventListener('click', function(){
            // Hide non-printable elements before printing
            const nonPrintable = document.querySelectorAll('.no-print');
            nonPrintable.forEach(el => el.style.display = 'none');
            
            // Trigger print
            window.print();
            
            // Restore non-printable elements after printing
            setTimeout(() => {
                nonPrintable.forEach(el => el.style.display = '');
            }, 500);
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