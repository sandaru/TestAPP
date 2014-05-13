<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

    $application_ID = "65d8ddbf092221e95c78ee1049c8e937";//$_POST['uid'];

    $result = mysqli_query($connection->myconn,"SELECT connected_app_id FROM connections WHERE app_id='$application_ID'");
    while ($row = mysqli_fetch_array($result))
    {
    	$data = $row['connected_app_id'];
    	$tempResult = mysqli_query($connection->myconn,"SELECT ip,port FROM app_stun_data WHERE app_id='$data'");
    	while($temprow = mysqli_fetch_array($tempResult))
    	{
    		echo $temprow['ip'].":".$temprow['port'];
    	}
    }

?>