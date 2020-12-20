<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	
<title>conference list</title>
</head>
<body>

	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a href="eventhome.php">HOME</a></li>
				<li><a id="active" href="conferencetable.php">CONFERENCES</a></li>
				<li><a href="eventtables.php">EVENTS</a></li>
				<li><a href="settings1.php">SETTINGS</a></li>
		</div>
	</div>



<?php
session_start();
$err="";
$k=$_SESSION['userid'];


echo "logged in as ".$_SESSION['email'];


	$user="kiranmai_root";
	$pass="Pkinnu4*";
	$connectionString = "mysql:host=localhost;dbname=kiranmai_SayItRightWebsite";
	$pdo = new PDO($connectionString,$user,$pass);

$sql = "select * from event where event_type='conference' and user_id=".$k;
$result = $pdo->query($sql);

echo '
<div class="confercontainer">
	<div class="innerconfercontainer">
		<h1>List of conferences</h1>

		<table>
				<tr>
					<th>conferences</th>
					<th>Description</th>
					<th>Date</th>
					<th>sede</th>
					<th>update</th>
					<th>delete</th>
				</tr>';

echo '<form action="" method="POST">';
$i = 1;

while($row=$result->fetch())
{

	echo '<tr><td><input type="text" size="15" style="border: none; color: grey; font-size: 10px" name="event_name'.$i.'" value="'.$row["event_name"].'" ></td>
			  <td><input type="text" size="67" style="border: none; color: grey; font-size: 10px" rows="2" cols="60" name="description'.$i.'" value="'.$row["description"].'" ></td>
		  <td><input type="text" style="border: none; color: grey; font-size: 10px" size="6" name="date'.$i.'" value="'.$row["date"].'"></td>
		  <td><input type="text" style="border: none; color: grey; font-size: 10px" size="4" name="location'.$i.'" value="'.$row["location"].'"></td>
		  <td><input type="submit" name="update'.$i.'" size="5" value="update"></td>
		  <td><input type="submit" name="delete'.$i.'" size="5" value="delete"></td>
		  <td><input type="hidden" name="hide'.$i.'"  value="'.$row["event_id"].'"></td>
		  		  </tr>';
		  $i++;
};


echo '</form>
</table>
</div>
</div>';


		  if(isset($_POST["add"]))
			{
				$x=$_POST['event_name1'];
				$y=$_POST['description1'];
				$z=$_POST['date1'];
				$u=$_POST['location1'];
				$s=$_POST['event_type1'];

				if($x == null)
				{
					$err="event_name is empty";
				}

				else if($y == null)
				{
					$err="description is empty";
				}

				else if($z == null)
				{
					$err="date is empty";
				}	

				else if($u == null)
				{
					$err="location is empty";
				}

				else if($s == null)
				{
					$err="location is empty";
				}

				else
				{
					if(!preg_match("/^[a-zA-Z]+((\s)?[a-zA-Z]*)+$/",$x))
					{
					$err = "invalid event name";
					}

					else if(!preg_match("/^[a-zA-Z]+((\s)?[a-zA-Z0-9]*)+$/",$y))
					{
						$err = "invalid event description";
					}

					else if(!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$z))
					{
						$err = "invalid date format";
					}

					else if(!preg_match("/^[a-zA-Z]+(\s)?[a-zA-Z]*$/",$u))
					{
						$err = "invalid location";
					}

					else if(!preg_match("/^[a-zA-Z]+$/",$s))
					{
						$err = "invalid event description";
					}


					else
					{
						$sql3 = "insert into event(user_id,event_type,event_name,description,date,location) values(?,?,?,?,?,?)";
						$statement = $pdo->prepare($sql3);
						$statement->bindvalue(1,$k);
						$statement->bindvalue(2,$s);
						$statement->bindvalue(3,$x);
						$statement->bindvalue(4,$y);
						$statement->bindvalue(5,$z);
						$statement->bindvalue(6,$u);
						

						$return = $statement->execute();


						if($return)
						{
							echo "successfully added";
							header("Refresh: 5; url= conferencetable.php");				
						}

						else
						{
							echo "unsuccesful addition";
							header("Refresh: 5; url= conferencetable.php");					
						}
						header("Refresh: 5; url= conferencetable.php");				

					}
				}	
			}

echo $err;

echo "<form method='POST'><input type='text' name='event_name1' placeholder='event name' required>
		  <input type='text' name='description1' placeholder='description' required>
		  <input type='date' name='date1' required>
		  <input type='text' name='location1' placeholder='location' required>
		  <input type='text' name='event_type1' placeholder='event type' required>
		  <input type='submit' name='add' value='add'>
		  </form>";



for($a=1;$a<=$i;$a++)
{

	
	if(isset($_POST['delete'.$a])) //for deletion of the events
	{
		$p=$_POST['hide'.$a];

		$sql6 = "select * from myevent where event_id=".$p;
		$sql7 = $pdo->query($sql6);
		while($rinks=$sql7->fetch())
		{ 
			
			if($rinks['event_id'] == $p)
			{
				$sql8 = "delete from myevent where event_id=".$p;
				$sql9 = $pdo->query($sql8);
				if($sql9)
				{
					$sql3 = "delete from event where event_id=".$p;
					$sql4 = $pdo->query($sql3);
					if($sql4)
					{
						echo "successful deletion";
						header("Refresh: 5; url= conferencetable.php");				
					}					
				}

					else
					{
						echo "unsuccesful deletion";
						header("Refresh: 5; url= conferencetable.php");					
		
					}
			}

		}
			
			
				$sql3 = "delete from event where event_id=".$p;
					$sql4 = $pdo->query($sql3);
					if($sql4)
					{
						echo "successful deletion";
						header("Refresh: 5; url= conferencetable.php");				
					}		


					else
					{
						echo "unsuccesful deletion";
						header("Refresh: 5; url= conferencetable.php");					
		
					}
			
			

	
		

	}


	if(isset($_POST['update'.$a])) //for updation of the events
	{

		$p=$_POST['hide'.$a];
		$x=$_POST['event_name'.$a];
		$y=$_POST['description'.$a];
		$z=$_POST['date'.$a];
		$u=$_POST['location'.$a];

		if($x == null)
		{
			$err="event_name is empty";
		}

			else if($y == null)
			{
				$err="description is empty";
			}

			else if($z == null)
			{
				$err="date is empty";
			}	

			else if($u == null)
			{
				$err="location is empty";
			}
		else
		{
			if(!preg_match("/^[a-zA-Z]+((\s)?[a-zA-Z]*)+$/",$x))
			{
				$err = "invalid event name";
			}

			else if(!preg_match("/^[a-zA-Z]+((\s)?[a-zA-Z0-9]*)+$/",$y))
			{
				$err = "invalid event description";
			}

			else if(!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$z))
			{
				$err = "invalid date format";
			}

			else if(!preg_match("/^[a-zA-Z]+(\s)?[a-zA-Z]*$/",$u))
			{
				$err = "invalid location";
			}

			else
			{
				$sql5="update event set event_name='".$x."',description='".$y."',date='".$z."',location='$u' where event_id=".$p;
				
				$return1=$pdo->query($sql5);
				if($return1)
				{
					echo "succesful updation";
					$sql6 = "select * from myevent where event_id=".$p;
					$sql7 = $pdo->query($sql6);
					while($rinks=$sql7->fetch())
					{ 
			
						if($rinks['event_id'] == $p)
						{

							$sql8 = "update myevent set event_name='".$x."',description='".$y."',date='".$z."',location='$u' where event_id=".$p;
							$sql9 = $pdo->query($sql8);
							if($sql9)
							{
								echo "succesful updation";	
								header("Refresh: 5; url= conferencetable.php");					
							}

								else
								{
									echo "unsuccesful deletion";
									header("Refresh: 5; url= conferencetable.php");					
		
								}
						}

					}

		
				}

				else
				{
					echo "update failed";
				}

				header("Refresh: 5; url= conferencetable.php");				
			}
			echo $err;
			header("Refresh: 5; url= conferencetable.php");				
		}

		header("Refresh: 5; url= conferencetable.php");
		

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