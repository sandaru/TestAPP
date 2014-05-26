<?php
	// MySql connection
    include ('connection.php');

    $connection = new createConnection(); //i created a new object
    $connection->connectToDatabase(); // connected to the database
    $connection->selectDatabase();// closed connection
    //End of MySql Connection

    //Authenticate the application
    $applicationID = $_POST['uid'];
    $result = mysqli_query($connection->myconn,"select uid_code from app_reg");
    while($row = mysqli_fetch_array($result)) 
    	{
    			if(md5($row['uid_code'])==$applicationID)
    			{
    				echo "<t>"."true"."</t>";
    			}
    			else 
    			{
    				echo "<t>"."false"."</t>";
    			}
        }
?>