<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	
<title>signup</title>
</head>
<body>

<?php

if(isset($_POST['individual']))
{
	header("location:http://kiranmaipuli.uta.cloud/Sayitright/signup.php/individual.php");
}

if(isset($_POST['event']))
{
	header("location:event.php");
}

if(isset($_POST['business']))
{
	header("location:business.php");
}


?>
	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a href="Home_page.php">HOME</a></li>
				<li><a href="aboutus.php">ABOUT US</a></li>
				<li><a href="http://kiranmaipuli.uta.cloud/">BLOG</a></li>
				<li><a href="buyfromus.php">PURCHASE</a></li>
				<li><a href="contactus.php">CONTACT</a></li>
				<li><a id="active" href="signup.php">SIGN UP</a></li>
				<li><a href="login.php">LOGIN</a></li>
				</div>
		</div>

		<div class="aboutusbanner">
					<p id="aboutuspara1">Home &nbsp; &nbsp;&rarr; &nbsp; &nbsp;SIGN UP</p>
				</br>
					<p id="aboutuspara2">SIGN UP</p>
			
		</div>
		<form action="" method="POST">
		<div class="signupcontainer"> 
			<div class="signupinnercontainer">
				<div id="selecting">Select the type of user</div>
				<div id="forflexing">
				<input id="individualbutton" class="button" type="submit" name="individual" value="INDIVIDUAL">
				<input id="eventbutton" class="button" type="submit" name="event" value="EVENT">
  				<input id="businessbutton" class="button" type="submit" name="business" value="BUSINESS">
			</div>
		</div>
		</div>
		</form>

		<div class="final">
		<hr width="80%" size="0.2" color="#777777">
		<p>Copyright &copy2019 All rights reserved | This web is made with &#x2661 by <spam>DiazApps</spam></p>
		</div>
	</div>
</body>
</html>