<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width"> 
	<link rel="stylesheet" href="CSS\SayItRight.css">
	<script>
		

	</script>	

<title>BUY FROM US</title>
</head>
<body>

<?php
session_start();
$_SESSION['id'] = 1;


$user="root";
$pass="";
$connectionString = "mysql:host=localhost;dbname=kiranmai_SayItRightWebsite";
$pdo = new PDO($connectionString,$user,$pass);

$id = array();
$arr = array();
$image = array();
$price = array();
$product_name = array();
$desc = array();

$sql = "select * from product";
$result = $pdo->query($sql);
while($row=$result->fetch())
{
	$arr[]=$row['product_id'];
	$image[]=$row['image_url'];
	$price[]=$row['unit_price'];
	$product_name[]=$row['product_name'];
	$desc[]=$row['description'];
	$id[]=$row['product_id'];
}
 


if(isset($_POST['cart']))
{
	if($_POST['idvalue'] == 1)
	{
		$sql10 = "insert into shopping(orders_id,price,image,qunatity,product_id) values(?,?,?,?,?)";
		$statement = $pdo->prepare($sql10);
		$statement->bindvalue(1,1);
		$statement->bindvalue(2,$price[0]);
		$statement->bindvalue(3,$image[0]);
		$statement->bindvalue(4,1);
		$statement->bindvalue(5,1);

		$return = $statement->execute();
		if($return)
		{
			echo "inserted into the table";
		}

		else
		{
			echo "not inserted";
		}

	}



	/*---------------------2nd insert-----------------------*/

	if($_POST['idvalue'] == 2)
	{
		$sql10 = "insert into shopping(price,image,qunatity,product_id) values(?,?,?,?)";
		$statement = $pdo->prepare($sql10);
		$statement->bindvalue(1,$price[1]);
		$statement->bindvalue(2,$image[1]);
		$statement->bindvalue(3,1);
		$statement->bindvalue(4,2);

		$return = $statement->execute();
		if($return)
		{
			echo "inserted into the table";
		}

		else
		{
			echo "not inserted";
		}
	}


	/*------------------------------3rd insert----------------------------*/

	if($_POST['idvalue'] == 3)
	{
		$sql10 = "insert into shopping(price,image,qunatity,product_id) values(?,?,?,?)";
		$statement = $pdo->prepare($sql10);
		$statement->bindvalue(1,$price[2]);
		$statement->bindvalue(2,$image[2]);
		$statement->bindvalue(3,1);
		$statement->bindvalue(4,3);

		$return = $statement->execute();
		if($return)
		{
			echo "inserted into the table";
		}

		else
		{
			echo "not inserted";
		}
	}

	/*------------------------------4th insert--------------------------------*/

	if($_POST['idvalue'] == 4)
	{
		$sql10 = "insert into shopping(price,image,qunatity,product_id) values(?,?,?,?)";
		$statement = $pdo->prepare($sql10);
		$statement->bindvalue(1,$price[3]);
		$statement->bindvalue(2,$image[3]);
		$statement->bindvalue(3,1);
		$statement->bindvalue(4,4);

		$return = $statement->execute();
		if($return)
		{
			echo "inserted into the table";
		}

		else
		{
			echo "not inserted";
		}
	}

	/*---------------------------------------5th insert--------------------*/

	if($_POST['idvalue'] == 5)
	{
		$sql10 = "insert into shopping(price,image,qunatity,product_id) values(?,?,?,?)";
		$statement = $pdo->prepare($sql10);
		$statement->bindvalue(1,$price[4]);
		$statement->bindvalue(2,$image[4]);
		$statement->bindvalue(3,1);
		$statement->bindvalue(4,5);

		$return = $statement->execute();
		if($return)
		{
			echo "inserted into the table";
		}

		else
		{
			echo "not inserted";
		}
	}

	/*--------------------------------------6th insert -----------------------------*/

	if($_POST['idvalue'] == 6)
	{
		$sql10 = "insert into shopping(price,image,qunatity,product_id) values(?,?,?,?)";
		$statement = $pdo->prepare($sql10);
		$statement->bindvalue(1,$price[5]);
		$statement->bindvalue(2,$image[5]);
		$statement->bindvalue(3,1);
		$statement->bindvalue(4,6);

		$return = $statement->execute();
		if($return)
		{
			echo "inserted into the table";
		}

		else
		{
			echo "not inserted";
		}
	}


}

		if(isset($_POST['final']))
		{
			header("location:shoppingcart.php");
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

		<div class="aboutusbanner">
					<p id="aboutuspara1">Home &nbsp; &nbsp;&rarr; &nbsp; &nbsp;Buy From Us</p>
				</br>
					<p id="aboutuspara2">BUY FROM US</p>
			
		</div>

		
		<div class="shopcontainer">
			<div class="shopinnercontainer">
				<h2 id="buyinghead">Buy From Us</h2>
			<div class="rowdivision">
				<div class="columnflex1">

	<form action="" method="POST">				
					<div class="borderclass">

					<?php
						echo '<img id="imagesizing" src="CSS\images\\'.$image[0].'" height="180" width="170">
						<p>'.$price[0].'</p>
						<p>'.$desc[0].'<p>';
					?>
						<input type="hidden" name="idvalue" value="<?php echo $id[0]; ?>">
						<input class="button" type="submit" name="cart" value="ADD TO CART">
					</div>
	</form>

	<form action="" method="POST">
					<div class="borderclass">
						<?php
						echo '<img id="imagesizing" src="CSS\images\\'.$image[1].'" height="180" width="170">
						<p>'.$price[1].'</p>
						<p>'.$desc[1].'<p>';
					?>
						<input type="hidden" name="idvalue" value="<?php echo $id[1]; ?>">
						<input class="button" type="submit" name="cart" value="ADD TO CART">
					</div>
	</form>
	<form action="" method="POST">
					<div class="borderclass">
						<?php
						echo '<img id="imagesizing" src="CSS\images\\'.$image[2].'" height="180" width="170">
						<p>'.$price[2].'</p>
						<p>'.$desc[2].'<p>';
					?>
						<input type="hidden" name="idvalue" value="<?php echo $id[2]; ?>">
						<input class="button" type="submit" name="cart" value="ADD TO CART">
					</div>
	</form>				
				</div>

				<div class="columnflex2">

			<form action="" method="POST">		
					<div class="borderclass">
						<?php
						echo '<img id="imagesizing" src="CSS\images\\'.$image[3].'" height="180" width="170">
						<p>'.$price[3].'</p>
						<p>'.$desc[3].'<p>';
					?>
						<input type="hidden" name="idvalue" value="<?php echo $id[3]; ?>">
						<input class="button" type="submit" name="cart" value="ADD TO CART">
					</div>
			</form>

			<form action="" method="POST">
					<div class="borderclass">
						<?php
						echo '<img id="imagesizing" src="CSS\images\\'.$image[4].'" height="180" width="170">
						<p>'.$price[4].'</p>
						<p>'.$desc[4].'<p>';
					?>
						<input type="hidden" name="idvalue" value="<?php echo $id[4]; ?>">
						<input class="button" type="submit" name="cart" value="ADD TO CART">
					</div>
			</form>

			<form action="" method="POST">
					<div class="borderclass">
						<?php
						echo '<img id="imagesizing" src="CSS\images\\'.$image[5].'" height="180" width="170">
						<p>'.$price[5].'</p>
						<p>'.$desc[5].'<p>';
					?>
						<input type="hidden" name="idvalue" value="<?php echo $id[5]; ?>">
						<input class="button" type="submit" name="cart" value="ADD TO CART">
					</div>
			</form>		
				</div>
			</div>
			</div>
		</div>

</form>

	
<form action="" method="POST">
		<div class="shoppingcart">	
			<div class="aligning" >
				<p id="viewingpara">View shopping cart</p>
				<p id="viewingproducts">You can see the products that you added to your cart</p>
			</div>
			<div class="inputbutton5">
		  		<input class="button" type="submit" name="final" value="SUBMIT">
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