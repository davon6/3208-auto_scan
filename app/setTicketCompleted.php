<?php

require_once "config.php";//CALL DB

$ticket_id = $_REQUEST["i"];

//$answer = $_REQUEST["a"];

 // Prepare an insert statement
 $sql = "UPDATE ticket SET status='completed'  WHERE ticket_id = (?)";
 
 //echo "you got this ".$ticket_id;

  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_ticket_id  );
      
      // Set parameters
      $param_ticket_id = $ticket_id;
  
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Redirect to welcome page
        //  header("location: welcome.php");
      } else{
          echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);

?>