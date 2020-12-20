<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	
<title>Settings</title>
</head>
<body>

	<div class="wrapper">
		<div class="start">
				<img src="CSS\images\logo.jpg" height="50" width="50">
				<div class="onlyforli">
				<li><a href="eventhome.php">HOME</a></li>
				<li><a href="conferencetable.php">CONFERENCES</a></li>
				<li><a href="eventtables.php">EVENTS</a></li>
				<li><a id="active" href="settings1.php">SETTINGS</a></li>
				</div>
		</div>

<?php

	session_start();
	$mail = $_SESSION['email'];
	$id = $_SESSION['userid'] ;
	$x = "";


	include 'connection.php';
	 $pdo1 = connection();
	 $sql = "select first_name,last_name,password,email,image from signup where email='$mail'";
	$result = $pdo1->query($sql);

echo "logged in as ".$_SESSION['email'];
while($row=$result->fetch())
{

echo '
		
		<form action="" method="POST" enctype="multipart/form-data">
		<div class="settingscontainer">
			<div class="innersettings">
			<p>Welcome to your profile</p>				
			<hr width="80%" size="0.2" color="#EAE9E8">
			<div class="flexusage">
				<div>
					<img src="CSS\images\\'.$row["image"].'" height="140" weight="140">
					<input class="forimage" class="button" type="submit" name="changeimage" value="CHANGE IMAGE">
				</div>
				<div class="internaldivision">
				<div>
				<input  id="idfornames" type="text" name="firstname" value="'.$row['first_name'].'" disabled>
				<input  id="idfornames" type="text" name="lastname" value="'.$row['last_name'].'" disabled>
			</div>
				<input id="idforinline" type="email" name="email" value="'.$row['email'].'" disabled>
				<input id="idforinline" type="password" name="password" value="'.$row['password'].'">
				<p>Change Password</p>
				<input  id="inputbutton4" id="idforinline"  class="button" type="submit" name="savechanges" value="SAVE CHANGES">
				</div>
			</div>
			</div>';


		if(isset($_POST['changeimage']))
		{
			echo '<input type="file" name="imageupload">';
			$_SESSION['check'] = 2;
		}
	
echo '
		</div>

		</form>';

				if(isset($_POST['savechanges']))
				{
					$password = $_POST['password'];
					$sql1 = "update signup SET password='".$password."' where user_id=".$id;
			
					if($_SESSION['check'] == 2)
					{

						$filetomove = $_FILES['imageupload']['tmp_name'];
						$destination = "CSS\images\\".$_FILES['imageupload']['name'];
						$filename = $_FILES['imageupload']['name'];

						if(move_uploaded_file($filetomove,$destination))
						{
							echo "image is changed successfully";
							$sql2 = "update signup SET image='".$filename."' where user_id=".$id;	
							$result2 = $pdo1->query($sql2);	
						}
						else
						{
							echo "image is not uploaded";
						}
							$_SESSION['check'] = 1;
					}


					if($password != $row['password'])
					{
						if($password != null)
						{

							if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/",$password))
							{
								$result1 = $pdo1->query($sql1);
								if($result1)
								{
									echo "succesfully updated";
								} 

								else
								{
									echo "not updated";
								}

								header("Refresh: 5; url = settings.php");
							}

							else
							{
								echo "password is invalid";
								header("Refresh: 5; url = settings.php");
							}

						}	

						else
						{		
							echo "password is empty";
						}
							header("Refresh: 5; url = settings.php");
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

