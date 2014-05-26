<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

    //Change the application state to false
    mysqli_query($connection ->myconn,"UPDATE app_state SET state= 'false' WHERE app_id = '$application_ID');
?>