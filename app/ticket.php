<?php 
// Include config file
require_once "config.php";

$title = $description = "";
$title_err = $description_err = "";

$status = "pending";
$assign_to =  "";
$username = "30350561";
$priority = "Normal";
$category = "";
$due_date = date("Y/m/d");
$last_updated = date("Y/m/d");
$created_date = date("Y/m/d");
$attached_doc = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){


   

  // Check if title is empty
  if(empty(trim($_POST["title"]))){
    $title_err = "Please enter title.";
} else{
    $title = trim($_POST["title"]);
}

// Check if description is empty
if(empty(trim($_POST["description"]))){
    $description_err = "Please enter a description.";
} else{
    $description = trim($_POST["description"]);
}


// Check input errors before inserting in database
if(empty($title_err) && empty($description_err) ){

  // Prepare an insert statement
  $sql = "INSERT INTO ticket (status, title, description, assign_to, username , priority, category, due_date,
 last_updated, created_date, attached_doc ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";




   
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssssssi", $param_status, $param_title,$param_description, $param_assign_to, $param_username	,
      $param_priority, $param_category, $param_due_date, $param_last_updated, $param_created_date, $param_attached_doc);






      
      // Set parameters
      $param_status = $status;
      $param_title = $title;
      $param_description = $description;
      $param_assign_to =$_POST["assignTo"];
      $param_username	 = $username;
      $param_priority = $priority;
      $param_category = $_POST["category"];
      $param_due_date = $due_date;
      $param_last_updated = $last_updated;
      $param_created_date = $created_date;
      $param_attached_doc = $attached_doc;

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

<script>





</script>

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


<form  action="" method="post">
    <br><br>
    Category:
    <select name="category">
        <option value="Normal">Select Category</option>
        <option>Technical Issue</option>
        <option>Software Setup</option>
        <option>Other</option>
    </select>
    <br><br>
    Title: <input type="text" name="title" >
    <span class="help-block"><?php echo $title_err; ?></span>
    
    <br><br>

   Description: <textarea name="description" rows="10" cols="80"></textarea>
    <span class="help-block"><?php echo $description_err; ?></span>
    <br><br>
	
	<label for="fileInput" class="btn btn-danger" > Add Files </label>
<input type="file"  id="fileInput" />
	<br><br>
    Due Date: <input type="date" name="dueDate">
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