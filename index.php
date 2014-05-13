<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

	$port = (int)$_POST['port'];
	$publicIP = $_POST['ip'];
	$computerName = $_POST['comName'];
	$application_ID = $_POST['uid'];

	echo $port." ".$publicIP." ".$computerName." ".$application_ID;

	mysqli_query($connection ->myconn,"UPDATE app_stun_data SET ip = '$publicIP',port = $port WHERE app_id='$application_ID'");
	$connection->closeConnection();//Close Mysql Connection
?>