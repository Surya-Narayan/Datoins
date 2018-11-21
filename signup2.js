var flagName = 0;
var flagPassStr = 0;
var flagPassEq = 0;
var flagNewUser = 1;

function chkName()
{
	var name = document.getElementById("username").value;
	var pos = name.search(/^[A-Za-z]+\d*$/);
	if(name.length >= 4 && pos > -1)
	{
		message = "User name is valid."
		color = "green";
		flagName = 1;
	}

	else
	{
		message = "User name is not valid."
		color = "red";
		flagName = 0;
	}
	msg = document.getElementById("namemsg");
	msg.style.color = color;
	msg.innerHTML = message;
}

function chkpass()
{
	var password = document.getElementById("pass").value;
	var conpassword = document.getElementById("conpass").value;
	var conpassmsg = document.getElementById("conpassmsg")
	if(password != conpassword)
	{
		msg = "Passwords do not match."
		conpassmsg.style.color = "red"
		flagPassEq = 0;
	}
	else
	{
		msg = "Passwords match."
		conpassmsg.style.color = "green";
		flagPassEq = 1;
	}
	conpassmsg.innerHTML = msg;

}

function measurepass()
{
	password = document.getElementById("pass").value;
	if(password.length < 5)
	{
		message = "Weak";
		color = "red";
		flagPassStr = 0;
	}
	else
	if(password.length >= 8 && password.search(/\d+/) >= 0)
	{
		message = "Strong";
		color = "green";
		flagPassStr = 1;
	}
	else
	{
		message = "Medium";
		color = "orange";
		flagPassStr = 1;
	}
	msg = document.getElementById("passmsg");
	msg.style.color = color;
	msg.innerHTML = message;
}



function verifyForm() {
	chkpass();
	if(flagName == 1 && flagPassStr == 1 && flagPassEq == 1 && flagNewUser == 1)
	{
		submit = document.getElementById("submit");
		submit.type = "submit";
	}
	else
		alert("Please check form." + flagName + flagPassStr + flagPassEq + flagNewUser);
}


function userExists(name) {
			var a = new XMLHttpRequest();
			a.onreadystatechange = function() {
				if(a.readyState == 4 && a.status == 200)
				{
					var flag = a.responseText;
					alert(flag);
					namemsg = document.getElementById("namemsg")
					if(flag == 1)
					{
						namemsg.innerHTML = "Username exists.";
						flagNewUser = 0;
						namemsg.style.color = "red";
					}
					else
					{
						flagNewUser = 1;
					}
				}
			}
			a.open("GET", "all.php?username=" + name);
			a.send(null);
		}