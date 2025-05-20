<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Fecalysis - Search</title>
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
    .table-like-label {
        text-align: right;
        padding-right: 5px;
    }
    .table-like2 {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }
    .table-like2-section {
        border: 1px solid #ccc;
        padding: 10px;
    }
    .form-group{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 5px;
        margin-bottom: 3px;
    }
    .form-subgroup{
        display: grid;
        grid-template-columns: 1fr 1fr;
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
            padding: 5mm !important;
            border: none !important;
            height: auto !important; /* Changed from 140mm to auto */
            overflow: visible !important; /* Changed from hidden */
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
        
        textarea {
            height: 20px !important;
        }
        
        /* Grid layouts */
        .topcontainer {
            grid-template-columns: 20mm 1fr 20mm !important; /* Reduced image width */
            margin-bottom: 3px !important;
        }
        
        .form-row, 
        .form-row2,
        .table-like,
        .table-like2 {
            gap: 2px !important;
            margin-bottom: 2px !important;
        }
        
        /* Inner container adjustments */
        .innercontainer {
            border: none !important;
            padding: 0 !important;
        }
        
        /* Table-like sections */
        .table-like2-section {
            padding: 3px !important;
            margin-bottom: 3px !important;
        }
        
        /* Medical Technologist and Pathologist sections */
        .table-like-section {
            padding: 3px !important;
            border: 1px solid #000 !important;
        }
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
            width: 20mm !important; /* Reduced image size */
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
            
            <form action="{{ route('fecalysis.store') }}" method="POST">
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
                                <input type="number" name="wbc" readonly class="form-control" value="{{ $data->wbc ?? '' }}" step="any" min="0" pattern="^\d+(\.\d+)?$">
                                <p>/hpf</p>
                            </div>
                            <label for="yeast">Yeast:</label>
                            <input type="text" readonly name="yeast" value="{{ $data->yeast ?? '' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rbc">RBC:</label>
                            <div class="form-subgroup">
                                <input type="number" name="rbc" readonly class="form-control" value="{{ $data->rbc ?? '' }}" step="any" min="0" pattern="^\d+(\.\d+)?$">
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
                            <textarea readonly name="others" rows="4" cols="50" class="form-control">{{ $data->others ?? '' }}</textarea>
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