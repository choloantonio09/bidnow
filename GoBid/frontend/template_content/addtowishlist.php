<?php 

	include 'connect.php';

	if(isset($_POST['prodidselected']))
	{
		$pid = $_POST['prodidselected'];
		$aid = $_POST['accountselected'];

		$addtows = "INSERT INTO wishlist VALUES ('$pid','aid');";
		mysql_query($addtows);
	}

	

 ?>