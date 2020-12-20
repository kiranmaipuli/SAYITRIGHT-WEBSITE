<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<script>
		function businessvalidation()
{	
	var lastname = document.getElementsByName('lastname')[0];
	var email = document.getElementsByName('email')[0];
	var password = document.getElementsByName('password')[0];
	var radiotype = document.getElementsByName('businesstype');

	var errormsg2 = document.getElementById('radioerror');
	var errormsg3 = document.getElementById('lastnamerror');
	var errormsg4 = document.getElementById('emailerror');
	var errormsg5 = document.getElementById('passworderror');

	if(radiotype[0].checked == false && radiotype[1].checked == false)
	{
		errormsg2.innerHTML = "radio buttons are not selected";
		return false;
	}

	else if(lastname.value == "")
	{
		errormsg3.innerHTML = "lastname is empty";
		return false;
	}

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
		var lastname_regex = /^[a-zA-Z]+/;
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/;
		
		if(! lastname_regex.test(lastname.value))
				{
					errormsg.innerHTML = "invalid lastname";
					return false;
	
				}

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

<title>BUSINESS USER</title>
</head>
<body>



	<?php

if(isset($_POST['individual']))
{
	header("location:individual.php");
}

if(isset($_POST['event']))
{
	header("location:event.php");
}

if(isset($_POST['business']))
{
	header("location:business.php");
}




/*-------------------------------------BUSINESS FIELDS VALIDATION ------------------------------------------*/

$err1 = $err2 = $err3 = $err4 = $err5 = $msg = $err = $success = $BusinessType = "";
	include 'connection.php';

	$error = "";	

	if(isset($_POST['send']))
	{
			if(isset($_POST['businesstype']))
			{
				$BusinessType = $_POST['businesstype'];
		
			}
			else
			{
				$BusinessType = null;

			}


		$array_validate = array(

			"businesstype"=>$BusinessType,
			"lastname"=>$_POST['lastname'],
			"email"=>$_POST['email'],
			"password"=>$_POST['password']); /*array to be passed for validation*/


		list($var1,$var2) = validation($array_validate);

	   		if($var1 == 2)
			{
				if($var2 == "businesstype")
				{		
					$err = $var2." is empty";
				}


				if($var2 == "lastname")
				{		
					$err1 = $var2." is empty";
				}

				elseif($var2 == "email")
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
				if($var2 == "lastname")
				{		
					$err1 = $var2." invalid";
				}
				
				elseif($var2 == "email")
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

				if($BusinessType == "university")
				{
					$role = 3;
				}

				elseif($BusinessType == "company")
				{
					$role = 4;	
				}
				
				$pdo1 = connection();
				
				$null = NULL;
				$sql = "insert into signup(role_id,first_name,last_name,workplace,school,email,password,image) values(?,?,?,?,?,?,?,?)";
				$statement = $pdo1->prepare($sql);
				$statement->bindvalue(1,$role);
				$statement->bindvalue(2,"null");
				$statement->bindvalue(3,$_POST['lastname']);
				$statement->bindvalue(4,"null");
				$statement->bindvalue(5,"null");
				$statement->bindvalue(6,$_POST['email']);
				$statement->bindvalue(7,$_POST['password']);
				$statement->bindvalue(8,"null");				
				$return = $statement->execute();
				

				if($return)
				{
					$success = "successfully registered";
				}
				else
				{
					$success = "Registration failed";
				}
			}
 	
	header("Refresh: 5; url = business.php");
	}




?>


	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<<li><a href="Home_page.php">HOME</a></li>
				<li><a href="aboutus.php">ABOUT US</a></li>
				<li><a href="http://kiranmaipuli.uta.cloud/">BLOG</a></li>
				<li><a href="buyfromus.php">PURCHASE</a></li>
				<li><a href="contactus.php">CONTACT</a></li>
				<li><a id="active" href="signup.php">SIGN UP</a></li>
				<li><a href="login.php">LOGIN</a></li>>
				</div>
		</div>

		<div class="aboutusbanner">
					<p id="aboutuspara1">Home &nbsp; &nbsp;&rarr; &nbsp; &nbsp;SIGN UP</p>
				</br>
					<p id="aboutuspara2">SIGN UP</p>
			
		</div>


		<form action="" method="POST">
		<div class="eventcontainer">
		<div class="shadowevent">
			 <div id="selecting">Select the type of user</div>
				<div id="forflexing">
				
				<input id="individualbutton1" class="button" type="submit" name="individual" value="INDIVIDUAL">
				<input id="eventbutton1" class="button" type="submit" name="event" value="EVENT">
  				<input id="businessbutton1" class="button" type="submit" name="business" value="BUSINESS">
  			
  			</div>
  		</form>


  		<form action="" method="POST" onsubmit="return businessvalidation()">
		<div class="formdivision">
			<hr width="95%" size="0.2" color="#EAE9E8">
				<p>Welcome to business records</p>
				<div class="forradiobuttons">
						<span id="businesstype">type of business<span>
						 <input id="radiobutton1" type="radio" name="businesstype" value="university">University
						 <input id="radiobutton2" type="radio" name="businesstype" value="company">Company
				
				</div>
				<span><?php echo $success; ?></span>
				<span id="radioerror"><?php echo $err; ?></span>
				<input id="elementposition" type="text" name="lastname" placeholder="Enter last name"  >
				<span id="lastnamerror"><?php echo $err1; ?></span>
				<input id="elementposition" type="email" name="email" placeholder="Enter email"  >
				<span id="emailerror"><?php echo $err4; ?></span>
				<span id="passworderror"><?php echo $err5; ?></span>
				<input id="elementposition" type="password" name="password" placeholder="Enter password"  >
				
				<input  id="inputbutton3"  class="button" type="submit" name="send" value="SEND">
		</div>	

</form>
		</div>
		</div>

		<div class="final">
		<hr width="80%" size="0.2" color="#777777">
		<p>Copyright &copy2019 All rights reserved | This web is made with &#x2661 by <spam>DiazApps</spam></p>
		</div>
	</div>
</body>
</html>