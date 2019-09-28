<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = OpenCon();
$status = "pending";
$title = $_GET["title"];
$description = $_GET["description"];
$assign_to =$_GET["assignTo"];
$raised_by = "clientInformation";
$priority = "Normal";
$category = $_GET["category"];
$due_date = date("Y/m/d");
$last_updated = date("Y/m/d");
$created_date = date("Y/m/d");
$attached_doc = 0;
/*
$sql = "INSERT INTO ticket (status, title, description, assign_to, raised_by, priority, category, due_date,
 last_updated, created_date, attached_doc) VALUES (".$status.", ".$title.", ".$description.", ".$assign_to.",
  ".$raised_by.", ".$priority.", ".$category.",".$due_date.", ".$last_updated.", ".$created_date.", ".$attached_doc.")";
echo $sql;
*/
// Attempt insert query execution
$sql = "INSERT INTO ticket (status, title, description, assign_to, raised_by, priority, category, due_date,
 last_updated, created_date, attached_doc) VALUES ('".$status."', '".$title."', '".$description."', '".$assign_to."',
  '".$raised_by."', '".$priority."', '".$category."','".$due_date."', '".$last_updated."', '".$created_date."', ".$attached_doc.")";
if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
/*include 'db_connection.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);*/
?>
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 











<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/css.css">
<title>Ticket</title>
<style>

    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }
  </style>
</head>
<body>
        <div class="topnav">
            <a class="active" href="dashboard.html">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
          </div>
<h2>New Ticket</h2>
<p>Please fill in the form below to open a new ticket</p>
<form  action="../php/submitTicket.php" method="get">
    <br><br>
    Category:
    <select name="category">
        <option value="Normal">Select Category</option>
        <option>Category 1</option>
        <option>Category 2</option>
        <option>Category 3</option>
    </select>
    <br><br>
    Title: <input type="text" name="title" >
    
    <br><br>

    Description: <textarea name="description" rows="10" cols="80"></textarea>
    <br><br>
    Due Date: <input type="date" name="dueDate">
    <br><br>
    <br><br>
    <section class="inline" style="border: unset">
        Assign to:
    <select name="assignTo">
        <option value="Normal">Select one</option>
        <option>Mike</option>
        <option >Staff</option>
    </select>

    <br><br>
    </section>
  <input type="submit" >
</form>
</body>
</html>