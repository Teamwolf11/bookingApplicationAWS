<?php 
        /* connect to databse */
        $link = mysqli_connect('bookingdb1.ccrr81h9vimc.us-east-1.rds.amazonaws.com', 'admin', 'riyamike', 'bookings',3306);

        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $fName = mysqli_real_escape_string($link, $_REQUEST['fName']);
        $lName = mysqli_real_escape_string($link, $_REQUEST['lName']);
        $email = mysqli_real_escape_string($link, $_REQUEST['email']);
        $time = mysqli_real_escape_string($link, $_REQUEST['time']);

        $sql = "INSERT INTO schedule (fName, lName, email, time) VALUES ('$fName', '$lName', '$email', '$time')";
        if(mysqli_query($link, $sql)){
            echo "Records added successfully.</br>";
            
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        /* close db connection */
        mysqli_close($links);
        
?>
<a class="currentBookings" href="http://192.168.2.12"> View Current Bookings</a>
<a class="currentBookings" href="http://192.168.2.11"> Make another booking</a>
