<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

    $uid_code = $_POST['uid'];
    echo $uid_code;
    mysqli_query($connection->myconn,"INSERT INTO app_reg (`id`,`uid_code`) VALUES (null,'$uid_code')");
    $connection->closeConnection();
?>