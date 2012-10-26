<?php

	require_once("connect.php");

	$myusername = $_POST['user'];
	$mypassword = $_POST['pass'];



	// mysql skydd med stripsclashes

	$myusername = stripcslashes($myusername);
	$mypassword = stripcslashes($mypassword);


	$query = "SELECT * FROM users WHERE Username='$myusername' and Password='$mypassword'";
	$result = mysql_query($query);

	$count = mysql_num_rows($result);

	mysql_close();

	if($count==1){

		//gör en cookie så att folk inte kan logga in med url, och ""F jS - g:i a" gör så att datum skrivs ut rätt, cookie varar 120s 2min

		$seconds = 3 + time();
		setcookie(loggedin, date("F jS - g:i a"), $seconds);
		
			// om de stämmer ladda login_sucsess sidan
		header("location:admin.php");

	}else {

		echo 'Du skrev in fel uppgifter, testa igen. <br>
		 <a href="index.php">Tillbaka</a>';

	}

?>