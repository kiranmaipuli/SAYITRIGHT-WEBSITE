<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
<title>Individual users</title>
</head>
<body>

<?php

session_start();

$event = array();
$conference = array();

$_SESSION['userid'];
$k=$_SESSION['userid'];
$_SESSION['email'];
$user="kiranmai_root";
$pass="Pkinnu4*";
$connectionString = "mysql:host=localhost;dbname=kiranmai_SayItRightWebsite";
$pdo = new PDO($connectionString,$user,$pass);
$sql = "select count(*) as total from myevent where user_id=".$k;
$sql2 = "select count(*) as total1 from myevent where event_type='event' and user_id=".$k;
$sql3 = "select count(*) as total2 from myevent where event_type='conference' and user_id=".$k;
$result = $pdo->query($sql);
$result1 = $pdo->query($sql2);
$result2 = $pdo->query($sql3);
$row=$result->fetch();
$row1=$result1->fetch();
$row2=$result2->fetch();
$x=$row['total'];
$y=$row1['total1'];
$z=$row2['total2'];


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
				<li><a id="active" href="indivualuser.html">HOME</a></li>
				<li><a href="conferences.php">CONFERENCES</a></li>
				<li><a href="eventslist.php">EVENTS</a></li>
				<li><a href="myconferences.php">MY CONFERENCES</a></li>
				<li><a href="myevents.php">MY EVENTS</a></li>
				<li><a href="settings.php">SETTINGS</a></li>
				</div>
		</div>

<div><?php echo "logged in as ".$_SESSION['email']; ?> </div>

<form action="" method="POST">
<input type="submit" name="logout" value="logout">
</form>


<div class="usercontainer">
	<div class="userinnercontainer">
		<div class="rows">
			<div class="row1">
				<div class="firstrow1 borderGrey">
					<div class="firstrow1a">
							<i class="fas fa-globe-americas fa-3x"></i>
							<div class="innericon">
								<p id="number"><?php echo $x; ?></p>
								<p id="number1">activities performed</p>
							</div>

					</div>
					
					<div class="downtext">
						Total Made
					</div>
				</div>
				<div class="firstrow2 borderGrey">
					<div class="firstrow1b">
							<i class="fas fa-users fa-3x"></i>
							<div class="innericon">
								<p id="number"><?php echo $z; ?></p>
								<p id="number1">Acitivities performed</p>
							</div>

					</div>
					
					<div class="downtext">
						Conferences
					</div>
				</div>

				<div class="firstrow3 borderGrey">
					
					<div class="firstrow1c">
							<i class="fas fa-star fa-3x"></i>
							<div class="innericon">
								<p id="number"><?php echo $y; ?> </p>
								<p id="number1">activities performed</p>
							</div>

					</div>
					<div class="downtext">
						Events
					</div>
				</div>
				<div class="firstrow4 borderGrey">
					
					<div class="firstrow1d">
							<i class="fas fa-trophy fa-3x"></i>
							<div class="innericon">
								<p id="number">14</p>
								<p id="number1">activities performed</p>
							</div>

					</div>
					
					<div class="downtext">
						activities
					</div>
				</div>
			</div>
			<div class="row2">
				<div class="secondrow1">';

					<p id="name">Header</p>
					<hr width="100%" size="0.1" color="#aaaaaa">
					<p id="forparaspace">Primary card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the cards content.</p>



				</div>
				<div class="secondrow2">
					<p id="name">Header</p>
					<hr width="100%" size="0.05" color="#aaaaaa">
					<p id="forparaspace">Secondary card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<div class="secondrow3">
					<p id="name">Header</p>
					<hr width="100%" size="0.1" color="#aaaaaa">
					<p id="forparaspace">success card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<div class="secondrow4">
					<p id="name">Header</p>
					<hr width="100%" size="0.1" color="#aaaaaa">
					<p id="forparaspace">success card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
			<div class="row3">
				<div class="thirdrow1">
					<p id="name">Header</p>
					<hr width="100%" size="0.1" color="#aaaaaa">
					<p id="forparaspace">Wrning card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<div class="thirdrow2">
					<p id="name">Header</p>
					<hr width="100%" size="0.1" color="#aaaaaa">
					<p id="forparaspace">Info card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<div class="thirdrow3 borderGrey">
					<p id="name" class="black">Header</p>
					<hr width="100%" size="0.1" color="#aaaaaa">
					<p class="black" id="forparaspace">Light card title</p>
					<p class="black" id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
				<div class="thirdrow4">
					<p id="name">Header</p>
					<hr width="100%" size="0.1" color="black">
					<p id="forparaspace">Dark card title</p>
					<p id="belowpara">some quick example text to build on the card title and make up the bulk of the card's content.</p>
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


	