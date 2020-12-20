<?php

function validation($val)
{

foreach($val as $key=>$value)
{

	if($key=="businesstype")
	{

		if((!isset($value)) || ($value == null))
		{
			
			return array(2,$key);
		}
	}
	
	if($key=="email")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}
		
	if($key=="firstname")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z]+(\s)?[a-zA-Z]*$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}


	if($key=="lastname")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z]+/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

	if($key=="telephone")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/[0-9]{3}[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4}$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

	if($key=="placework")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z0-9]+.$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

	if($key=="school")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z]+(\s)?[a-zA-Z]*$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

	if($key=="password")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

	if($key=="message")
	{	
		if(!((!isset($value)) || ($value != null)))
		{
			return array(2,$key);
		}
	}

if($key=="address")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z]+((\s)?[a-zA-Z]*)+$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

if($key=="apartment")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[0-9]+$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

if($key=="city")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[a-zA-Z]{2,}$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}

if($key=="postalcode")
	{

		if((!isset($value)) || ($value != null))
		{

			if(!preg_match("/^[0-9]{5}$/",$value))
			{
				return array(1,$key);
			}

		}	

		else
		{		
			return array(2,$key);
		}

	}




}

}	
			

function connection()
{
	
	$user="root";
	$pass="password";
	$connectionString = "mysql:host=localhost;dbname=kiranmai_sayitrightwebsite";
	$pdo = new PDO($connectionString,$user,$pass);
	return $pdo;
}



?>