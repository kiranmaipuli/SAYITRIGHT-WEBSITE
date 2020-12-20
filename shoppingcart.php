<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<script>
		
		function customer()
		{

		var email = document.getElementsByName('email')[0];
	var firstname = document.getElementsByName('firstname')[0];	
	var lastname = document.getElementsByName('lastname')[0];	
	var address = document.getElementsByName('address')[0];	
	var apartment = document.getElementsByName('address2')[0];
	var city = document.getElementsByName('city')[0];
	var postalcode = document.getElementsByName('Postalcode')[0];

	var errormsg = document.getElementById('lastnamerror');	
	var errormsg1 = document.getElementById('firstnameerror');
	var errormsg2 = document.getElementById('mailerror');
	var errormsg3 = document.getElementById('addresserror');
	var errormsg4 = document.getElementById('apartmenterror');
	var errormsg5 = document.getElementById('cityerror');
	var errormsg6 = document.getElementById('postalcodeerror');
	



	if(email.value == "")
	{
		errormsg.innerHTML = "email is empty";
		return false;
	}

	else if(firstname.value == "")
	{
		errormsg1.innerHTML = "firstname is empty";
		return false;
	}

	else if(lastname.value == "")
	{
		errormsg2.innerHTML = "lastname is empty";
		return false;
	}

	else if(address.value == "")
	{
		errormsg3.innerHTML = "address is empty";
		return false;
	}

	else if(apartment.value == "")
	{
		errormsg4.innerHTML = "apartment is empty";
		return false;
	}

	else if(city.value == "")
	{
		errormsg5.innerHTML = "city is empty";
		return false;
	}

	else if(postalcode.value == "")
	{
		errormsg6.innerHTML = "postalcode is empty";
		return false;
	}


	else
	{
		var firstname_regex = /^[a-zA-Z]+(\s)?[a-zA-Z]*$/;
		var lastname_regex = /^[a-zA-Z]+/;
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var address_regex = /^[a-zA-Z]+((\s)?[a-zA-Z]*)+$/
		var apartment_regex = /^[0-9]+$/;
		var postal_regex = /^[0-9]{5}$/;
		var city_regex = /^[a-zA-Z]{2,}$/

		if(! mail_regex.test(email.value))
				{
					errormsg.innerHTML = "invalid email";
					return false;
	
				}
				
		if(! firstname_regex.test(firstname.value))
				{
					errormsg1.innerHTML = "invalid firstname";
					return false;
				}
		
		if(! lastname_regex.test(lastname.value))
				{
					errormsg2.innerHTML = "invalid lastname";
					return false;
				}

		if(! address_regex.test(address.value))
				{
					errormsg3.innerHTML = "invalid address";
					return false;
				}
		
		if(! apartment_regex.test(apartment.value))
				{
					errormsg4.innerHTML = "invalid apartment";
					return false;
				}
		
		if(! city_regex.test(city.value))
				{
					errormsg5.innerHTML = "invalid city";
					return false;
				}
		
		if(! postal_regex.test(postalcode.value))
				{
					errormsg6.innerHTML = "invalid postalcode";
					return false;
				}
						
	}
		}
	</script>
	
<title>SHOPPING CART</title>
</head>
<body>

<?php

session_start();
$_SESSION['id'] = 1;


$user="kiranmai_root";
$pass="Pkinnu4*";
$connectionString = "mysql:host=localhost;dbname=kiranmai_SayItRightWebsite";
$pdo = new PDO($connectionString,$user,$pass);

$sql11 = "select * from shopping";
$sql13 = $pdo->query($sql11);





$err1 = $err2 = $err3 = $err4 = $err5 = $err6= $msg = $err = $success = "";
	include 'connection.php';

	$error = "";	

	if(isset($_POST['sendmessage']))
	{
		$array_validate = array(


			"email"=>$_POST['email'],
			"firstname"=>$_POST['firstname'],
			"lastname"=>$_POST['lastname'],
			"address"=>$_POST['address'],
			"apartment"=>$_POST['address2'],
			"city"=>$_POST['city'],
			"postalcode"=>$_POST['Postalcode']
		); /*array to be passed for validation*/


		list($var1,$var2) = validation($array_validate);

	   		if($var1 == 2)
			{
				if($var2 == "email")
				{		
					$err = $var2." is empty";
				}
				elseif($var2 == "firstname")
				{
					$err1 = $var2." is empty";	
				}

				elseif($var2 == "lastname")
				{
					$err2 = $var2." is empty";		
				}

				elseif($var2 == "address")
				{
					$err3 = $var2." is empty";		
				}

				elseif($var2 == "apartment")
				{
					$err4 = $var2." is empty";		
				}

				elseif($var2 == "city")
				{
					$err5 = $var2." is empty";		
				}

				elseif($var2 == "apartment")
				{
					$err6 = $var2." is empty";		
				}

			}

			elseif($var1 == 1)
			{
				if($var2 == "email")
				{		
					$err = $var2." invalid";
				}
				elseif($var2 == "first_name")
				{
					$err1 = $var2." invalid";	
				}

				elseif($var2 == "last_name")
				{
					$err2 = $var2." invalid";		
				}
				
				elseif($var2 == "address")
				{
					$err3 = $var2." invalid";		
				}
				
				elseif($var2 == "apartment")
				{
					$err4 = $var2." invalid";		
				}
				
				elseif($var2 == "city")
				{
					$err5 = $var2." invalid";		
				}
				
				elseif($var2 == "postalcode")
				{
					$err6 = $var2." invalid";		
				}
				
			}

			else
			{
				
				$pdo1 = connection();
				$null = NULL;
			
				$sql = "insert into customer(email,first_name,last_name,address,apartment,city,postal_code) values(?,?,?,?,?,?,?)";
				$statement = $pdo1->prepare($sql);
				
				$statement->bindvalue(1,$_POST['email']);
				$statement->bindvalue(2,$_POST['firstname']);
				$statement->bindvalue(3,$_POST['lastname']);
				$statement->bindvalue(4,$_POST['address']);
				$statement->bindvalue(5,$_POST['address2']);
				$statement->bindvalue(6,$_POST['city']);
				$statement->bindvalue(7,$_POST['Postalcode']);				
				$return = $statement->execute();
				if($return)
				{
					$success = "successfully registered";
					$sql1 = "delete from shopping where 1";
					$return2 = $pdo->query($sql1);
					if($return2)
					{
						header("location:buyfromus.php");
					}
					else
					{
						echo "not able to return to buyfromuspage";
					}
				}
				else
				{
					$success = "Registration failed";
				}
					
			}
				
 	
	header("Refresh: 5; url = shoppingcart.php");
	}



?>	
	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a href="Home_page.php">HOME</a></li>
				<li><a href="aboutus.php">ABOUT US</a></li>
				<li><a href="http://kiranmaipuli.uta.cloud/">BLOG</a></li>
				<li><a id="active" href="buyfromus.php">BUY FROM US</a></li>
				<li><a href="contactus.php">CONTACT</a></li>
				<li><a href="signup.php">SIGN UP</a></li>
				<li><a href="login.php">LOGIN</a></li>
				</div>
		</div>

		<div class="cartcontainer">
			<div class="innercart">
				<h1 id="idforbuying">Buy From Us</h1>
				<div class="anotherinnercart">
				<div class="bisecting">

		<form action="" method="POST" onsubmit="return customer()">
				<div class="bisection1">
					<p>Contact information</p>
					<input class="margingofelements" type="email" name="email" placeholder="Enter Email" required><span id="mailerror"><?php echo $err ?></span>
					<p>Shipping address</p>				
					<div>
						<input class="makinginline3" type="text" name="firstname" placeholder="Enter First Name" required>
						<span id="firstnameerror"><?php echo $err1; ?></span>
						<input class="makinginline4" type="text" name="lastname" placeholder="Enter Last Name" required>
						<span id="lastnamerror"><?php echo $err2; ?></span>
					</div>
					<input  class="makingblock margingofelements" type="text" name="address" placeholder="Enter Address" required>
					<span id="addresserror"><?php echo $err3; ?></span>
					<input  class="makingblock margingofelements" type="text" name="address2" placeholder="Enter Apartment,suite, etc" required>
					<span id="apartmenterror"><?php echo $err4; ?></span>
					<input  class="makingblock margingofelements" type="text" name="city" placeholder="Enter City" required>
					<span id="cityerror"><?php echo $err5; ?></span>
					<div>
						<select class="makinginline1" data-placeholder="Choose a Language...">
  							<option value="Afrikanns">Afrikanns</option>
  							<option value="Albanian">Albanian</option>
  							<option value="Arabic">Arabic</option>
  							<option value="Armenian">Armenian</option>
  							<option value="Basque">Basque</option>
  							<option value="Bengali">Bengali</option>
  							<option value="Bulgarian">Bulgarian</option>
  							<option value="Catalan">Catalan</option>
  							<option value="Cambodian">Cambodian</option>
  							<option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
  							<option value="Croation">Croation</option>
  							<option value="Czech">Czech</option>
  							<option value="Danish">Danish</option>
  							<option value="Dutch">Dutch</option>
  							<option value="English">English</option>
  							<option value="Estonian">Estonian</option>
  							<option value="Fiji">Fiji</option>
  							<option value="Finnish">Finnish</option>
  							<option value="French">French</option>
  							<option value="Georgian">Georgian</option>
  							<option value="German">German</option>
  							<option value="Greek">Greek</option>
  							<option value="Gujarati">Gujarati</option>
  							<option value="Hebrew">Hebrew</option>
  							<option value="Hindi">Hindi</option>
  							<option value="Hungarian">Hungarian</option>
  							<option value="Icelandic">Icelandic</option>
  							<option value="Indonesian">Indonesian</option>
  							<option value="Irish">Irish</option>
  							<option value="Italian">Italian</option>
  							<option value="Japanese">Japanese</option>
  							<option value="Javanese">Javanese</option>
  							<option value="Korean">Korean</option>
  							<option value="Latin">Latin</option>
  							<option value="Latvian">Latvian</option>
  							<option value="Lithuanian">Lithuanian</option>
  							<option value="Macedonian">Macedonian</option>
  							<option value="Malay">Malay</option>
  							<option value="Malayalam">Malayalam</option>
  							<option value="Maltese">Maltese</option>
  							<option value="Maori">Maori</option>
  							<option value="Marathi">Marathi</option>
  							<option value="Mongolian">Mongolian</option>
  							<option value="Nepali">Nepali</option>
  							<option value="Norwegian">Norwegian</option>
  							<option value="Persian">Persian</option>
  							<option value="Polish">Polish</option>
  							<option value="Portuguese">Portuguese</option>
  							<option value="Punjabi">Punjabi</option>
  							<option value="Quechua">Quechua</option>
  							<option value="Romanian">Romanian</option>
  							<option value="Russian">Russian</option>
  							<option value="Samoan">Samoan</option>
  							<option value="Serbian">Serbian</option>
  							<option value="Slovak">Slovak</option>
  							<option value="Slovenian">Slovenian</option>
  							<option value="Spanish">Spanish</option>
  							<option value="Swahili">Swahili</option>
  							<option value="Swedish ">Swedish </option>
  							<option value="Tamil">Tamil</option>
  							<option value="Tatar">Tatar</option>
  							<option value="Telugu">Telugu</option>
  							<option value="Thai">Thai</option>
  							<option value="Tibetan">Tibetan</option>
  							<option value="Tonga">Tonga</option>
  							<option value="Turkish">Turkish</option>
  							<option value="Ukranian">Ukranian</option>
  							<option value="Urdu">Urdu</option>
  							<option value="Uzbek">Uzbek</option>
  							<option value="Vietnamese">Vietnamese</option>
  							<option value="Welsh">Welsh</option>
  							<option value="Xhosa">Xhosa</option>
				</select>
					<input class="makinginline2" type="text" name="Postalcode" placeholder="Enter Postal Code" required>
					<span id="postalcodeerror"><?php echo $err6; ?></span>
				</div>
					<input id="inputbutton6" class="button" type="submit" name="sendmessage" value="SEND MESSAGE">
				</div>

			</form>
				<div class="bisection2">
					<table class="tabledesign">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Units</th>
							<th>Price</th>
						</tr>
<?php 


$sum=0;
while($rows=$sql13->fetch())
{

	$sum = $sum + $rows['price'];
	
echo '
						<tr>
							<td><img src="CSS\images\\'.$rows["image"].'" height="50" width="50"></td>
							<td>'.$rows["qunatity"].'</td>
							<td>cup</td>
							<td>$'.$rows["price"].'</td>
						</tr>';

}
?>
					</table>

						<hr width="100%" size="0.2" color="#F6F3EE">				
						<table>
						<tr>
							<th id="onlyfortable">Total</th>
							<th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
							<th id="spacing">USD</th>
							<th id="spacing2"><?php echo "$".$sum; ?></th>
						</tr>	
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

			<div class="final">
		<hr width="80%" size="0.2" color="#777777">
		<p>Copyright &copy2019 All rights reserved | This web is made with &#x2661 by <spam>DiazApps</spam></p>
		</div>
	</div>
</body>
</html>

