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
	body{
		background-color:#ffcc5c;	
	}
	.topnav{
		background-color:#ff6f69;
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
<div class="page-header">   </div>
<body>

        <div class="topnav">
            <a class="active" onclick="redirect();">Home</a>
            <a href="news.php">News</a>
            <a href="faq.php">Frequently Asked Questions</a>
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

      var words="";

      /*

      var t1 = message.toUpperCase().search("EDM");


      if( t1!== -1)
      words = words +"?EDM";

      if( t2!== -1)
      words = words +"?external?detector?method";

      if( t3!== -1)
      words = words +"?LA?ICP-MS";

      if( t4!== -1)
      words = words +"?LA?ICP?MS";

      if( t2!== -1)
      words = words +"?LA?ICP?MS";

      if( t22!== -1)
      words = words +"?LA?ICP?MS";

      if( t23!== -1)
      words = words +"?LA?ICP?MS";

      if( t24!== -1)
      words = words +"?LA?ICP?MS";










      alert(words);

*/
      


      //topic 1 EDM (External Detector Method)----La ICP-MS
      var t1 = message.toUpperCase().search("EDM");
      var t2 = message.toLowerCase().search("external detector method");
      var t3 = message.toUpperCase().search("LA ICP-MS");
      var t4 = message.toUpperCase().search("LA ICP MS");

      if(t1!== -1 || t2!== -1 ||t3!== -1 ||t4!== -1  )
      if (confirm("A similar topic has been identified from the Frequently Asked Question topic 1, have a look?")) 
      window.open("faq.php?TOPIC1");//TO CHANGE WITH FINAL URL
 
     //topic 2 microscope, apart from the Zeiss AxioImager Z2m or M2m
      var t2 = message.toUpperCase().search("ZEISS");
      var t22 = message.toLowerCase().search("axioimager");
      var t23 = message.toUpperCase().search("Z2M");
      var t24 = message.toUpperCase().search("M2M");

      if(t2!== -1 || t22!== -1 ||t23!== -1 ||t24!== -1  )
      if (confirm("A similar topic has been identified from the Frequently Asked Question topic 2, have a look?")) 
      window.open("faq.php?TOPIC2");

      //topic 3 IDS camera
      var t3 = message.toUpperCase().search("IDS");
      var t32 = message.toLowerCase().search("camera");

       if(t3!== -1 || t32!== -1 )
       if (confirm("A similar topic has been identified from the Frequently Asked Question topic 3, have a look?")) 
      window.open("faq.php?TOPIC3");

    
    //topic 4 Zeiss stages
      var t4 = message.toUpperCase().search("ZEISS");
      var t42 = message.toLowerCase().search("stages");

       if(t4!== -1 || t42!== -1 )
       if (confirm("A similar topic has been identified from the Frequently Asked Question topic 4, have a look?")) 
      window.open("faq.php?TOPIC4");





        //topic 5 extra word scans Laser Ablation + Inductively Coupled Plasma Mass Spectrometer
      var t5 = message.toLowerCase().search("laser");
      var t52 = message.toLowerCase().search("ablation");
      var t53 = message.toLowerCase().search("Inductively");
      var t54 = message.toLowerCase().search("plasma");
      var t55 = message.toLowerCase().search("spectrometer");
      var t56 = message.toLowerCase().search("tears");

      if(t5!== -1 || t52!== -1 ||t53!== -1 ||t54!== -1 || t55!== -1 ||t56!== -1 )
       if (confirm("A similar topic has been identified from the Frequently Asked Question , have a look?")) 
      window.open("faq.php?TOPIC5");






/*

      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              //alert(this.responseText);
              //window.open("faq.php?w='important'");

      
          }
          else {
          //alert("error") //ticket not created
          }
      }
     
      xmlhttp.open("GET", "faq.php?w=" +  "important", true);
      xmlhttp.send();  

*/
 

      //window.open("faq.php");

      


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

<div class="page-header">
        <h1 style="visibility:hidden;" >Hi, <b id="username"><?php echo htmlspecialchars($_SESSION["userType"]); ?></b> </h1>
    </div>
</body>
</html>