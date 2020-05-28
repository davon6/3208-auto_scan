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
<title>Ticket</title>

<style>
    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }
  </style>

<script>

function redirect(){

var id = document.getElementById("username").innerHTML;


if(id==="admin")
window.location.href = "welcome.php";
else
window.location.href = "homeMember.php";

}



function createNewTicket(){

var title = document.getElementById("title").value;
var message = document.getElementById("message").value;
var category = document.getElementById("category").value;
var fileInput = document.getElementById("fileInput").value;

  if(title=="")
    document.getElementById("valiTitle").innerHTML = "Enter a title";
  else
    document.getElementById("valiTitle").innerHTML = "";

  if(message=="")
    document.getElementById("valiMessage").innerHTML = "Enter a message";
  else
    document.getElementById("valiMessage").innerHTML="";

  if(category==0)
    document.getElementById("valiCategory").innerHTML = "Select a category";
  else
      document.getElementById("valiCategory").innerHTML="";



if(title != "" & message!=""& category !=0)
  {
 
    var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              //alert(this.responseText);

              if(this.responseText=='admin')
                window.location.href = "./welcome.php";
                else
                window.location.href = "./homeMember.php";
          }
          else {
          //alert("error") //ticket not created
          }
      }
     
      xmlhttp.open("POST", "createNewTicket.php?t=" +  title+ "&m=" +message+ "&c="+category+ "&f="+fileInput, true);
      xmlhttp.send();   
  }
}

</script>

</head>
<body>
<div class="page-header">
        <h1 style="display:none;" >Hi, <b id="username"><?php echo htmlspecialchars($_SESSION["userType"]); ?></b> </h1>
    </div>
<body>

        <div class="topnav">
            <a class="active" onclick="redirect();">Home</a>
            <a href="news.php">News</a>
            <a href="faq.php">Frequently Asked Questions</a>
            <a href="about.php">About</a>
          </div>

<h2>New Ticket</h2>
<p>Please fill in the form below to open a new ticket</p>


<form  action="" method="post">
    <br><br>
    Category:
    <select name="category" id="category">
        <option value=0>Select Category</option>
        <option>Technical Issue</option>
        <option>Software Setup</option>
        <option>Other</option>
    </select>
    <span class="help-block" id="valiCategory"></span>



    <br><br>
    Title: <input type="text" name="title" id="title" >
   <span class="help-block" id="valiTitle"></span>
    



    <br><br>

   Message: <textarea name="message" rows="10" cols="80" id="message" ></textarea>
   <span class="help-block" id="valiMessage"></span>

   <script>
   

/////TOO KEEP FOR AI
  /**  document.getElementById("message").addEventListener("change", function(event) {
      console.log("Textarea  was changed.");
      //alert("changed");
      var message = document.getElementById("message").value;

      var n = message.search("a word");

      alert("a word");
    });





EDM (External Detector Method)----La ICP-MS
microscope, apart from the Zeiss AxioImager Z2m or M2m
IDS camera
Zeiss stages

 */

</script>
    
    <br><br>
	
	<label for="fileInput" class="btn btn-danger" > Add Files </label>
<input type="file"  id="fileInput" />
	<br><br>
 

    <br><br>
    </section>
  <input type="submit" onClick="createNewTicket();return false;" >
</form>
</body>
</html>