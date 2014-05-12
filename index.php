<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

	$port = $_POST['port'];
	$publicIP = $_POST['ip'];
	$computerName = $_POST['comName'];

	echo $port." ".$publicIP." ".$computerName;


	$connection->closeConnection();//Close Mysql Connection
?>