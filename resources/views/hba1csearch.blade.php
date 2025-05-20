<!DOCTYPE html>
<html>
<head>
    <title>Miscellaneous form 1 - Search</title>
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
        .table-like2-section {
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
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 5px;
            margin-bottom: 3px;
        }
        .form-group2{
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
        <h3 style="text-align: center;">Miscellaneous Form 1 - Search</h3>
        <p>
            This is for data search of the form.
            If you want to create new data,
            <a href="{{ route('hba1c.create') }}">click here</a>
        </p>
        <form method="GET" action="{{ route('hba1c.search') }}">
            <h5 style="text-align: center;">Enter OR# Here:</h5> 
            <div class="center">
                <input type="text" name="OR" value="{{ request('OR') }}">
                <button type="submit" class="btn btn-info">Search</button>
                <a href="{{ route('hba1c.search') }}" class="btn btn-primary">Clear search Data</a>
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
            
            <form action="{{ route('hba1c.store') }}" method="POST">
                @csrf 
                @php $first = $data; @endphp

                <div class="innercontainer">
                    <div class="form-row">
                        <p>Name: <input type="text" readonly id="Pname" name="Pname" value="{{ $first->Pname ?? '' }}"> </p>
                        <p>AC#: <input type="text" readonly id="ac" name="Poc" value="{{ $first->Poc ?? '' }}"></p>
                        <p>Age: <input type="text" readonly id="age" name="Page" value="{{ $first->Page ?? '' }}"></p>
                        <p>Sex: <input type="text" readonly id="sex" name="Psex" value="{{ $first->Psex ?? '' }}"></p>
                    </div>
                    <div class="form-row2">
                        <p>Date: <input type="text" readonly id="date" name="date" value="{{ $first->date ?? '' }}"></p>
                        <p>OR:<input type="text" readonly id="orNumber" name="OR" value="{{ $first->OR ?? '' }}"> </p>
                        <div class="form-group">
                            <label for="Reqby">Requested By:</label>
                            <input type="text" readonly name="Reqby" class="form-control" value="{{ $first->Reqby ?? '' }}">
                        </div>
                    </div>
                </div>

                <br>
                
                <div class="table-like2">
                    <div class="table-like2-section">
                        <div class="form-group">
                            <h3>Test</h3>
                            <h3>Result</h3>
                            <h3>Unit</h3>
                        </div>

                        @if(!empty($dataRows) && $dataRows->count() > 0)
                            @foreach($dataRows as $test)
                            <div class="form-group row-entry">
                                <input type="text" readonly name="test[]" class="form-control" value="{{ $test->test }}">
                                <input type="text" readonly name="result[]" class="form-control" value="{{ $test->result }}">
                                <input type="text" readonly name="unit[]" class="form-control" value="{{ $test->unit }}">
                            </div>
                            @endforeach
                        @else
                            <div class="form-group row-entry">
                                <select disabled name="test[]">
                                    <option value="">--Select--</option>
                                    <option value="HBsAg">HBsAg</option>
                                    <option value="Anti-HIV 1">Anti-HIV 1</option>
                                    <option value="Anti-HIV 2">Anti-HIV 2</option>
                                    <option value="RPR">RPR</option>
                                    <option value="Anti-HBs">Anti-HBs</option>
                                    <option value="HAV">HAV</option>
                                    <option value="Denguo Duo">Denguo Duo</option>
                                    <option value="Dengue NS1">Dengue NS1</option>
                                    <option value="HCV">HCV</option>
                                    <option value="Thyroid">Thyroid</option>
                                </select>
                                <input type="text" readonly name="result[]" class="form-control">
                                <input type="text" readonly name="unit[]" class="form-control">
                            </div>
                        @endif
                    </div>
                </div>

                <br>
                
                <div class="table-like">
                    <div class="table-like-section">
                        <h3>Medical Technologist:</h3>
                        <input type="text" readonly name="medtech" value="{{ $first->medtech ?? '' }}">
                        <input type="text" readonly id="medtechLicNo" value="{{ $first->mtlicno ?? '' }}" />
                    </div>

                    <div class="table-like-section">
                        <h3>Pathologist:</h3>
                        <input type="text" readonly name="pathologist" value="{{ $first->pathologist ?? '' }}" />
                        <input type="text" readonly id="pathologistLicNo" value="{{ $first->ptlicno ?? '' }}" />
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

        function addRow() {
            const rows = document.querySelectorAll('.row-entry');
            if (rows.length >= 3) {
                alert('You can only have a maximum of 3 rows.');
                return;
            }

            const container = document.createElement('div');
            container.classList.add('form-group', 'row-entry');
            container.innerHTML = `
                <select disabled name="test[]">
                    <option value="">--Select--</option>
                    <option value="HBsAg">HBsAg</option>
                    <option value="Anti-HIV 1">Anti-HIV 1</option>
                    <option value="Anti-HIV 2">Anti-HIV 2</option>
                    <option value="RPR">RPR</option>
                    <option value="Anti-HBs">Anti-HBs</option>
                    <option value="HAV">HAV</option>
                    <option value="Denguo Duo">Denguo Duo</option>
                    <option value="Dengue NS1">Dengue NS1</option>
                    <option value="HCV">HCV</option>
                    <option value="Thyroid">Thyroid</option>
                </select>
                <input type="text" readonly name="result[]" class="form-control">
                <input type="text" readonly name="unit[]" class="form-control">
            `;
            document.querySelector('.table-like2-section').appendChild(container);
        }

        function fillPatientData() {
            let patientSelect = document.getElementById('patientSelect');
            let selectedOption = patientSelect.options[patientSelect.selectedIndex];

            if (selectedOption.value === "") {
                document.getElementById('ac').value = "";
                document.getElementById('age').value = "";
                document.getElementById('sex').value = "";
                return;
            }

            let ac = selectedOption.getAttribute('data-ac') || ''; 
            let age = selectedOption.getAttribute('data-age') || ''; 
            let sex = selectedOption.getAttribute('data-sex') || ''; 

            document.getElementById('ac').value = ac;
            document.getElementById('age').value = age;
            document.getElementById('sex').value = sex;
            document.getElementById('date').value = new Date().toISOString().split('T')[0]; 
        }

        document.getElementById('pathologistDropdown')?.addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            document.getElementById('pathologistLicNo').value = selectedOption.dataset.licno || '';
        });

        document.getElementById('medtechDropdown')?.addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            document.getElementById('medtechLicNo').value = selectedOption.dataset.licno || '';
        });

        window.addEventListener('load', function() {
            if (document.getElementById('medtechDropdown')) {
                var medtechDropdown = document.getElementById('medtechDropdown');
                if (medtechDropdown.selectedIndex >= 0) {
                    var selectedOption = medtechDropdown.options[medtechDropdown.selectedIndex];
                    var licNo = selectedOption.getAttribute('data-licno');
                    document.getElementById('medtechLicNo').value = licNo;
                }
            }

            if (document.getElementById('pathologistDropdown')) {
                var pathologistDropdown = document.getElementById('pathologistDropdown');
                if (pathologistDropdown.selectedIndex >= 0) {
                    var selectedOption = pathologistDropdown.options[pathologistDropdown.selectedIndex];
                    var licNo = selectedOption.getAttribute('data-licno');
                    document.getElementById('pathologistLicNo').value = licNo;
                }
            }
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