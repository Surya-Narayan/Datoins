
<?php 
	$username = "avinash";
	$datoin = 1000;
			$d = mysqli_connect("localhost", "root", "", "webtech");
			if(!$d)
				echo mysqli_error($d);
			$q = "UPDATE user_details SET datoin = '$datoin' WHERE username = '$username'";
			if(!mysqli_query($d, $q))
			{
				echo(mysqli_error($d));
			}
	?>