<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection
    $application_ID =$_POST['uid'];// "65d8ddbf092221e95c78ee1049c8e937";
    //select the paired devices
    $result_from_connections = mysqli_query($connection->myconn,"SELECT connected_app_id from connections where app_id='$application_ID'");
    while ($row = mysqli_fetch_array($result_from_connections ))
    {
            $connected_device = $row['connected_app_id'];
            //check the state of the selected devices
            $result_from_appState = mysqli_query($connection->myconn,"SELECT * FROM app_state WHERE app_id ='$connected_device ' AND state='true'");
            while ($row = mysqli_fetch_array($result_from_appState))
            {
                if($row['state']=="true")//If available
                {
                    //Get the name of the available paired device
                    $result = mysqli_query($connection->myconn,"SELECT machine_name FROM app_stun_data WHERE app_id='$connected_device'");
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<t>".$row['machine_name']." is available ->> ".date("h:i:sa")."</t>";
                    }
                }
            }
    }

?>