<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		{
  box-sizing: border-box;
}
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>


</head>

<div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </h1>
    </div>

<header>
 <div class="w3-container w3-red">
<a href="ticket.php" class="btn btn-danger">Add Ticket</a>
</div>
</header>

<section>
  <nav>
    <ul>
      <h2><li><a href="about.html">About</a></li></h2>
      <h2><li><a href="news.html">News</a></li></h2>
      <h2><li><a href="contact.html">Contact</a></li></h2>
	  <h2><li><a href="issues.html">Issues</a></li></h2>
    </ul>
  </nav>

  <h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Do you want to delete </p> 
    <br>
    '<input type="text"  name="toDelete" id="toDelete" />
    <p>?</p>
    <input type=button value="Yes"> <input type=button value="No">
  </div>

</div>

<script>

var id = 0;

  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var btn2 = document.getElementById(id);

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal.style.display = "block";
}



document.getElementById("id").value = id;

function display(id, numRow){
  

  var txt;
  if (confirm("Are you sure you want to delete "+ document.getElementById("ticketsTable").rows.item(numRow+1).innerHTML.substring(4,220).replace(/\//g, ' ')
.trim().replace(/< td>/g, " ").replace(/<td>/g, " "))) {
  


  var xmlhttp = new XMLHttpRequest();


xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
    }
};

xmlhttp.open("POST", "deleteTicket.php?i=" + id , true);
xmlhttp.send();   
 

  } else {
    alert("?") //ticket not deleted
  }
 
}

</script>

  <form  method="post">
   
<?php

require_once "config.php";


$ticket_id= $status= $title= $description=$assign_to=$username=
            $priority=$category=$due_date=$last_updated=$created_date=$attached_doc = "";

$numOfRows = 0;

$sql = "SELECT ticket_id, status, title, description, assign_to, username, priority, category, due_date, last_updated, 
created_date, attached_doc FROM ticket ";
        
if($stmt = mysqli_prepare($link, $sql)){
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);


        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) >= 1){     
          
          
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $ticket_id, $status, $title, $description,$assign_to,$username,
            $priority,$category,$due_date,$last_updated,$created_date,$attached_doc);
           

            echo '<table border="0" cellspacing="2" cellpadding="4" id="ticketsTable"> <tr> 
            <td> <font face="Arial">ticket_id</font> </td> 
            <td> <font face="Arial">status</font> </td> 
            <td> <font face="Arial">title</font> </td> 
            <td> <font face="Arial">description</font> </td> 
            <td> <font face="Arial">assign_to</font> </td> 
            <td> <font face="Arial">raised_by</font> </td> 
            <td> <font face="Arial">priority</font> </td> 
            <td> <font face="Arial">category</font> </td> 
            <td> <font face="Arial">due_date</font> </td> 
            <td> <font face="Arial">last_updated</font> </td> 
            <td> <font face="Arial">created_date</font> </td> 
            <td> <font face="Arial">attached_doc</font> </td> 
        </tr>';
            while($stmt->fetch()){ 
            
            //if(mysqli_stmt_fetch($stmt)){

              echo '<tr>
              <td>'.$ticket_id.'</td><td>'.$status.'</td><td>'.$title.'</td><td>'.$description.'</td><td>'.$assign_to
              .'</td><td>'.$username.'</td><td>'.$priority.'</td><td>'.$category.'</td><td>'.$due_date.'</td><td>'.
              $last_updated.'</td><td>'.$created_date.'</td><td>'.$attached_doc.'</td>
              <td> <input type="submit" name="btn_submit" value="View" /></td>
              <td><input type="submit" name="btn_submit" id="'.$numOfRows.'" value="Delete"
              onClick="display('.$ticket_id.', '.$numOfRows.');"/></td><input name='.$ticket_id.' type=hidden ><td></tr> 
             ';
            // <input name=del type=hidden value='".$record['course_code']."';

            $numOfRows++;
            }

            echo   '<input type="hidden"  name="id" id="id" />';
          }}}


          if (isset($_REQUEST['btn_submit'])) {
            

            switch ($_REQUEST['btn_submit']) {
          
                case "Change Profile":
          
                    $newProfile = $_POST['profile'];
          
                $sql = "UPDATE UserT
                SET profile = '".$newProfile."'
                WHERE name = '".$savedName."' ";
            
                if ($conn->query($sql) === TRUE) {
            
                    echo "Profile changed to ".$_POST['profile'];
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
                $conn->close();
                     break;
          
                    break;
          

               case "View":
          
                echo "good";
                die;
                $choice = $_POST['courses'];
                
                echo '<br><br>Your favorite dessert(s) is (are) ';
          
                $value=0;
               foreach($choice as $x){
                   echo $x ." ";
          
                   if($x ==="Cake")$value = 1 ;
                   if($x ==="ice cream")$value = 2 ;
                   if($x ==="Bread")$value = 3 ;
                   if($x ==="Fruit salad")$value = 4 ;
                   if($x ==="Tarte")$value = 5 ;
          
                   $sql = "SELECT * FROM Likes WHERE user_id='".$savedId."' HAVING dessert_id='".$value."';" ;
          
                    $result = $conn->query($sql);
          
                   if ($result->num_rows > 0)  {echo "Likes already registered";}
                   else{
                    $sql = "INSERT INTO Likes
                        (user_id, dessert_id) VALUES ('".$savedId."','".$value."')";
                        if($conn->query($sql) === TRUE)  echo "Like saved";
                   }
                }
             break;

        case "Delete":
         
         
          //echo $_POST['id'];

          $ticket_id = $_POST['id'];

        
                   break;
        
            }
          }
          
?>

</form>
</section>

<footer>
  
  <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>

</body>
</html>

