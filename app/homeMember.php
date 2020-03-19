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
<html>
<head>
    <link rel="stylesheet" href="../css/css.css">
<title>Dashboard</title>
</head>

<div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </h1>
    </div>
<body>
    <script>
 

       function myFunction()
       {

        alert("whhh");
        //window.location.href = "http://www.google.com";
        //location.href="http://google.com";
        //document.location.href = '/page2.html';
        location.reload();
        location.href="http://google.com";
        alert("after");

       }

        //onclick="location.href='http://google.com';"
        //action="action_page.php" 
        </script>
        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
          </div>

<h1>Tickets</h1>
<p></p>
<form onsubmit="myFunction()">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="logo" class="avatar">
    </div>

  
    <div class="container">
      
      <section style="width: 100%"  >

                      <table style="width:90%  ;margin: 1%">
                          <tr>
                              <th >
                        <table >
                            <tr>
                              <th style="width: 80%">
                                  <section class="inline" style="border: unset">

                                  action

                                      <select style="margin-left: 12%">

                                          <option value="Normal">Select one</option>
                                          <option value="High">Saab</option>
                                      </select>

                                  </section></th>
                              
                            </tr>
                          </table>
                        </th>
                        <th >
                                <table >
                              <tr>
                                <th style="width: 80%">
                                    <section class="inline" style="border: unset">

                                    Sort by

                                    <select style="margin-left: 12%">

                                        <option value="Normal">Select</option>
                                        <option value="High">Saab</option>
                                    </select>
                                    </section>
                                </th>
                                <th style="padding-right:130px">
                                    <section class="inline" style="border: unset">
                                    All Categories

                                    <select style="margin-left: 5%">

                                        <option value="Normal">Select one</option>
                                        <option value="High">Saab</option>
                                    </select>
      </section>

                                </th>
                                <th style="align-content: left" >1-6</th>
                              </tr>
                            </table>
                             </tr>
                          </table>

<?php

require_once "config.php";

$ticket_id= $status= $title= $message=$assign_to=
            $priority=$category=$due_date=$last_updated=$created_date=$attached_doc = "";


            $username=$_SESSION["username"];

$numOfRows = 0;

$sql = "SELECT`ticket_id`,`status`,`title`,`message`,`assign_to`,`username`,`priority`,`category`,`due_date`,`last_updated`,`created_date`,`attached_doc`  FROM `ticket` WHERE `username` LIKE '$username'; ";

          if($stmt = mysqli_prepare($link, $sql)){
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);


        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) >= 1){     
          
        
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $ticket_id, $status, $title, $message,$assign_to,$username,
            $priority,$category,$due_date,$last_updated,$created_date,$attached_doc);
           

            while($stmt->fetch()){ 
            
            //if(mysqli_stmt_fetch($stmt)){

              echo '<table class="table2" >
              <tr>
              <th class="column" >action1 </th>  <th style="width: 10%" class="column">action2</th> <th class="column">action3<th>
              <th style="width: 20%"class="column">assigned to '.$assign_to.'<br/>name </th>   <th style="width: 20%"class="column">Raised by '.$username.'<br>name  </th>
              <th class="column" style="width: 15%">Priority'.$priority.'<br/>low  </th> <th class="column" style="width: 20%">Category'.$category.'<br/>Support  </th> 
              <th class="column">Last updated<'.$last_updated.' <th>action9</th>
              </tr>
              </table >
              
          <section style="margin: 1%;  ">
       
        <table >


        <th >
            
              <tr>
              <th>STATUS '.$status.'</th>
              <th     style="width:20%" >#reference '.$ticket_id.'</th>
                <th style="width: 50%">NAME TICKET '.$title.' Message '.$message.'</th>
                <th>last updated '.$last_updated.'</th>
                <th >Attached document</th>
              </tr>
            </table>
          </tr>
          
        </th>
        
        </section >
           
        ';
            // <input name=del type=hidden value='".$record['course_code']."';

              $numOfRows++;
            }

            echo   '<input type="hidden"  name="id" id="id" />';
          }}}
?>

      </section >


    </div>
  
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" style="width:160px; height: 40px">
          <a style="text-decoration: none"  href="http://localhost/autoscan2/app/ticket.php">Add a ticket</a></button>
      
    </div>
  </form>


<footer>
  
  <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>
</body>
</html>