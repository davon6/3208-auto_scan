<?php

require_once "config.php";//CALL DB

$ticket_id = $_REQUEST["i"];

$last_updated = date("Y/m/d");

 // Prepare an insert statement
 $sql = "UPDATE ticket SET status='completed', last_updated=?  WHERE ticket_id = (?)";
 
 //echo "you got this ".$ticket_id;

  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "si", $param_last_updated,  $param_ticket_id  );
      
      // Set parameters
      $param_last_updated = $last_updated;
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