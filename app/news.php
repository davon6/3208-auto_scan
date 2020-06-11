<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<script>

function redirect(){

    var id = document.getElementById("username").innerHTML;


  if(id==="admin")
    window.location.href = "welcome.php";
    else
    window.location.href = "homeMember.php";

}

</script>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/css.css">
<title>News</title>
<style>
    
	body{
		background-color:#ffcc5c;	
	}
	.topnav{
		background-color:#ff6f69;
	}
	.containerat{
		background-color:#ffeead;
	text-align:center;}
	footer{
		background-color:#88d8b0;
	}
  </style>
</head>

<div class="page-header">
        <h1 style="visibility:hidden;" >Hi, <b id="username"><?php echo htmlspecialchars($_SESSION["userType"]); ?></b> </h1>
    </div>
<body>

        <div class="topnav">
            <a class="active" onclick="redirect();">Home</a>
            <a href="news.php">News</a>
            <a href="faq.php">Frequently Asked Questions</a>
          </div>

<h1>News</h1>
<p></p>
<form>
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="logo" class="avatar">
    </div>

<footer>
  
  <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>
</body>
</html>