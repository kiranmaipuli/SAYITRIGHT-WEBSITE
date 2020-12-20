<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<script>
		function sendingemail()
{
	var mailing = document.getElementsByName('newslettername')[0];	
	var mailregex = /([a-zA-Z0-9]+)@([^\.].+)\.([a-zA-Z]{2,})/;
	var errormsg = document.getElementById('mailing1');
	if(! mailregex.test(mailing.value))
	{
		errormsg.innerHTML = "Invalid email";
		return false;
	}

}


	</script>
<title>Home Page</title>
</head>
<body>

	<?php
	$msg = $err = "";
	include 'connection.php';

	$error = "";	

	if(isset($_POST['subscribe']))
	{
		$array_validate = array("email"=>$_POST['newslettername']);
		list($var1,$var2) = validation($array_validate);
	   	
		if($var2 == "email")
		{
	   		if($var1 == 2)
			{
	
				$err = $var2." is empty";
				
			}

			elseif($var1 == 1)
			{
	
				$err = "invalid email";
				
			}

			else
			{
				$err = "subscribed";
				$pdo1 = connection();
				$sql = "insert into newsletter_subscription(email_address) values(?)";
				$statement = $pdo1->prepare($sql);
				$statement->bindvalue(1,$_POST['newslettername']);
				$return = $statement->execute();
					echo "hello";
					$msg = "Hi, You have been successfully subscribed to SayItRight newsletter";
					mail($_POST['newslettername'],"subscription to SayItRight newsletter",$msg);

				
			}
 
		}
	
	header("Refresh: 5; url = Home_page.php");
	}


	?>

	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a id="active" href="Home_page.php">HOME</a></li>
				<li><a href="aboutus.php">ABOUT US</a></li>
				<li><a href="http://kiranmaipuli.uta.cloud/">BLOG</a></li>
				<li><a href="buyfromus.php">BUY FROM US</a></li>
				<li><a href="contactus.php">CONTACT</a></li>
				<li><a href="signup.php">SIGN UP</a></li>
				<li><a href="login.php">LOGIN</a></li>
				</div>
		</div>
		<div class="video">
				<div id="videodiv">
					<h1>For good </br>communication<br><spam>Say it Right</spam> is</br>a tool that</br>you should use</h1>
					</br>
					<p>You can see our video tutorial of use with just pressing this</br> button.</p>
					</br>
					<img src="CSS\images\video.jpg" height="50" width="50">
					<spam id="forsizing">WATCH THE VIDEO</spam> 
				</div>
		</div>
		<div class="subscription">	
			<div class="forposition forposition1" >
				<p>Subscribe Our Newsletter</p>
				<spam>we won't send any kind of spam</spam>

			</div>

		 	<form class="forform" action="" method="POST" onsubmit="return sendingemail()">

  				<input class="idforinputform" type="email" name="newslettername" placeholder="Enter email address" required>
  				<input class="idforsubmit1" class="button" type="submit" name="subscribe" value="SUBSCRIBE">
  				<span id="mailing1"><?php echo $err; ?></span> 
  				
			</form>

		</div>
		<div class="final">
		<hr width="70%" size="0.2" color="#777777">
		<p>Copyright &copy2019 All rights reserved | This web is made with &#x2661; by <spam>DiazApps</spam></p>
		</div>
	</div>
</body>
</html>