<!DOCTYPE html>
<html>
<head>
    <title>Urinalysis - Search</title>
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
        align-items: center;
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
        grid-template-columns: repeat(3, 1fr);
        gap: 5px;
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
        grid-template-columns: 1fr 1fr;
        gap: 5px;
        margin-bottom: 3px;
    }
    .form-group2{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
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
        .table-like-section, .table-like2-section {
            padding: 3px !important;
            margin-bottom: 3px !important;
            border: 1px solid #000 !important;
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
        
        /* Form group adjustments */
        .form-group, .form-group2 {
            gap: 2px !important;
            margin-bottom: 2px !important;
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
            
            <form action="{{ route('urinalysis.store') }}" method="POST">
                @csrf 
                <div class="innercontainer">
                    <div class="form-row">      
                        <p>Name: <input type="text" readonly name="patient_name" value="{{ $data->Pname ?? '' }}"> </p>
                        <p>AC#: <input type="text" readonly id="ac" name="Poc" value="{{ $data->Poc ?? '' }}"></p>
                        <p>Age: <input type="text" readonly id="age" name="Page" value="{{ $data->Page ?? '' }}"></p>
                        <p>Sex: <input type="text" readonly id="sex" name="Psex" value="{{ $data->Psex ?? '' }}"></p>
                    </div>
                    <div class="form-row2">
                        <p>Date: <input type="text" id="date" name="date" value="{{ $data->date ?? '' }}"></p>
                        <p>OR:<input type="text" readonly id="orNumber" name="OR" value="{{ $data->OR ?? '' }}" > </p>
                        <div class="form-group">
                            <label for="Reqby">Requested By:</label>
                            <input type="text" readonly name="Reqby" class="form-control" value="{{ $data->Reqby ?? '' }}">
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
                            <input type="text" readonly name="color" class="form-control" value="{{ $data->color ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="transparency">Transparency:</label>
                            <input type="text" readonly name="transparency" class="form-control" value="{{ $data->transparency ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ph">pH:</label>
                            <input type="text" readonly name="ph" class="form-control" value="{{ $data->ph ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="gravity">Specific Gravity:</label>
                            <input type="text" readonly name="gravity" class="form-control" value="{{ $data->gravity ?? '' }}">
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
                            <input type="text" readonly name="sec" class="form-control" value="{{ $data->sec ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="mucus">Mucus:</label>
                            <input type="text" readonly name="mucus" class="form-control" value="{{ $data->mucus ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="bacteria">Bacteria:</label>
                            <input type="text" readonly name="bacteria" class="form-control" value="{{ $data->bacteria ?? '' }}">
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
                            <input type="text" readonly name="protein" class="form-control" value="{{ $data->protein ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="glucose">Glucose:</label>
                            <input type="text" readonly name="glucose" class="form-control" value="{{ $data->glucose ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ketones">Ketones:</label>
                            <input type="text" readonly name="ketones" class="form-control" value="{{ $data->ketones ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="bilirubin">Bilirubin:</label>
                            <input type="text" readonly name="bilirubin" class="form-control" value="{{ $data->bilirubin ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="pregnancy">Pregnancy Test:</label>
                            <input type="text" readonly name="pregnancy" class="form-control" value="{{ $data->pregnancy ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="others">Others:</label>
                            <input type="text" readonly name="others" class="form-control" value="{{ $data->others ?? '' }}">
                        </div>
                    </div>
                    <div class="table-like-section">  
                        <!-- Crystals -->
                        <h3 style="text-align: center">Crystals</h3>
                        <div class="form-group">
                            <label for="au">Amorphous Urates:</label>
                            <input type="text" readonly name="au" class="form-control" value="{{ $data->au ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ap">Amorphous Phosphates:</label>
                            <input type="text" readonly name="ap" class="form-control" value="{{ $data->ap ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ua">Uric Acid:</label>
                            <input type="text" readonly name="ua" class="form-control" value="{{ $data->ua ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="co">Calcium Oxalate:</label>
                            <input type="text" readonly name="co" class="form-control" value="{{ $data->co ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="tp">Triple Phosphates:</label>
                            <input type="text" readonly name="tp" class="form-control" value="{{ $data->tp ?? '' }}">
                        </div>
                    </div>
                    <div class="table-like-section">
                        <!-- Casts -->
                        <h3 style="text-align: center">Casts</h3>
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
                        <h3>Medical Technologist:</h3>
                        <input type="text" readonly name="medtech" value="{{ $data->medtech ?? '' }}">
                        <input type="text" readonly id="medtechLicNo" value="{{ $data->mtlicno ?? '' }}" />   
                    </div>
                    <div class="table-like-section">
                        <!-- Pathologist -->
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
        // Print function adjusted for half-page printing
        document.getElementById("print").addEventListener('click', function(){
            // Store original body class
            const originalBodyClass = document.body.className;
            
            // Add print-specific class to body
            document.body.classList.add('printing-half-page');
            
            // Hide non-printable elements before printing
            const nonPrintable = document.querySelectorAll('.no-print');
            nonPrintable.forEach(el => el.style.display = 'none');
            
            // Trigger print
            window.print();
            
            // Restore non-printable elements after printing
            setTimeout(() => {
                nonPrintable.forEach(el => el.style.display = '');
                document.body.className = originalBodyClass;
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