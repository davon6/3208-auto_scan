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
   

      //AI text scan
      document.getElementById("message").addEventListener("change", function(event) {
      console.log("Textarea  was changed.");

      var message = document.getElementById("message").value;


      //topic 1 EDM (External Detector Method)----La ICP-MS
      var t1 = message.toUpperCase().search("EDM");
      var t2 = message.toLowerCase().search("external detector method");
      var t3 = message.toUpperCase().search("LA ICP-MS");
      var t4 = message.toUpperCase().search("LA ICP MS");

      if(t1!== -1 || t2!== -1 ||t3!== -1 ||t4!== -1  )
      if (confirm("A similar topic has been identified from the Frequently Asked Question topic 1, have a look?")) 
      window.open("faq.php");//TO CHANGE WITH FINAL URL
 
     //topic 2 microscope, apart from the Zeiss AxioImager Z2m or M2m
      var t2 = message.toUpperCase().search("ZEISS");
      var t22 = message.toLowerCase().search("axioimager");
      var t23 = message.toUpperCase().search("Z2M");
      var t24 = message.toUpperCase().search("M2M");

      if(t2!== -1 || t22!== -1 ||t23!== -1 ||t24!== -1  )
      if (confirm("A similar topic has been identified from the Frequently Asked Question topic 2, have a look?")) 
      window.open("faq.php");

      //topic 3 IDS camera
      var t3 = message.toUpperCase().search("IDS");
      var t32 = message.toLowerCase().search("camera");

       if(t3!== -1 || t32!== -1 )
       if (confirm("A similar topic has been identified from the Frequently Asked Question topic 3, have a look?")) 
      window.open("faq.php");

    
    //topic 4 Zeiss stages
      var t4 = message.search("ZEISS");
      var t42 = message.search("stages");

       if(t4!== -1 || t42!== -1 )
       if (confirm("A similar topic has been identified from the Frequently Asked Question topic 4, have a look?")) 
      window.open("faq.php");

    });
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