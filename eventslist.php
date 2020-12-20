<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	
<title>Events list</title>
</head>
<body>

	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a href="indivualuser.php">HOME</a></li>
				<li><a href="conferences.php">CONFERENCES</a></li>
				<li><a id="active" href="eventslist.php">EVENTS</a></li>
				<li><a href="myconferences.php">MY CONFERENCES</a></li>
				<li><a href="myevents.php">MY EVENTS</a></li>
				<li><a href="settings.php">SETTINGS</a></li>
				</div>
		</div>



<?php

session_start();
echo "logged in as ".$_SESSION['email'];
$k=$_SESSION['userid'];
	$user="kiranmai_root";
	$pass="Pkinnu4*";
	$connectionString = "mysql:host=localhost;dbname=kiranmai_SayItRightWebsite";
	$pdo = new PDO($connectionString,$user,$pass);

$sql = "select * from event where event_type='event'";
$result = $pdo->query($sql);


echo '
<div class="confercontainer">
	<div class="innerconfercontainer">
		<h1>List of Events</h1>

		<table>
				<tr>
					<th>conferences</th>
					<th>Description</th>
					<th>Date</th>
					<th>sede</th>
					<th>Confirmation</th>
				</tr>';

echo '<form action="" method="POST">';
$i = 1;

while($row=$result->fetch())
{

	echo '<tr><td><input type="text" size="15" style="border: none; color: grey; font-size: 10px" name="event_name'.$i.'" value="'.$row["event_name"].'" ></td>
			  <td><input type="text" size="75" style="border: none; color: grey; font-size: 10px" rows="2" cols="60" name="description'.$i.'" value="'.$row["description"].'" ></td>
		  <td><input type="text" style="border: none; color: grey; font-size: 10px" size="6" name="date'.$i.'" value="'.$row["date"].'"></td>
		  <td><input type="text" style="border: none; color: grey; font-size: 10px" size="4" name="location'.$i.'" value="'.$row["location"].'"></td>
		  <td><input type="submit" name="add'.$i.'" size="5" value="add"></td>
		  <td><input type="hidden" name="hide'.$i.'"  value="'.$row["event_id"].'"></td>
		  </tr>';
		  $i++;
};


echo '</form>
</table>
</div>
</div>';

for($a=1;$a<=$i;$a++)
{
	 if(isset($_POST['add'.$a]))
	{

	$x=$_POST['hide'.$a];
	$y=$_POST['event_name'.$a];
	$z=$_POST['description'.$a];
	$i=$_POST['date'.$a];
	$j=$_POST['location'.$a];
	
	

		$sql3 = "insert into myevent(user_id,event_id,event_type,event_name,description,date,location) values(?,?,?,?,?,?,?)";
		$statement = $pdo->prepare($sql3);
		$statement->bindvalue(1,$k);
		$statement->bindvalue(2,$x);
		$statement->bindvalue(3,"event");
		$statement->bindvalue(4,$y);
		$statement->bindvalue(5,$z);
		$statement->bindvalue(6,$i);
		$statement->bindvalue(7,$j);

		$return = $statement->execute();


		if($return)
		{
			echo "addition";

		}

		else
		{
			echo "unsuccesful addition";
			header("Refresh: 5; url= eventslist.php");					
		}


	}

}




?>

		<div class="final">
		<hr width="80%" size="0.2" color="#777777">
		<p>Copyright &copy2019 All rights reserved | This web is made with &#x2661 by <spam>DiazApps</spam></p>
		</div>
	</div>
</body>
</html>