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
  <nav>
    <ul>
      <h2><li><a href="about.html">About</a></li></h2>
      <h2><li><a href="news.html">News</a></li></h2>
      <h2><li><a href="contact.html">Contact</a></li></h2>
	  <h2><li><a href="issues.html">Issues</a></li></h2>
    </ul>
  </nav>

  <section>
      <!-- Trigger/Open The Modal  DOESNT WORK WITHOUT IT-->
      <input type="hidden" id="myBtn">
            
            <!-- The Modal -->
            <div id="myModal" class="modal">
            
              <!-- Modal content -->
              <div class="modal-content">

                <span class="close">&times;</span>
                <p id="modalView">Some text in the Modal..</p>

                <br>



              <textarea id="answer">
              
              
              
              </textarea>
</form>

              
<button onClick="answerTicket();">answer</button>

             
              </div>


            </div>



  <p id="tickets">No ticket to display</p>

           

            <style>
            /* The Modal (background) */
            .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }
            
            /* Modal Content/Box */
            .modal-content {
              background-color: #fefefe;
              margin: 15% auto; /* 15% from the top and centered */
              padding: 20px;
              border: 1px solid #888;
              width: 80%; /* Could be more or less, depending on screen size */
            }
            
            /* The Close Button */
            .close {
              color: #aaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
              color: black;
              text-decoration: none;
              cursor: pointer;
            }
            
            </style>
            
            <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on the button, open the modal
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
            
            </script>

</section>

<script>


window.onload = function() {
  
  var xmlhttp = new XMLHttpRequest();


xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      if(this.responseText ===""){}
      else
       document.getElementById("tickets").innerHTML = this.responseText;
 
    }
};

xmlhttp.open("GET", "displayTickets.php"  , true);
xmlhttp.send();   
 
};

setTimeout(location.reload.bind(location), 50000);// reload page every 50000  ms

var id = 0;

document.getElementById("id").value = id;

function deleteTicket(id, numRow){

    //var txt;
    if (confirm("Are you sure you want to delete "+ document.getElementById("ticketsTable").rows.item(numRow+1).innerHTML.substring(4,206).replace(/\//g, ' ')
  .trim().replace(/< td>/g, " ").replace(/<td>/g, " ") + " ?")) {
    
    var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          //alert(this.responseText);
      }
  };

  xmlhttp.open("POST", "deleteTicket.php?i=" + id , true);
  xmlhttp.send();   

  window.location.reload();
  
    } else {
      alert("?") //ticket not deleted
    }
 
}

function openModal(id, numRow){

  modal.style.display = "block";

  
  var xmlhttp = new XMLHttpRequest();


xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      if(this.responseText ===""){}
      else
       document.getElementById("modalView").innerHTML = this.responseText;
 
    }
};

xmlhttp.open("GET", "selectTicket.php?i=" +id , true);
xmlhttp.send();   
 






  var str = document.getElementById("ticketsTable").rows.item(numRow+1).innerHTML.substring(4,206).replace(/\//g, ' ')
  .trim().replace(/< td>/g, " ").replace(/<td>/g, " ");

  var i = 1;

  var num = "";


  while(str!==" "){

    if( str.charAt(i)== " ")
    {

   str = str.substring(1,i);

   break;
}

i++;
}
  //str.substring(1, 4);

  window.idTicketSelected = str;



 /* document.getElementById("modalView").innerHTML =
  
//   str.substr(0,str.indexOf(' '));; 
document.getElementById("ticketsTable").rows.item(numRow+1).innerHTML
.substring(4,206).replace(/\//g, ' ')
  .trim().replace(/< td>/g, " ").replace(/<td>/g, " ");*/

  
}


function answerTicket(){

  

  





var conversation =document.getElementById("ticketModal").rows.item(1).innerHTML;

var countEnd = conversation.length-9;
 

   var msg = conversation.substr(4, countEnd) +" "+
  document.getElementById("ticketsTable").rows[1].cells[5].innerHTML+ ": "+
   document.getElementById("answer").value;

   alert(msg);

  
  
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
    }
   else {
    //alert("?") //ticket not updated
  }
}
xmlhttp.open("POST", "answerTicket.php?a=" +  msg+ "&i=" +idTicketSelected, true);
xmlhttp.send();   

modal.style.display = "none";
window.location.reload();



}


</script>



<footer>

  
  <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>

</body>
</html>

