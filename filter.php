<?php
	@session_start();
	include "conn.php";

	if($_SESSION['user'] || $_SESSION['admin'])
	{
		?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    

<title>Landing Page</title>
</head>

<body class="grey lighten-2">
    
<nav class="teal" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a>
        <a href="javascript:history.back()" data-activates="nav-mobile" class="left" ><i class="material-icons">arrow_back</i></a>
        <a href="#" data-activates="nav-mobile" class="right">APPLY</a>
    </div>
  </nav>
        
    
 <div class="container">    
     
      <div class="row">
        <div class="col s12 m7">
          <div class="card zeromarg">
            <div class="card-content">
                <form action="#">
                <p>
                  <input type="checkbox" class="filled-in" id="free"  />
                     <label for="free">Hanya event gratis</label>
                </p>
                </form>
            </div>            
          </div>
        </div>
      </div>
     
     <div class="row">
        <div class="col s12 m7">
          <div class="card zeromarg">
            <div class="card-content">
                <form action="#">
                <p>
                  <input type="checkbox" class="filled-in" id="new"  />
                     <label for="new">Event baru</label>
                </p>
                </form>
            </div>            
          </div>
        </div>
      </div>
     
     <div class="row">
        <div class="col s12 m7">
          <div class="card zeromarg">
            <div class="card-content">
                <form action="#">
                <p>
                  <input type="checkbox" class="filled-in" id="popular"  />
                     <label for="popular">Event populer</label>
                </p>
                </form>
            </div>            
          </div>
        </div>
      </div>
     
     <div class="row">
        <div class="col s12 m7">
          <div class="card zeromarg">
                <ul class="collapsible" data-collapsible="accordion">
                    
                    <li>
                      <div class="collapsible-header"><b>DATE</b></div>
                        
                        
                      <div class="collapsible-body">
                          <form action="#">
                    <p>
                      <input class="with-gap" name="dateradio" type="radio" id="alldate"  />
                      <label for="alldate">Semua tanggal</label>
                    </p>
                        <p>
                      <input class="with-gap" name="dateradio" type="radio" id="today"  />
                      <label for="today">Hari ini</label>
                    </p>
                        <p>
                      <input class="with-gap" name="dateradio" type="radio" id="bsk"  />
                      <label for="bsk">Besok</label>
                    </p>
                        <p>
                      <input class="with-gap" name="dateradio" type="radio" id="wkd"  />
                      <label for="wkd">Weekend</label>
                    </p>
                        
                              
                              
                        <p>
                         <input class="with-gap" name="dateradio" type="radio" id="pd"  />
                            <label for="pd">Pilih tanggal</label>
                            </p>
                        
                            <div id="datepick" class="container">
                             <input type="date" class="datepicker"> to <input type="date" class="datepicker"> 
                            </div>
                            
                 
                        
                  </form>
                        
                        </div>    
                    
                    </li>
                    
                    </ul>
                       
          </div>
        </div>
      </div>
     
     
     
</div>

    <script>
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
        
    </script>
    
    
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
    
</body>
</html>

<?php
	}
	else
	{
		header("location:login.php");
	}
?>