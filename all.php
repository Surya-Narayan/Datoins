<?php
	if(IsSet($_GET["logged"]))						// if logged
	{
		session_start();
		if(IsSet($_SESSION["username"]))
		{
			echo $_SESSION["username"] . "\n" . $_SESSION["datoin"];
		}
		else
		{
			echo 0;
		}
	}


	if(IsSet($_POST["username"]) && IsSet($_POST["emailID"]))			// signup
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$emailID = $_POST['emailID'];
		$dob = $_POST["dob"];
		$d = mysqli_connect("localhost", "root", "", "webtech");
		$q = "INSERT INTO user_details (username, password, datoin, emailID, dob)
				VALUES ('$username', '$password', 50, '$emailID', '$dob')";
		mysqli_query($d, $q);
		echo mysqli_error($d);
		mysqli_close($d);
	}

	
	if(IsSet($_POST["username"]))					// login
	{
		$username = $_POST["username"];
		$d = mysqli_connect("localhost", "root", "", "webtech");
		$q = "SELECT * from user_details WHERE username = '$username'";
		$result = mysqli_query($d, $q);
		mysqli_close($d);
		echo "<html>
<head>
	<title></title>
	<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='home.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script type='text/javascript' src = 'all.js'></script>
</head>
<body onload='chkLogged();' style='background-color: white' >

	<div id='logo' style='background-color:rgb(255,155,55);margin: 0'>
		<img src='images/logo.png' height= 150px width=480px align = 'middle' />
		
	</div>


	<div id='navigator' align='left' style='background-color:rgb(85,85,85);'>
		<a href='homepage.html'><button class='nav'>Home</button></a>
		<a href='#' id='datasheetlink'><button class='nav' onclick='attachLinks();'>Datasets</button></a>
		<a href='#' id='surveyslink'><button class='nav' onclick='attachLinks();'>Surveys</button></a>
		<button class='nav' onclick = 'openAsk()'>Ask</button></a>
		
		<div style='position: absolute;top:150px;right: 20px'>
		
			<a href='#' class='fa fa-facebook'></a>
			<a href='#' class='fa fa-twitter'></a>
			<a href='#' class='fa fa-google'></a>
			<a href='#' class='fa fa-linkedin'></a>
			<a href='#' class='fa fa-youtube'></a>
			<a href='#' class='fa fa-instagram'></a>
		</div>

	</div>

	
	<br/>
	<br/>
	<div class='form-popup' id='askForm'>
 		<form class='form-container'>
		  	<button type='button' class='btn cancel' onclick='closeAsk()'>&times</button>
		    <h3>Ask Us</h3>
		    <textarea placeholder='type here' name='query' rows = '6' cols = '35' required></textarea>
		    <button type='submit' class='btn'>Submit</button>
	    </form>
	</div>	";
		if(mysqli_num_rows($result) > 0)
		{
			$password = $_POST["password"];
			$row = mysqli_fetch_assoc($result);
			if($_POST["password"] == $row["password"])
			{
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $row["password"];
				$_SESSION["datoin"] = $row["datoin"];
				$_SESSION["emailID"] = $row["emailID"];
				$_SESSION["dob"] = $row["dob"];
				echo " <div align = center><a href='homepage.html'><img src='images/robot.png' height=250px width=500px><br><br/><h1 style = 'font-family: Bookman Old Style;'>I'm not a robot</h1></a></div>";
			}
			else
			{
				echo " <div align = center><h1 style = 'font-family: Bookman Old Style;'>INCORRECT PASSWORD</h1><a href='login.html'><img src='images/wrong.jpg' height=250px width=300px><br><br/><h1 style = 'font-family: Bookman Old Style;'>RETRY LOGIN </h1></a></div>";
			}
		}
		else
		{
			echo " <div align = center><h1 style = 'font-family: Bookman Old Style;'>User does NOT exist</h1><a href='signup.html'><img src='images/sad.png' height=250px width=250px><br><br/><h1 style = 'font-family: Bookman Old Style;'>Wanna Sign Up?</h1></a>
			</div>";
		}
	}


	if(IsSet($_GET["datoin"]))						// on logout
	{
		//echo "here";
		$datoin = $_GET["datoin"];
		session_start();
		if(IsSet($_SESSION["username"]))
		{
			$username = $_SESSION["username"];
			$d = mysqli_connect("localhost", "root", "", "webtech");
			if(!$d)
				echo mysqli_error($d);
			$q = "UPDATE user_details SET datoin = '$datoin' WHERE username = '$username'";
			if(!mysqli_query($d, $q))
			{
				echo(mysqli_error($d));
			}
		}
		unset($_SESSION["username"]);
	}


	if(IsSet($_GET["username"]))						// chk user repeat
	{
		$username = $_GET["username"];
		$d = mysqli_connect("localhost", "root", "", "webtech");
		$q = "SELECT * FROM user_details WHERE username = '$username'";
		$result = mysqli_query($d, $q);
		if(mysqli_num_rows($result) > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}


	if(IsSet($_FILES['dataset']))
	{
		echo $_FILES['dataset']['type'];
		echo "<html>
<head>
	<title></title>
	<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='home.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script type='text/javascript' src = 'all.js'></script>
</head>
<body onload='chkLogged();' >

	<div id='logo' style='background-color:rgb(255,155,55);margin: 0'>
		<img src='images/logo.png' height= 150px width=480px align = 'middle' />
		<div id = 'ui' style = 'position: absolute;top :30px;right:180px'></div>
		<div id = 'un' style = 'position: absolute;top :90px;right:180px'></div>
		<div id = 'ud' style = 'position: absolute;top :0px;right:30px; width: 130px'></div>
		<div style='position: absolute;top: 105px; right: 135px' id='div1'>
			<span id='login'><a href='login.html'><button class='logsign'><b>Login</b></button></a></span>
		</div>
		<div style='position: absolute;top: 105px;right: 10px' id='div2'>
			<span id='signup'><a href='signup.html'><button class='logsign'><b>Sign up</b></button></a></span>
		</div>
	</div>


	<div id='navigator' align='left' style='background-color:rgb(85,85,85);'>
		<a href='homepage.html'><button class='nav'>Home</button></a>
		<a href='#' id='datasheetlink'><button class='nav' onclick='attachLinks();'>Datasets</button></a>
		<a href='#' id='surveyslink'><button class='nav' onclick='attachLinks();'>Surveys</button></a>
		<button class='nav' onclick = 'openAsk()'>Ask</button></a>
		
		<div style='position: absolute;top:150px;right: 20px'>
		
			<a href='#' class='fa fa-facebook'></a>
			<a href='#' class='fa fa-twitter'></a>
			<a href='#' class='fa fa-google'></a>
			<a href='#' class='fa fa-linkedin'></a>
			<a href='#' class='fa fa-youtube'></a>
			<a href='#' class='fa fa-instagram'></a>
		</div>

	</div>

	
	<br/>
	<br/>
	<div class='form-popup' id='askForm'>
 		<form class='form-container'>
		  	<button type='button' class='btn cancel' onclick='closeAsk()'>&times</button>
		    <h3>Ask Us</h3>
		    <textarea placeholder='type here' name='query' rows = '6' cols = '35' required></textarea>
		    <button type='submit' class='btn'>Submit</button>
	    </form>
	</div>	";
		if($_FILES['dataset']['type'] == "text/plain")
		{
			$name = $_FILES['dataset']['name'];
			move_uploaded_file($_FILES['dataset']['tmp_name'], "uploaded_datasets/" . $name);
			session_start();
			$_SESSION["datoin"] += 10;
			
			echo "<h1>Thank you for enriching our ever growing data repository with your dataset.</h1>";
			echo "<h1>Congratulations, you just earned 10 datoins !";
			echo "<a href='homepage.html'> Click here to continue</a>";
		}
		else
		{
			echo "<h1>Please choose a valid file type (.txt files required).";
		}
	}


	if(IsSet($_POST["honest"]))
    {
        $f = fopen("survey_ans.txt", "a");
       	foreach ($_POST as $key => $value)
       	{
            fwrite($f, $key . ":" . $value . "\n");
        }
        fclose($f);
        session_start();
        $_SESSION["datoin"] += 10;
        echo "<html>
<head>
	<title></title>
	<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='home.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script type='text/javascript' src = 'all.js'></script>
</head>
<body onload='chkLogged();' >

	<div id='logo' style='background-color:rgb(255,155,55);margin: 0'>
		<img src='images/logo.png' height= 150px width=480px align = 'middle' />
		<div id = 'ui' style = 'position: absolute;top :30px;right:180px'></div>
		<div id = 'un' style = 'position: absolute;top :90px;right:180px'></div>
		<div id = 'ud' style = 'position: absolute;top :0px;right:30px; width: 130px'></div>
		<div style='position: absolute;top: 105px; right: 135px' id='div1'>
			<span id='login'><a href='login.html'><button class='logsign'><b>Login</b></button></a></span>
		</div>
		<div style='position: absolute;top: 105px;right: 10px' id='div2'>
			<span id='signup'><a href='signup.html'><button class='logsign'><b>Sign up</b></button></a></span>
		</div>
	</div>


	<div id='navigator' align='left' style='background-color:rgb(85,85,85);'>
		<a href='homepage.html'><button class='nav'>Home</button></a>
		<a href='#' id='datasheetlink'><button class='nav' onclick='attachLinks();'>Datasets</button></a>
		<a href='#' id='surveyslink'><button class='nav' onclick='attachLinks();'>Surveys</button></a>
		<button class='nav' onclick = 'openAsk()'>Ask</button></a>
		
		<div style='position: absolute;top:150px;right: 20px'>
		
			<a href='#' class='fa fa-facebook'></a>
			<a href='#' class='fa fa-twitter'></a>
			<a href='#' class='fa fa-google'></a>
			<a href='#' class='fa fa-linkedin'></a>
			<a href='#' class='fa fa-youtube'></a>
			<a href='#' class='fa fa-instagram'></a>
		</div>

	</div>

	
	<br/>
	<br/>
	<div class='form-popup' id='askForm'>
 		<form class='form-container'>
		  	<button type='button' class='btn cancel' onclick='closeAsk()'>&times</button>
		    <h3>Ask Us</h3>
		    <textarea placeholder='type here' name='query' rows = '6' cols = '35' required></textarea>
		    <button type='submit' class='btn'>Submit</button>
	    </form>
	</div>	";
        echo "<h1>Thank you for giving your invaluable opinions to our surveys.</h1>";
		echo "<h1>Congratulations, you just earned 10 datoins !";
		echo "<a href='homepage.html'> Click here to continue</a></h1>";
    }


    if(IsSet($_FILES['survey']))
	{
		$name = $_FILES['survey']['name'];
		move_uploaded_file($_FILES['survey']['tmp_name'], "uploaded_surveys/" . $name);
		session_start();
		$_SESSION["datoin"] -= 10;
		echo "<html>
<head>
	<title></title>
	<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='home.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script type='text/javascript' src = 'all.js'></script>
</head>
<body onload='chkLogged();' >

	<div id='logo' style='background-color:rgb(255,155,55);margin: 0'>
		<img src='images/logo.png' height= 150px width=480px align = 'middle' />
		<div id = 'ui' style = 'position: absolute;top :30px;right:180px'></div>
		<div id = 'un' style = 'position: absolute;top :90px;right:180px'></div>
		<div id = 'ud' style = 'position: absolute;top :0px;right:30px; width: 130px'></div>
		<div style='position: absolute;top: 105px; right: 135px' id='div1'>
			<span id='login'><a href='login.html'><button class='logsign'><b>Login</b></button></a></span>
		</div>
		<div style='position: absolute;top: 105px;right: 10px' id='div2'>
			<span id='signup'><a href='signup.html'><button class='logsign'><b>Sign up</b></button></a></span>
		</div>
	</div>


	<div id='navigator' align='left' style='background-color:rgb(85,85,85);'>
		<a href='homepage.html'><button class='nav'>Home</button></a>
		<a href='#' id='datasheetlink'><button class='nav' onclick='attachLinks();'>Datasets</button></a>
		<a href='#' id='surveyslink'><button class='nav' onclick='attachLinks();'>Surveys</button></a>
		<button class='nav' onclick = 'openAsk()'>Ask</button></a>
		
		<div style='position: absolute;top:150px;right: 20px'>
		
			<a href='#' class='fa fa-facebook'></a>
			<a href='#' class='fa fa-twitter'></a>
			<a href='#' class='fa fa-google'></a>
			<a href='#' class='fa fa-linkedin'></a>
			<a href='#' class='fa fa-youtube'></a>
			<a href='#' class='fa fa-instagram'></a>
		</div>

	</div>

	
	<br/>
	<br/>
	<div class='form-popup' id='askForm'>
 		<form class='form-container'>
		  	<button type='button' class='btn cancel' onclick='closeAsk()'>&times</button>
		    <h3>Ask Us</h3>
		    <textarea placeholder='type here' name='query' rows = '6' cols = '35' required></textarea>
		    <button type='submit' class='btn'>Submit</button>
	    </form>
	</div>	";
		echo "<h1>Thank you for using our services to get your survey answered by our other honest users.</h1>";
		echo "<h1>We have deducted 10 datoins from your account, a tiny fee for our services.";
		echo "<a href='homepage.html'> Click here to continue</a></h1>";
	}


	if(IsSet($_POST["query"]))
	{
		$f = fopen("user_queries.txt", "a");
		fwrite($f, $_POST["query"] . "\n");
		echo "<html>
<head>
	<title></title>
	<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='home.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script type='text/javascript' src = 'all.js'></script>
</head>
<body onload='chkLogged();' >

	<div id='logo' style='background-color:rgb(255,155,55);margin: 0'>
		<img src='images/logo.png' height= 150px width=480px align = 'middle' />
		<div id = 'ui' style = 'position: absolute;top :30px;right:180px'></div>
		<div id = 'un' style = 'position: absolute;top :90px;right:180px'></div>
		<div id = 'ud' style = 'position: absolute;top :0px;right:30px'></div>
		<div style='position: absolute;top: 105px; right: 135px' id='div1'>
			<span id='login'><a href='login.html'><button class='logsign'><b>Login</b></button></a></span>
		</div>
		<div style='position: absolute;top: 105px;right: 10px' id='div2'>
			<span id='signup'><a href='signup.html'><button class='logsign'><b>Sign up</b></button></a></span>
		</div>
	</div>


	<div id='navigator' align='left' style='background-color:rgb(85,85,85);'>
		<a href='homepage.html'><button class='nav'>Home</button></a>
		<a href='#' id='datasheetlink'><button class='nav' onclick='attachLinks();'>Datasets</button></a>
		<a href='#' id='surveyslink'><button class='nav' onclick='attachLinks();'>Surveys</button></a>
		<button class='nav' onclick = 'openAsk()'>Ask</button></a>
		
		<div style='position: absolute;top:150px;right: 20px'>
		
			<a href='#' class='fa fa-facebook'></a>
			<a href='#' class='fa fa-twitter'></a>
			<a href='#' class='fa fa-google'></a>
			<a href='#' class='fa fa-linkedin'></a>
			<a href='#' class='fa fa-youtube'></a>
			<a href='#' class='fa fa-instagram'></a>
		</div>

	</div>

	
	<br/>
	<br/>

	<div class='form-popup' id='askForm'>
 		<form class='form-container'>
		  	<button type='button' class='btn cancel' onclick='closeAsk()'>&times</button>
		    <h3>Ask Us</h3>
		    <textarea placeholder='type here' name='query' rows = '6' cols = '35' required></textarea>
		    <button type='submit' class='btn'>Submit</button>
	    </form>
	</div>	";

	echo "<h1>Thank you for your feedback / query. We will certainly take it into consideration
			to improve our website.";
	echo "<a href='homepage.html'> Click here to continue</a></h1>";
	}

?>
