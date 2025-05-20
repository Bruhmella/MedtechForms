<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link href="{{ asset('css/w3editable.css') }}" rel="stylesheet">
    <style>
    h1, h2{
    font-family: Cambria;
    }
    a {
    font-family: Calibri;
    }
    div.polaroid {
    width: 331px;
    background-color: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-bottom: 25px;
    }
    div.container {
    text-align: center;
    padding: 10px 20px;
    }
    div.grid {
    display: grid;
    grid-template-columns: 340px 340px 340px 340px;
    }
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>
<body>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="{{ route('logout')}}" class="w3-bar-item w3-button">Log Out</a>
  <!---manage patient data---->
  <a href="{{ route('PatDataManage')}}" class="w3-bar-item w3-button">Manage Patient Data</a>
</div>
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
</div>
<!--<h1>Login Success</h1>-->

<!---Welcome, [user] message--->
<h2 style="text-align: center;">Welcome, {{ $user->fname }}!</h2>
<div class="center">
    <div class="grid">

    
    <!---Urinalysis--->
    <div class="polaroid">
        <img src="{{ asset('img/Urianalysis img.png') }}" style="width:100%">
        <div class="container">
            <a href="{{ route('urinalysis.create')}}"><button>Urinalysis</button></a>
        </div>
    </div>


    <!---Fecalysis--->
        <div class="polaroid">
            <img src="{{ asset('img/Fecalysis img.png') }}" style="width:100%">
            <div class="container">
            <a href="{{ route('fecalysis.create')}}"><BUTTON>Fecalysis</BUTTON></a>
        </div>
    </div>

        <div class="polaroid">
            <img src="{{ asset('img/Hematology img.png') }}" style="width:100%">
            <div class="container">
            <a href="{{ route('hematology.create')}}"><BUTTON>Hematology</BUTTON></a>
        </div>
    </div>

    <div class="polaroid">
            <img src="{{ asset('img/Chemistry img.png') }}" style="width:100%">
            <div class="container">
            <a href="{{ route('chemistry.create')}}"><BUTTON>Chemistry</BUTTON></a>
        </div>
    </div>

    <div class="polaroid">
            <img src="{{ asset('img/RBS img.png') }}" style="width:100%">
            <div class="container">
            <a href="{{ route('rbs.create')}}"><BUTTON>RBS</BUTTON></a>
        </div>
    </div>

    <div class="polaroid">
            <img src="{{ asset('img/HBA1c img.png') }}" style="width:100%">
            <div class="container">
            <a href="{{ route('hba1c.create')}}"><BUTTON>Miscellaneous</BUTTON></a>
        </div>
    </div>

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
