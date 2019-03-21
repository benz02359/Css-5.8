<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customers service and support</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="{{ asset('/js/cus.js') }}"></script>
    
    
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.4.2/firebase-storage.js"></script>
    <script>
	
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDiaUDP4dhP_FUbTXOFa-g7ugATxi9lmdI",
    authDomain: "hdpj-632ed.firebaseapp.com",
    databaseURL: "https://hdpj-632ed.firebaseio.com",
    projectId: "hdpj-632ed",
    storageBucket: "hdpj-632ed.appspot.com",
    messagingSenderId: "120261714092"
  };
  firebase.initializeApp(config);
  var database = firebase.database();

    var lastIndex = 0;

  
});
</script>
@yield('style')
<style>
.*{
    background-color: #284255;
    box-sizing: border-box;
}
.sidenav {
    height: 100%;
    width: 120px;
    position: fixed;
    z-index: 10;
    top: 0;
    left: 0;
    background-color: #000000;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}
@media (min-width: 768px){
.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
}
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 5px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.rep {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #b2b2b2;
  color: white;
}

.fa {font-size:50px;}

.header-primary {
    background-color: #fff;
    height: 50px;
    border-bottom: 1px #ebeef0 solid;
    padding: 0 10px;
    vertical-align: middle;
}
</style>	
</head>
<body>
<div class="sidenav">
            <a href="{{url('/')}}" class="fa fa-home"> Home</a>

            <a href="{{url('/help')}}" class="fa fa-search"> Helper</a>
            <a href="{{url('/contact')}}" class="fa fa-id-card-o"> Contact</a>
            <a href="{{url('/solutions')}}" class="fa fa-question-circle-o"> Solution</a>
            <a href="{{url('/forum')}}" class="fa fa-comments-o"> Forums</a>
            <a href="{{url('/report')}}" class="fa fa-bar-chart-o"> Reports</a>
        </div>
    @yield('content')
</body>
<footer>@yield('footer')</footer>
</html>
