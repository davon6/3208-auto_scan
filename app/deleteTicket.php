<?php
require_once "config.php";//CALL DB

$ticket_id = $_REQUEST["i"];




 // Prepare an insert statement
 $sql = "DELETE FROM ticket WHERE ticket_id = (?)";


 
 echo "you got this ".$ticket_id;


 
   
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_ticket_id);
      
      // Set parameters
      $param_ticket_id = $ticket_id;
      /*$param_title = $title;
      $param_description = $description;
      $param_assign_to =$_POST["assignTo"];
      $param_raised_by = $raised_by;
      $param_priority = $priority;
      $param_category = $_POST["category"];
      $param_due_date = $due_date;
      $param_last_updated = $last_updated;
      $param_created_date = $created_date;
      $param_attached_doc = $attached_doc;*/

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Redirect to welcome page
          header("location: welcome.php");
      } else{
          echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);


// Close connection
mysqli_close($link);

?>