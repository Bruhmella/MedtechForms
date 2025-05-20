<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Chemistry Form</title>
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
        width: 2400px;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 10px;
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
    .genderdifference {
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
        <h3 style="text-align: center;">Chemistry Form - Search</h3>
        <p>
            This is for search for existing data of chemistry form.
            If you want to create new chemistry form data,
            <a href="{{ route('chemistry.create') }}">click here</a>
        </p>
        <form method="GET" action="{{ route('chemistry.search') }}">
            <h5 style="text-align: center;">Enter OR# Here:</h5> 
            <div class="center">
                <input type="text" name="OR" value="{{ request('OR') }}">
                <button type="submit" class="btn btn-info">Search</button>
                <a href="{{ route('chemistry.search') }}" class="btn btn-primary">Clear search Data</a>
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
            
            <form action="{{ route('chemistry.store') }}" method="POST">
                @csrf
                <div class="innercontainer">
                    <div class="form-row">
                        <p>Name: <input type="text" readonly name="patient_name" value="{{ $data->Pname ?? '' }}"> </p>
                        <p>AC#: <input type="text" readonly id="ac" name="Poc" value="{{ $data->Poc ?? '' }}"></p>
                        <p>Age: <input type="text" readonly id="age" name="Page" value="{{ $data->Page ?? '' }}"></p>
                        <p>Sex: <input type="text" readonly id="sex" name="Psex" value="{{ $data->Psex ?? '' }}"></p>
                    </div>
                    <div class="form-row2">
                        <p>Date: <input type="text" readonly id="date" name="date" value="{{ $data->date ?? '' }}"></p>
                        <p>OR:<input type="text" readonly id="orNumber" name="OR" value="{{ $data->OR ?? '' }}" > </p>
                        <div class="form-group">
                            <label for="Reqby">Requested By:</label>
                            <input type="text" readonly name="Reqby" class="form-control" value="{{ $data->Reqby ?? '' }}">
                        </div>
                    </div>
                </div>
                <br>
                
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
                            <input type="number" readonly name="glucose" step="0.01" value="{{ $data->glucose ?? '' }}" class="form-control">
                            <p>4.2 - 6.4 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="urea_nitrogen">Urea Nitrogen:</label>
                            <input type="number" readonly value="{{ $data->urea_nitrogen ?? '' }}" name="urea_nitrogen" step="0.01" class="form-control">
                            <p>1.6 - 8.3 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="creatine">Creatine:</label>
                            <input type="number" value="{{ $data->creatine ?? '' }}" readonly name="creatine" step="0.01" class="form-control">
                            <div class="genderdifference">
                                <p>Male:</p>
                                <p>62 - 124 umol/L</p>
                                <p>Female:</p>
                                <p>62 - 106 umol/L</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="uric_acid">Uric Acid:</label>
                            <input type="number" readonly name="uric_acid" value="{{ $data->uric_acid ?? '' }}" step="0.01" class="form-control">
                            <div class="genderdifference">
                                <p>Male:</p>
                                <p>203 - 417 umol/L</p>
                                <p>Female:</p>
                                <p>143 - 340 umol/L</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="total_cholesterol">Total Cholesterol:</label>
                            <input type="number" readonly name="total_cholesterol" value="{{ $data->total_cholesterol ?? '' }}" step="0.01" class="form-control">
                            <p>< 5.14 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="triglyceride">Triglyceride:</label>
                            <input type="number" readonly name="triglyceride" value="{{ $data->triglyceride ?? '' }}" step="0.01" class="form-control">
                            <p>0.45 - 1.86 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="hdl">HDL:</label>
                            <input type="number" readonly name="hdl" step="0.01" value="{{ $data->hdl ?? '' }}" class="form-control">
                            <div class="genderdifference">
                                <p>Male:</p>
                                <p>> 1.42 mmol/L</p>
                                <p>Female:</p>
                                <p>> 1.68 mmol/L</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ldl">LDL:</label>
                            <input type="number" readonly name="ldl" step="0.01" value="{{ $data->ldl ?? '' }}" class="form-control">
                            <p>1.72 - 4.63 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="vldl">VLDL:</label>
                            <input type="number" readonly name="vldl" step="0.01" value="{{ $data->vldl ?? '' }}" class="form-control">
                            <p>0.0 - 1.04 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="ratio">Ratio:</label>
                            <input type="number" readonly name="ratio" step="0.01" value="{{ $data->ratio ?? '' }}" class="form-control">
                            <p>LESS THAN 4.0</p>
                        </div>

                        <div class="form-group">
                            <label for="ast">SGOT (AST):</label>
                            <input type="number" readonly name="ast" step="0.01" value="{{ $data->ast ?? '' }}" class="form-control">
                            <p>UP TO 40 U/L</p>
                        </div>

                        <div class="form-group">
                            <label for="alt">SGOT (ALT):</label>
                            <input type="number" readonly name="alt" step="0.01" value="{{ $data->alt ?? '' }}" class="form-control">
                            <p>UP TO 30 U/L</p>
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
                            <input type="number" readonly name="sodium" value="{{ $data->sodium ?? '' }}" step="0.01" class="form-control">
                            <p>135 - 148 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="potassium">Potassium:</label>
                            <input type="number" readonly name="potassium" value="{{ $data->potassium ?? '' }}" step="0.01" class="form-control">
                            <p>3.5 - 5.3 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="chloride">Chloride:</label>
                            <input type="number" readonly name="chloride" value="{{ $data->chloride ?? '' }}" step="0.01" class="form-control">
                            <p>98 - 107 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="ionized_calcium">Ionized calcium:</label>
                            <input type="number" readonly name="ionized_calcium" value="{{ $data->ionized_calcium ?? '' }}" step="0.01" class="form-control">
                            <p>98 - 107 mmol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="protein">Protein:</label>
                            <input type="number" readonly name="protein" step="0.01" value="{{ $data->protein ?? '' }}" class="form-control">
                            <p>65 - 83 g/L</p>
                        </div>

                        <div class="form-group">
                            <label for="albumin">Albumin:</label>
                            <input type="number" readonly name="albumin" step="0.01" value="{{ $data->albumin ?? '' }}" class="form-control">
                            <p>35 - 50 g/L</p>
                        </div>

                        <div class="form-group">
                            <label for="globulin">Globulin:</label>
                            <input type="number" readonly name="globulin" step="0.01" value="{{ $data->globulin ?? '' }}" class="form-control">
                            <p>23 - 35 g/L</p>
                        </div>

                        <div class="form-group">
                            <label for="ag_ratio">A/G Ratio:</label>
                            <input type="number" readonly name="ag_ratio" step="0.01" value="{{ $data->ag_ratio ?? '' }}" class="form-control">
                            <p>1.3 - 3:1</p>
                        </div>

                        <div class="form-group">
                            <label for="alkaline">Alkaline Phosphatase:</label>
                            <input type="number" readonly name="alkaline" step="0.01" value="{{ $data->alkaline ?? '' }}" class="form-control">
                            <p>30 - 90 U/L</p>
                        </div>

                        <div class="form-group">
                            <label for="bilirubin">Bilirubin:</label>
                            <input type="number" readonly name="bilirubin" step="0.01" value="{{ $data->bilirubin ?? '' }}" class="form-control">
                            <p>3 - 17 umol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="b2">Indirect Bilirubin:</label>
                            <input type="number" readonly name="b2" step="0.01" value="{{ $data->b2 ?? '' }}" class="form-control">
                            <p>0 - 3 umol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="b1">Direct Bilirubin:</label>
                            <input type="number" readonly name="b1" step="0.01" value="{{ $data->b1 ?? '' }}" class="form-control">
                            <p>3 - 14 umol/L</p>
                        </div>

                        <div class="form-group">
                            <label for="others">Others:</label>
                            <input type="text" name="others" rows="4" value="{{ $data->others ?? '' }}" cols="50" readonly>
                        </div>

                        <div class="form-group">
                            <label for="remarks">Remarks:</label>
                            <input type="text" name="remarks" value="{{ $data->remarks ?? '' }}" class="form-control" readonly>
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