<?php 

// Initialize the session
session_start();
 
// Include config file
require_once "config.php";

$title= $_REQUEST["t"];
$message = $_SESSION["username"]." : ".$_REQUEST["m"];
$category = $_REQUEST["c"];

$status = "pending";
$assign_to =  "Mike";
$username = $_SESSION["username"];

$priority = "Normal";

$due_date = date("Y/m/d");
$last_updated = date("Y/m/d");
$created_date = date("Y/m/d");
$attached_doc = 0;

$usertype =$_SESSION["userType"];

  // Prepare an insert statement
  $sql = "INSERT INTO ticket (status, title, message, assign_to, username , priority, category, due_date,
 last_updated, created_date, attached_doc ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
   
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssssssi", $param_status, $param_title,$param_message, $param_assign_to, $param_username	,
      $param_priority, $param_category, $param_due_date, $param_last_updated, $param_created_date, $param_attached_doc);
      
      // Set parameters
      $param_status = $status;
      $param_title = $title;
      $param_message = $message;
      $param_assign_to =$assign_to;
      $param_username= $username;
      $param_priority = $priority;
      $param_category = $category;
      $param_due_date = $due_date;
      $param_last_updated = $last_updated;
      $param_created_date = $created_date;
      $param_attached_doc = $attached_doc;

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
         // echo "Ticket submitted, the team will be answering you in most brief delay";

          // return usertype to redirect ot correct welcome

         echo $usertype;
     
      } else{
          echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);

// Close connection
mysqli_close($link);


?>