<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	
<title>Event user</title>
</head>
<body>

	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a id="active" href="eventhome.php">HOME</a></li>
				<li><a href="conferencetable.php">CONFERENCES</a></li>
				<li><a href="eventtables.php">EVENTS</a></li>
				<li><a href="settings1.php">SETTINGS</a></li>
				</div>
		</div>

<div class="usercontainer1">
	<div class="userinnercontainer1">
		<div class="rows">
			<div class="row1">
				<div class="firstrow1 borderGrey">
					<div class="firstrow1a">
							

							<div class="innericon">
								<p id="number"><?php echo $x; ?></p>
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
								<p id="number"><?php echo $z; ?></p>
								<p id="number1">No of conferences</p>
							</div>

					</div>
					
					<div class="downtext">
						Conferences
					</div>
				</div>

				<div class="firstrow3 borderGrey">
					
					<div class="firstrow1c">
							
							<div class="innericon">
								<p id="number"><?php echo $y; ?></p>
								<p id="number1">No of events</p>
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
