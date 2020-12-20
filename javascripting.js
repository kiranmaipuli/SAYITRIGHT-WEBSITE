
function sendingemail()
{
	var mailing = document.getElementsByName('newslettername')[0];	
	var mailregex = /([a-zA-Z0-9]+)@([^\.].+)\.([a-zA-Z]{2,})/;
	var errormsg = document.getElementById('mailing1');
	if(! mailregex.test(mailing.value))
	{
		errormsg.innerHTML = "Invalid email";
		return false;
	}

}



/*---------------------------------CONTACT FIELD VALIDATION-------------------------------------*/


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


/*-------------------------------------END OF CONTACT FIELDs VALIDATION--------------------------------*/


function individual()
{
	var firstname = document.getElementsByName('firstname')[0];	
	var lastname = document.getElementsByName('lastname')[0];	
	var placework = document.getElementsByName('placework')[0];	
	var school = document.getElementsByName('school')[0];
	var email = document.getElementsByName('email')[0];
	var password = document.getElementsByName('password')[0];


	var errormsg = document.getElementById('lastnamerror');	
	var errormsg1 = document.getElementById('firstnameerror');
	var errormsg2 = document.getElementById('placeworkerror');
	var errormsg3 = document.getElementById('schoolerror');
	var errormsg4 = document.getElementById('emailerror');
	var errormsg5 = document.getElementById('passworderror');
	



	if(lastname.value == "")
	{
		errormsg.innerHTML = "lastname is empty";
		return false;
	}

	else if(firstname.value == "")
	{
		errormsg1.innerHTML = "firstname is empty";
		return false;
	}

	else if(placework.value == "")
	{
		errormsg2.innerHTML = "placework is empty";
		return false;
	}

	else if(school.value == "")
	{
		errormsg3.innerHTML = "school is empty";
		return false;
	}

	else if(email.value == "")
	{
		errormsg4.innerHTML = "email is empty";
		return false;
	}

	else if(password.value == "")
	{
		errormsg5.innerHTML = "password is empty";
		return false;
	}

	else
	{
		var firstname_regex = /^[a-zA-Z]+(\s)?[a-zA-Z]*$/;
		var lastname_regex = /^[a-zA-Z]+/;
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var placework_regex = /^[a-zA-Z]+(\s)?[a-zA-Z]*$/; ;
		var school_regex = /^[a-zA-Z]+(\s)?[a-zA-Z]*$/;
		var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/;

		if(! lastname_regex.test(lastname.value))
				{
					errormsg.innerHTML = "invalid lastname";
					return false;
	
				}
				
		if(! firstname_regex.test(firstname.value))
				{
					errormsg1.innerHTML = "invalid lastname";
					return false;
				}
		
		if(! placework_regex.test(placework.value))
				{
					errormsg2.innerHTML = "invalid placework";
					return false;
				}

		if(! school_regex.test(school.value))
				{
					errormsg3.innerHTML = "invalid school";
					return false;
				}
		
		if(! mail_regex.test(email.value))
				{
					errormsg4.innerHTML = "invalid email";
					return false;
				}
		
		if(! password_regex.test(password.value))
				{
					errormsg5.innerHTML = "invalid password";
					return false;
				}
						
	}
}



/*-------------------------------------END OF INDIVIDUAL FIELDs VALIDATION--------------------------------*/



function eventuser()
{
	var firstname = document.getElementsByName('firstname')[0];	
	var lastname = document.getElementsByName('lastname')[0];	
	var email = document.getElementsByName('email')[0];
	var password = document.getElementsByName('password')[0];


	var errormsg = document.getElementById('lastnamerror');	
	var errormsg1 = document.getElementById('firstnameerror');
	var errormsg4 = document.getElementById('emailerror');
	var errormsg5 = document.getElementById('passworderror');
	



	if(lastname.value == "")
	{
		errormsg.innerHTML = "lastname is empty";
		return false;
	}

	else if(firstname.value == "")
	{
		errormsg1.innerHTML = "firstname is empty";
		return false;
	}

	else if(email.value == "")
	{
		errormsg4.innerHTML = "email is empty";
		return false;
	}

	else if(password.value == "")
	{
		errormsg5.innerHTML = "password is empty";
		return false;
	}

	else
	{
		var firstname_regex = /^[a-zA-Z]+(\s)?[a-zA-Z]*$/;
		var lastname_regex = /^[a-zA-Z]+/;
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/;

		if(! lastname_regex.test(lastname.value))
				{
					errormsg.innerHTML = "invalid lastname";
					return false;
	
				}
				
		if(! firstname_regex.test(firstname.value))
				{
					errormsg1.innerHTML = "invalid lastname";
					return false;
				}
		
		
		if(! mail_regex.test(email.value))
				{
					errormsg4.innerHTML = "invalid email";
					return false;
				}
		
		if(! password_regex.test(password.value))
				{
					errormsg5.innerHTML = "invalid password";
					return false;
				}
						
	}
}

/*------------------------------------------------BUSINESS VALIDATIONS------------------------------------*/


function businessvalidation()
{	
	var lastname = document.getElementsByName('lastname')[0];
	var email = document.getElementsByName('email')[0];
	var password = document.getElementsByName('password')[0];
	var radiotype = document.getElementsByName('businesstype');

	var errormsg2 = document.getElementById('radioerror');
	var errormsg3 = document.getElementById('lastnamerror');
	var errormsg4 = document.getElementById('emailerror');
	var errormsg5 = document.getElementById('passworderror');

	if(radiotype[0].checked == false && radiotype[1].checked == false)
	{
		errormsg2.innerHTML = "radio buttons are not selected";
		return false;
	}

	else if(lastname.value == "")
	{
		errormsg3.innerHTML = "lastname is empty";
		return false;
	}

	else if(email.value == "")
	{
		errormsg4.innerHTML = "email is empty";
		return false;
	}

	else if(password.value == "")
	{
		errormsg5.innerHTML = "password is empty";
		return false;
	}

	else
	{
		var lastname_regex = /^[a-zA-Z]+/;
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/;
		
		if(! lastname_regex.test(lastname.value))
				{
					errormsg.innerHTML = "invalid lastname";
					return false;
	
				}

		if(! mail_regex.test(email.value))
				{
					errormsg4.innerHTML = "invalid email";
					return false;
				}
		
		if(! password_regex.test(password.value))
				{
					errormsg5.innerHTML = "invalid password";
					return false;
				}
						
	}

}




/*----------------------------------------------LOGIN VALIDATION----------------------------------*/


function loginvalidation()
{	
	var email = document.getElementsByName('email')[0];
	var password = document.getElementsByName('password')[0];

	var errormsg4 = document.getElementById('emailerror');
	var errormsg5 = document.getElementById('passworderror');

	else if(email.value == "")
	{
		errormsg4.innerHTML = "email is empty";
		return false;
	}

	else if(password.value == "")
	{
		errormsg5.innerHTML = "password is empty";
		return false;
	}

	else
	{
		var mail_regex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{3,}$/;
		var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W])[A-Za-z\d\W]{8,}$/;
		

		if(! mail_regex.test(email.value))
				{
					errormsg4.innerHTML = "invalid email";
					return false;
				}
		
		if(! password_regex.test(password.value))
				{
					errormsg5.innerHTML = "invalid password";
					return false;
				}
						
	}

}



/*---------------------------------SETTINGS PASSWORD----------------------------------------------*/



function popping()
{
	alert("this is a popup");

}



/*---------------------------------customer field validation-----------------------------------------*/


function customer()
{
	alert("welcome");
	return 0;
}