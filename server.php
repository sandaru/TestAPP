<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection
    $application_ID = $_POST['uid'];
    $result = mysqli_query($connection->myconn,"SELECT * FROM app_state WHERE app_id ='$application_ID' AND state='true'");
    while ($row = mysqli_fetch_array($result))
    {
    	if($row['state']=="true")
    	{
    		echo $row['app_id']." is available ->> ".date("h:i:sa");
    	}
    }
?>