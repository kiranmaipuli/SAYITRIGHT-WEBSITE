<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
<title>Business users</title>
</head>
<body>
<?php

session_start();
$_SESSION['userid'];
$k=$_SESSION['userid'];
$_SESSION['email'];
$user="kiranmai_root";
$pass="Pkinnu4*";
$connectionString = "mysql:host=localhost;dbname=kiranmai_SayItRightWebsite";
$pdo = new PDO($connectionString,$user,$pass);

if(isset($_POST['logout']))
{
	session_destroy();
	echo "you have been logged out";
	echo $_SESSION['email'];
	header("Refresh: 2;url=login.php");
}

?>
	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a id="active" href="businesshome.php">HOME</a></li>
				<li><a href="university.php">UNIVERSITY</a></li>
				<li><a href="company.php">COMPANY</a></li>
				<li><a href="settings2.php">SETTINGS</a></li>
				</div>
		</div>
<?php echo "logged in as ".$_SESSION['email']; ?>


<form action="" method="POST">
<input type="submit" name="logout" value="logout">
</form>

<div class="usercontainer1">
	<div class="userinnercontainer1">
		<div class="rows">
			<div class="row1">
				<div class="firstrow1 borderGrey">
					<div class="firstrow1a">
							
							<div class="innericon">
								<p id="number">26</p>
								<p id="number1">Events and conferences</p>
							</div>

					</div>
					
					<div class="downtext">
						Total Made
					</div>
				</div>
				<div class="firstrow2 borderGrey">
					<div class="firstrow1b">
							
							<div class="innericon">
								<p id="number">18</p>
								<p id="number1">No of events</p>
							</div>

					</div>
					
					<div class="downtext">
						Conferences
					</div>
				</div>

				<div class="firstrow3 borderGrey">
					
					<div class="firstrow1c">
							
							<div class="innericon">
								<p id="number">8</p>
								<p id="number1">No of conferences</p>
							</div>

					</div>
					<div class="downtext">
						Events
					</div>
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
