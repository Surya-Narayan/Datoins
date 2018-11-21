<html>
    <head>
        <title>Survey Page</title>
        <link rel="stylesheet" href="surveys.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src = 'surveys.js'></script>
       
        
    </head>
    <body>
        
        <?php
            $i=0;
            $j=0;
            $k=0;
            $f = fopen("survey.txt", "r");
			$data = fread($f, filesize("survey.txt"));
            $data = explode("\n", $data);
        ?>
           <script> function yolo(){
            alert(document.getElementById("loop").innerHTML); 
            <?php $d = $data[$k]; $d = explode(":", $d); echo"$d[$i] <br>"; $i=0;$j=$i; ?>;
            alert(document.getElementById("loop").innerHTML); 
            document.getElementById("loop").innerHTML; 
             yolo() </script>
                <div id="loop">
        <input type="radio" name="<?php echo"$d[$j]";?>" value="<?php $i=$i+1;echo"$d[$i]";?>"> <?php echo"$d[$i]";?> <br>
        <input type="radio" name="<?php echo"$d[$j]";?>" value="<?php $i=$i+1;echo"$d[$i]";?>"> <?php echo"$d[$i]";?> <br>
        <input type="radio" name="<?php echo"$d[$j]";?>" value="<?php $i=$i+1;echo"$d[$i]";?>"> <?php echo"$d[$i]";?> <br>
        <input type="radio" name="<?php echo"$d[$j]";?>" value="<?php $i=$i+1;echo"$d[$i]";?>"> <?php echo"$d[$i]";?> <br>
        <?php $k=$k+1 ?>
        
        <input type="button" name="next" value="next" onclick="yolo()">
        
        <!--< ?php $k=$k+1;$d = $data[$k];echo"$d";$d = explode(":", $d);echo"$d"; $i=0?> -->
        </div>
        </div>