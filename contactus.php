<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<script>
		function contactvalidation()
{
	var firstname = document.getElementsByName('firstname')[0];	
	var lastname = document.getElementsByName('lastname')[0];	
	var telephone = document.getElementsByName('telephone')[0];	
	var message = document.getElementsByName('message')[0];
	var errormsg = document.getElementById('firstnameerror');	
	var errormsg1 = document.getElementById('lastnameerror');
	var errormsg2 = document.getElementById('numbererror');
	var errormsg3 = document.getElementById('messagerror');
	



	if(firstname.value == "")
	{
		errormsg.innerHTML = "firstname is empty";
		return false;
	}

	else if(lastname.value == "")
	{
		errormsg1.innerHTML = "lastname is empty";
		return false;
	}

	else if(telephone.value == "")
	{
		errormsg2.innerHTML = "phone number is empty";
		return false;
	}

	else if(message.value == "")
	{
		errormsg3.innerHTML = "message field is empty";
		return false;
	}

	else
	{
		var firstname_regex = /^[a-zA-Z]+(\s)?[a-zA-Z]*$/;
		var lastname_regex = /^[a-zA-Z]+/;
		var telephone_regex = /[0-9]{3}[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4}$/;

		if(! firstname_regex.test(firstname.value))
				{
					errormsg.innerHTML = "invalid firstname";
					return false;
	
				}
				
		if(! lastname_regex.test(lastname.value))
				{
					errormsg1.innerHTML = "invalid lastname";
					return false;
				}
		
		if(! telephone_regex.test(telephone.value))
				{
					errormsg2.innerHTML = "invalid phone number";
					return false;
				}
						
	}
}


		
	</script>
<title>contact us</title>
</head>
<body>

<?php

$err1 = $err2 = $err3 = $msg = $err = $msg1 = "";
	include 'connection.php';

	$error = "";	

	if(isset($_POST['sendmessage']))
	{
		
		$array_validate = array("firstname"=>$_POST['firstname'],"lastname"=>$_POST['lastname'],"telephone"=>$_POST['telephone'],"message"=>$_POST['message']);
		
		list($var1,$var2) = validation($array_validate);

	   		if($var1 == 2)
			{
				if($var2 == "firstname")
				{		
					$err = $var2." is empty";
				}
				elseif($var2 == "lastname")
				{
					$err1 = $var2." is empty";	
				}

				elseif($var2 == "telephone")
				{
					$err2 = $var2." is empty";		
				}

				elseif($var2 == "message")
				{
					$err3 = $var2." is empty";		
				}

			}

			elseif($var1 == 1)
			{
				if($var2 == "firstname")
				{		
					$err = $var2." invalid";
				}
				elseif($var2 == "lastname")
				{
					$err1 = $var2." invalid";	
				}

				elseif($var2 == "telephone")
				{
					$err2 = $var2." invalid";		
				}
				
			}

			else
			{
				
				$pdo1 = connection();

				$sql = "insert into contact(first_name,last_name,telephone,message) values(?,?,?,?)";
				$statement = $pdo1->prepare($sql);
				$statement->bindvalue(1,$_POST['firstname']);
				$statement->bindvalue(2,$_POST['lastname']);
				$statement->bindvalue(3,$_POST['telephone']);
				$statement->bindvalue(4,$_POST['message']);
				$return = $statement->execute();

				if($return)
				{
					$msg1 = "message is sent successfully";
				}
			}
 
		
	
	
	header("Refresh: 5; url = contactus.php");
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
				<li><a id="active" href="contactus.php">CONTACT</a></li>
				<li><a href="signup.php">SIGN UP</a></li>
				<li><a href="login.php">LOGIN</a></li>
				</div>
		</div>
	

		<div class="aboutusbanner">
					<p id="aboutuspara1">Home &nbsp; &nbsp;&rarr; &nbsp; &nbsp;CONTACT</p>
				</br>
					<p id="aboutuspara2">CONTACT US</p>
			
		</div>

		<span><!--?php echo $msg1 ?--></span>

		<form action="" method="POST" onsubmit="return contactvalidation()">
		<div class="contactusform"> 
			<div class="contactinnerbox">
			
				<div class="forforms">

				<input  id="idforhens" type="text" name="firstname" placeholder="Enter your name"   >
				<span id="firstnameerror"><!--?php echo $err; ?--></span>
				<input  id="idforhens" type="text" name="lastname" placeholder="Enter Last Name"   >
				<div id="lastnameerror"><!--?php echo $err1; ?--></div>
				<input  id="idforhens" type="text" name="telephone" placeholder="Telephone"   >
				<span id="numbererror"><!--?php echo $err2; ?--></span>
				</div>
				<div class="formmessage">
  				<textarea cols="40" rows="4" name="message" placeholder="Enter Message"   ></textarea>
  				<span id="messagerror"><!--?php echo $err3; ?--></span>
  				<input id="inputbutton" class="button" type="submit" name="sendmessage" value="SEND MESSAGE">
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
