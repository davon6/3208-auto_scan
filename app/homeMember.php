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
        <h1 >Hi, <b id="username"><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </h1>
    </div>
<body>

    <script>


var username = "<?php echo $_SESSION["username"] ?>";

window.onload = function() {

        var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {


        //alert(document.getElementById("memberTickets").value);
       

      if(this.responseText ==="no ticket to display") {

       
        document.getElementById("categorySorting").style.display = "none";
      }
      else
      document.getElementById("memberTickets").innerHTML = this.responseText;

      }
      };


      //if( document.getElementById("memberTickets").value=="")
     // document.getElementById("memberTickets").innerHTML= "No ticket to display";

      xmlhttp.open("GET", "memberTickets.php?u=" + username , true);
      xmlhttp.send();   
          


};

       function answerTicket(count){



         //alert(count);

        var message = prompt("Please enter a comment");


        if(message === null||message.trim() === "")
        alert("no message submitted")
        else
        {
        
            var username = document.getElementById("username").innerHTML;


            var tableName = "memberTicketTable"+count;
            
            var conversation = document.getElementById(tableName).rows[1].cells[3].innerHTML;



            //alert(conversation.substr(8) +"<br>"+ username + " : " + message);

            var msg = conversation.substr(8) +"<br>"+ username + " : " + message

            

            var ticketId = document.getElementById(tableName).rows[1].cells[1].innerHTML;

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //alert(this.responseText);
                }
            else {
              //alert("?") //ticket not updated
            }
            }

            xmlhttp.open("POST", "answerTicket.php?a=" +  msg+ "&i=" +ticketId.substr(11), true);
            xmlhttp.send();   

            window.location.reload();
        }

       }

      function selectCategory(){

        var category = document.getElementById("category").value;
       
        var username = document.getElementById("username").innerHTML;
       
        var xmlhttp = new XMLHttpRequest();
 
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      if(this.responseText ==="")
      {
        document.getElementById("memberTickets").innerHTML = "No Ticket to display";
      }
      else
       document.getElementById("memberTickets").innerHTML = this.responseText;
 
    }
};

xmlhttp.open("GET", "memberTicketsbyCategory.php?u=" + username + "&c=" +category , true);
xmlhttp.send(); 

 
if(category===" ")
       {
        var xmlhttp = new XMLHttpRequest();


          xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

          if(this.responseText ===""){}
          else
          document.getElementById("memberTickets").innerHTML = this.responseText;

          }
          };

          xmlhttp.open("GET", "memberTickets.php?u=" + username , true);
          xmlhttp.send(); 
      
       }
      }   
      
        </script>
        <div class="topnav">
            <a class="active" href="homeMember.php">Home</a>
            <a href="news.php">News</a>
            <a href="faq.php">Frequently Asked Questions</a>
          </div>

<h1>Tickets</h1>
<p></p>
<form>
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
                                
                              
                            </tr>
                          </table>
                        </th>
                        <th >
                                <table >
                              <tr>
                              
                                <th  id="categorySorting" style="padding-right:130px">
                                    <section class="inline" style="border: unset">
                                    All Categories

                                    <select style="margin-left: 5%"id="category" onchange="selectCategory()">

                                        <option value=" ">Select one</option>
                                        <option >Technical Issue</option>
                                        <option >Software Setup</option>
                                        <option >Other</option>
                                    </select>
      </section>

                                </th>
                               
                              </tr>
                            </table>
                             </tr>

                           
                          </table>
                          <p id="memberTickets">No ticket to display</p>
                          

                          <script>

                          
                          
</script>







      </section >


    </div>
  
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" style="width:160px; height: 40px">
          <a style="text-decoration: none"  href="./ticket.php">Add a ticket</a></button>
      
    </div>
  </form>
 

<footer>
  
  <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>
</body>
</html>