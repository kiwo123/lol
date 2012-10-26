<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Namnlöst dokument</title>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-responsive.css">


<?php

// kollar cookien, ifall den inte är set, om inte skickas man till index

  if(!isset($_COOKIE['loggedin'])){

    header("location:index.php");


  }



?>


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
          <a class="brand" href="boot.php">Min fotosite!</a>
          <div class="btn-group">
  <a class="btn btn-primary" href="#"> Admin</a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="logout.php">Logga ut</a></li>
    <li><a href="#">Byta lösenord</a></li>
    
  </ul>
</div>
        </div>
      </div>
    </div>

    <div class="container">

   
      <div class="hero-unit">
        <h1>Välkommen Admin</h1>
        <p>Här kan du ladda upp nya bilder. 3 till din slideshow, och X antal till din thumbnail</p>
      
      </div>


      <div class="row">

        <div class="span4">

          <p>Här kan du ladda upp en ny bild till slide1 </p>

          <form name="imgUpload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="upload" id="upload" />
<input type="submit" name="x" value="Ladda upp" onClick="return checkExt();" />
</form>

        </div>
        <div class="span4">
                 <p>Här kan du ladda upp en ny bild till slide2 </p>

          <form name="imgUpload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="upload" id="upload" />
<input type="submit" name="r" value="Ladda upp" onClick="return checkExt();" />
</form>

       </div>
        <div class="span4">
                    <p>Här kan du ladda upp en ny bild till slide3 </p>

          <form name="imgUpload" action="" method="post" enctype="multipart/form-data">
<input type="file" name="upload" id="upload" />
<input type="submit" name="p" value="Ladda upp" onClick="return checkExt();" />
</form>

         
        </div>

        <div class="span12">
          <h2>Ladda upp thumbnails, imagepath sparas även i DB.</h2>

          <form action="" method="POST" enctype="multipart/form-data">

       <input type="file" name="file"/><br>
        <input type="submit" name="lol" value="Ladda upp">
</form>

<!-- thumbnail uppladdnig -->

        <?php

//includa connect filen
require_once("connect.php");

// lägger till isset så koden bara körs när ngn trycker på submit

if(isset($_POST['lol'])) {




// skriver en location vart bilderna finns

$loc = "images/";




// kollar om filen är en bild

if($_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/jpg"
  || $_FILES["file"]["type"] == "image/gif"){



// info om bilden sätts in i DB, först separeras filen i 2 delar name och extension, med explode()

$file = explode(".", $_FILES["file"]["name"]);

// echo "$file[0]<br>$file[1]"; användes som test för att se så det funkade

// info om bilden läggs in i DB
mysql_query("INSERT INTO images VALUES ('', '".$file[0]."', '".$file[1]."') ");

// sista id som ska in i DB

 

$id = mysql_insert_id();

//flytta bilden till images mappen
// använder ej original namnet
// namnsätter bilden efter dens databas id för att undvika problem

$newname = "$id.$file[1]";

// lägger även till hela pathen i en variabel

$path = "$loc$newname";

// echo $path; för test

move_uploaded_file($_FILES["file"]["tmp_name"], $path);

// echo "Din bild har laddats upp utan problem. Klicka på linken för att se bilden <a href='$path'>Klicka</a>.";

// eller echo '<img src="'.$path.'">';

}

else{

  echo "Fel filtyp!";
}


}

?>



        


        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Kevin 2012</p>
      </footer>

    </div> <!-- /container -->


    <!-- bild1 -->
<?php

if(isset($_POST['x'])) {
  // get the original filename
  $image = $_FILES['upload']['name'];
 
  // image storing folder, make sure you indicate the right path
  $folder = "bild1/"; 
 
  // image checking if exist or the input field is not empty
  if($image) { 
    // creating a filename
    
      $filename = $folder . $image;
    
  
    // uploading image file to specified folder
    $copied = copy($_FILES['upload']['tmp_name'], $filename); 

     $kiwo = "kiwo.jpg";

    rename($filename, $folder.$kiwo);
 
    // checking if upload succesfull
    if (!$copied) { 
 
      // creating variable for the purpose of checking: 
      // 0-unsuccessfull, 1-successfull
      $ok = 0; 
    } else {
      $ok = 1;
    }
  }
}


    

?>

    <!-- bild2 -->


        <?php

        if(isset($_POST['r'])) {
  // get the original filename
  $image = $_FILES['upload']['name'];
 
  // image storing folder, make sure you indicate the right path
  $folder = "bild2/"; 
 
  // image checking if exist or the input field is not empty
  if($image) { 
    // creating a filename
    
      $filename = $folder . $image;
    
    $kiwo = "kiwo.jpg";

    rename($filename, $folder.$kiwo );
    // uploading image file to specified folder
    $copied = copy($_FILES['upload']['tmp_name'], $filename); 

     $kiwo = "kiwo.jpg";

    rename($filename, $folder.$kiwo);
 
    // checking if upload succesfull
    if (!$copied) { 
 
      // creating variable for the purpose of checking: 
      // 0-unsuccessfull, 1-successfull
      $ok = 0; 
    } else {
      $ok = 1;
    }
  }
}



?>

    <!-- bild3 -->


            <?php

if(isset($_POST['p'])) {
  // get the original filename
  $image = $_FILES['upload']['name'];
 
  // image storing folder, make sure you indicate the right path
  $folder = "bild3/"; 
 
  // image checking if exist or the input field is not empty
  if($image) { 
    // creating a filename
    
      $filename = $folder . $image;
    
    $kiwo = "kiwo.jpg";

    rename($filename, $folder.$kiwo );
    // uploading image file to specified folder
    $copied = copy($_FILES['upload']['tmp_name'], $filename); 

     $kiwo = "kiwo.jpg";

    rename($filename, $folder.$kiwo);
 
    // checking if upload succesfull
    if (!$copied) { 
 
      // creating variable for the purpose of checking: 
      // 0-unsuccessfull, 1-successfull
      $ok = 0; 
    } else {
      $ok = 1;
    }
  }
}



?>

   



<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap.min.js"></script>
<script src="jquery.cycle.lite.js" type="text/javascript"></script>


</body>
</html>
