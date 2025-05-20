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
        .table-like2 {
            display: grid;
            grid-template-columns: 1fr;
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
        .form-group{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 5px;
            margin-bottom: 3px;
        }
        .form-group2{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
            margin-bottom: 3px;
        }
        .form-group3{
            display: grid;
            grid-template-columns: 1fr 2fr;
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
                padding: 0 !important;
                border: none !important;
            }
            
            /* Typography adjustments */
            h1 {
                font-size: 18px !important;
                margin: 5px 0 !important;
            }
            h3 {
                font-size: 14px !important;
                margin: 4px 0 !important;
            }
            p, label {
                font-size: 10px !important;
                margin: 2px 0 !important;
            }
            
            /* Form elements */
            input, textarea, select {
                width: 100% !important;
                border: 1px solid #000 !important;
                padding: 1px !important;
                font-size: 10px !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                background: transparent !important;
            }
            
            /* Grid layouts */
            .topcontainer {
                grid-template-columns: 0.5fr 3fr 0.5fr !important;
                margin-bottom: 5px !important;
            }
            
            .form-row, 
            .form-row2,
            .table-like,
            .table-like2 {
                gap: 2px !important;
                margin-bottom: 3px !important;
            }
            
            /* Images */
            .leftimage img, .rightimage img {
                width: 100px !important;
                height: auto !important;
            }
            
            /* Page settings */
            @page {
                size: A4;
                margin: 10mm;
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
        <h3>RBS Form - Search</h3>
        <p>
            This is for data search of the form.
            If you want to create new data,
            <a href="{{ route('rbs.create') }}">click here</a>
        </p>
        <form method="GET" action="{{ route('rbs.search') }}">
            <h5 style="text-align: center;">Enter OR# Here:</h5> 
            <div class="center">
                <input type="text" name="OR" value="{{ request('OR') }}">
                <button type="submit" class="btn btn-info">Search</button>
                <a href="{{ route('rbs.search') }}" class="btn btn-primary">Clear search Data</a>
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
                    <h1>FAR EASTERN COLLEGE – SILANG, INC</h1>
                    <p>Metrogate, Silang Estates, Silang, Cavite<br>
                    Contact No(s): 123-456-789 | 098-765-432</p>
                </div>
                <div class="rightimage">
                    <img src="{{ asset('img/medtech.png') }}" style="width: 135px; justify-content: center; margin-top: 10px;">
                </div>
            </div>
            
            <form action="{{ route('rbs.store') }}" method="POST">
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