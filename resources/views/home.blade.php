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
<h2>Welcome, {{ $user->fname }}!</h2>

<div class="grid">
<!---Urinalysis--->
    <div class="polaroid">
        <img src="{{ asset('img/Urianalysis img.png') }}" style="width:100%">
        <div class="container">
        <a href="{{ route('Urinalysis.create')}}"><button>Urinalysis</button></a>
        </div>
    </div>
<!---Fecalysis--->
    <div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('Fecalysis.create')}}"><BUTTON>Fecalysis</BUTTON></a>
    </div>
</div>

    <div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('hematology.create')}}"><BUTTON>Hematology</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('chemistry.create')}}"><BUTTON>Chemistry</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('rbs.create')}}"><BUTTON>RBS</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('hba1c.create')}}"><BUTTON>HbA1c</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('thyroid.create')}}"><BUTTON>Thyroid</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('hbsag.create')}}"><BUTTON>HBSAG</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('tropi.create')}}"><BUTTON>TROP I</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('tropii.create')}}"><BUTTON>TROP II</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('styphi.create')}}"><BUTTON>S. Typhi</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('dengue.create')}}"><BUTTON>Dengue DUO & NS1 Ag</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('hav.create')}}"><BUTTON>Anti-Hav</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('tp.create')}}"><BUTTON>Anti-TP</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('misc1.create')}}"><BUTTON>placeholder1</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('misc2.create')}}"><BUTTON>placeholder2</BUTTON></a>
    </div>
</div>

<div class="polaroid">
        <img sec='picture'>
        <div class="container">
        <a href="{{ route('misc3.create')}}"><BUTTON>placeholder3</BUTTON></a>
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
