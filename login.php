<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<script>
		function loginvalidation()
{	
	var email = document.getElementsByName('email')[0];
	var password = document.getElementsByName('password')[0];

	var errormsg4 = document.getElementById('emailerror');
	var errormsg5 = document.getElementById('passworderror');

	else if(email.value == "")
	{
		errormsg4.innerHTML = "email is empty";
		return false;
	}

	else if(password.value == "")
	{
		errormsg5.innerHTML = "password is empty";
		return false;
	}

	else
	{
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/;
		

		if(! mail_regex.test(email.value))
				{
					errormsg4.innerHTML = "invalid email";
					return false;
				}
		
		if(! password_regex.test(password.value))
				{
					errormsg5.innerHTML = "invalid password";
					return false;
				}
						
	}

}



	</script>

<title>login</title>
</head>
<body>


<?php

$err1 = $err2 = $err3 = $err4 = $err5 = $msg = $err = $success = $mail = "";
	include 'connection.php';

	$error = "";	

	if(isset($_POST['send']))
	{
		
		$array_validate = array(

			"email"=>$_POST['email'],
			"password"=>$_POST['password']); /*array to be passed for validation*/

		list($var1,$var2) = validation($array_validate);

	   		if($var1 == 2)
			{

				if($var2 == "email")
				{
					$err4 = $var2." is empty";		
				}

				elseif($var2 == "password")
				{
					$err5 = $var2." is empty";		
				}


			}

			elseif($var1 == 1)
			{
				
				if($var2 == "email")
				{
					$err4 = $var2." invalid";		
				}
				
				elseif($var2 == "password")
				{
					$err5 = $var2." invalid";		
				}
				
			}

			else
			{
				
				$pdo1 = connection();
				$mail = $_POST['email'];


				$sql = "select password,user_id,role_id,email from signup where email='$mail'";
				$result = $pdo1->query($sql);

				while($row=$result->fetch())
				{
					if($row['password'] == $_POST['password'])
					{
						
						session_start();
						$_SESSION['userid'] = $row['user_id'];
						$_SESSION['email'] = $row['email'];


						if($row['role_id'] == 1)
						{
							header("location:indivualuser.php");
						}

						else if($row['role_id'] == 2)
						{
							header("location:eventhome.php");	
						}

						else
						{
							header("location:businesshome.php");		
						}
		
					}		
					else
					{
						echo "login unsuccesful";
					}
				}


			}
 	
	header("Refresh: 5; url = login.php");
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
				<li><a href="signup.php">SIGN UP</a></li>
				<li><a id="active" href="login.php">LOGIN</a></li>
				</div>
		</div>

		<div class="aboutusbanner">
					<p id="aboutuspara1">Home &nbsp; &nbsp;&rarr; &nbsp; &nbsp;LOGIN</p>
				</br>
					<p id="aboutuspara2">LOGIN</p>
			
		</div>
		<form action="" method="POST" onsubmit="return loginvalidation()">
		<div class="logincontainer"> 
			<div class="logininnercontainer">
				<input id="email" type="email" name="email" placeholder="Enter Email" required>
				<span id="emailerror"><?php echo $err4 ?></span>
				<input id="password" type="password" name="password" placeholder="Enter Password" required>
				<span id="passworderror"><?php echo $err5 ?></span>
  				<input id="inputbutton2" class="button" type="submit" name="send" value="SEND">
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