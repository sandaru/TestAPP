<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

    $uid_code = $_POST['uid'];
    $encrypted_uid_code = md5($uid_code);
    echo $uid_code;
    //Insert new application to the database
    mysqli_query($connection->myconn,"INSERT INTO app_reg (`id`,`uid_code`) VALUES (null,'$uid_code')");
    mysqli_query($connection->myconn,"INSERT INTO app_state(`app_id`,`state`) VALUES ('$encrypted_uid_code','true')");
    mysqli_query($connection->myconn,"INSERT INTO app_stun_data(`app_id`,`machine_name`,`ip`,`port`) VALUES ('$encrypted_uid_code','','',0)");
    $connection->closeConnection();
?>