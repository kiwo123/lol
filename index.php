<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Namnlöst dokument</title>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-responsive.css">

<style type="text/css">

.top-niebieski {
background-image: url("images/lolk.jpg");
background-repeat: repeat-x;
background-position: center top;
width: 100%;
height: 526px;
margin-bottom: 20px;
text-align: center;
}

.loggz {


margin-top: 150px;
display: inline-block;

}

.loggz h2,h1 {

  color: #fff;
  background-color: #000;


}


#bajs {



}

#bildfront img {
  display:block;

  margin: 0 auto;

}


#myslides {

}   
 
#myslides img {

}

#myslidex {

} 


</style>

<!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>



<body>



    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Min fotosite!</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="bootstree.php">Gör testet!</a></li>
                  <li><a href="boottwo.php">Fler bilder</a></li>
                  <li><a href="#launch" data-toggle="modal">Logga in</a></li>
                </ul>
              </li>
            </ul>

            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

   

    	<div class="top-niebieski">
        <div class="loggz">
        <h1>Min fotosite! </h1>
        <h2>Här kan du titta på olika bilder samt göra ett litet test!.</h2>
        <p><a class="btn btn-primary btn-large">Gör testet! &raquo;</a></p>
      </div>
      </div>


      
       <div class="container">
        <div class="row">
        <div class="span12">
          <hr>

          <h2>Olika bilder i thumbnail format.</h2>

                    <?php

          $directory = 'images/';   
try {     
  // Styling for images 
  echo "<div id=\"myslides\">"; 
  foreach ( new DirectoryIterator($directory) as $item ) {      
    if ($item->isFile()) {
      $path = $directory . "/" . $item; 
      echo "<img src=\"" . $path . "\" class=\"img-circle\" width=\"300px\" height=\"300px\" />"; 
    }
  } 
  echo "</div>";
} 
catch(Exception $e) {
  echo 'Inga bilder hittades'; 
}

?>   


   
          
        </div>
       
       
          

          
          
       
        </div>
      </div>
    </div>
    



<section id="launch" class="modal hide fade">
  <header class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Här kan du logga in som admin</h3>
  </header>
  <div class="modal-body">
  	<h4>Admin login</h4>
  	
    <form class="navbar-form pull-right" action="login.php" method="POST">
              <input class="span2" type="text" placeholder="Email" name="user">
              <input class="span2" type="password" placeholder="Lösenord" name="pass">
            
              </div>
  <footer class="modal-footer">
              <input type="submit" value="Login" />
            </form>
  
  
  </footer>
</section>


</div>



<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap.min.js"></script>
<script src="jquery.cycle.lite.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#myslides').cycle({
    fit: 1, pause: 1, timeout: 1
  });
});
</script>

</body>
</html>
