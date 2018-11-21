<html>
<head>
    <title></title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src = 'all.js'></script>
</head>
<body onload="chkLogged();" >

    <div id="logo" style="background-color:rgb(255,155,55);margin: 0">
        <img src="images/logo.png" height= 150px width=480px align = "middle" />
        <div id = "ui" style = "position: absolute;top :30px;right:180px"></div>
        <div id = "un" style = "position: absolute;top :90px;right:180px"></div>
        <div id = "ud" style = "position: absolute;top :0px;right:30px; width: 130px"></div>
        <div style="position: absolute;top: 105px; right: 135px" id="div1">
            <span id="login"><a href="login.html"><button class="logsign"><b>Login</b></button></a></span>
        </div>
        <div style="position: absolute;top: 105px;right: 10px" id="div2">
            <span id="signup"><a href="signup.html"><button class="logsign"><b>Sign up</b></button></a></span>
        </div>
    </div>


    <div id="navigator" align="left" style="background-color:rgb(85,85,85);">
        <a href="homepage.html"><button class="nav">Home</button></a>
        <a href="#" id="datasheetlink"><button class="nav" onclick="attachLinks();">Datasets</button></a>
        <a href="#" id="surveyslink"><button class="nav" onclick="attachLinks();">Surveys</button></a>
        <button class="nav" onclick = "openAsk()">Ask</button></a>
        
        <div style='position: absolute;top:150px;right: 20px'>
        
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>

    </div>

    
    <br/>
    <br/>

  <div class="form-popup" id="askForm">
    <form class="form-container">
        <button type="button" class="btn cancel" onclick="closeAsk()">&times</button>
        <h3>Ask Us</h3>
        <textarea placeholder="type here" name="query" rows = "6" cols = "35" required></textarea>
        <button type="submit" class="btn">Submit</button>
      </form>
  </div>  

  <div class="column">
    <img src = "images/survey.png" height="80px" width = "80px" align = "left">
        <div class = "hdg"> Surveys </div><br><br>
        <?php
            $i=0;
            $j=0;
            $k=0;
            $f = fopen("survey.txt", "r");
			$data = fread($f, filesize("survey.txt"));
            $data = explode("\n", $data);
            echo "<form method='POST' action='all.php'>";
          	foreach ($data as $question) {
          		$question = explode(":", chop($question));
          		echo "$question[0]<br>";
          		echo "<input type='radio' name='$question[5]' value=1 required>$question[1]<br>";
          		echo "<input type='radio' name='$question[5]' value=2 required>$question[2]<br>";
          		echo "<input type='radio' name='$question[5]' value=3 required>$question[3]<br>";
          		echo "<input type='radio' name='$question[5]' value=4 required>$question[4]<br><br>";
          	}
            echo "<input type='checkbox' name='honest' required> I have been completely honest with my answers.";
          	echo "<input type='submit'/>";
          	echo "</form>";
        ?>
    </div>
    </body>
</html>