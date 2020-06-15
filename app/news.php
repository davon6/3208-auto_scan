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
    
	body{ font: 14px sans-serif; text-align: center; 
		background-color:#e5e7e9;
		font-family: Arial, Helvetica, sans-serif;}
		{
  box-sizing: border-box;
}
.containerat{
		background-color:#e5e7e9;
		
		margin-left:5%;
		margin-right:5%;
	text-align:center;}
		.topnav{
		background-color:#3498db;
		margin-left:5%;
		margin-right:5%;
	}
	footer{
		background-color:#77bfe2;
		padding:5px;
		margin-left:5%;
		margin-right:5%;
	}
	.page-header{
		text-align:center;
	}
	h1{
		text-align:center;
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
<div class=containerat>

</div>

<footer>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>
</body>
</html>