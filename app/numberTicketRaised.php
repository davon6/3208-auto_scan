<?php 
// Initialize the session
session_start();
 
// Include config file
require_once "config.php";

$ticketNumber = "";


  // Prepare an insert statement
  $sql = "SELECT COUNT(TICKET_ID) FROM ticket ";
   
  if($stmt = mysqli_prepare($link, $sql)){




// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    // Store result
    mysqli_stmt_store_result($stmt);


    // Check if username exists, if yes then verify password
    if(mysqli_stmt_num_rows($stmt) >= 1){     
      
    
        // Bind result variables
        mysqli_stmt_bind_result($stmt, $ticketNumber);
       

      //  while($stmt->fetch()){ 
        
        if(mysqli_stmt_fetch($stmt)){

   
         
    
              echo $ticketNumber;


          }
        }
    }





      
  }
   
  // Close statement
  mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);


?>