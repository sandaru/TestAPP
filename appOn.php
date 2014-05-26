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

	echo "<t>".$port." ".$publicIP." ".$computerName." ".$application_ID."</t>";
	//Update port and public ip
	mysqli_query($connection ->myconn,"UPDATE app_stun_data SET machine_name='$computerName' , ip = '$publicIP',port = $port WHERE app_id='$application_ID'");
	//Change application state to true
	mysqli_query($connection ->myconn,"UPDATE app_state SET state= 'true' WHERE app_id = '$application_ID'");
	$connection->closeConnection();//Close Mysql Connection
?>