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


          <section style="margin: 1%; width:98% ">
            <tr>
                <th >
          <table >
              <tr>
                <th style="width: 80%">#reference</th>
                
              </tr><tr>
                  <th style="width: 80%">STATUS</th>
                  
                </tr>
            </table>
          </th>
          <th >
                  <table >
                <tr>
                  <th style="width: 80%">NAME TICKET<br/><br/>description ticket</th>
                  <th style="padding-right:130px">last updated<br/><br/>***date****</th>
                  <th style="align-content: left" >Attached document</th>
                </tr>
              </table>
            </tr>
            
          </th>
        <table class="table2" >
        <tr>
      <th class="column" >action1 </th>  <th style="width: 10%" class="column">action2</th> <th class="column">action3<th>
        <th style="width: 20%"class="column">assigned to<br/>name</th>   <th style="width: 20%"class="column">Raised by<br>name  </th>
         <th class="column" style="width: 15%">Priority<br/>low  </th> <th class="column" style="width: 20%">Category<br/>Support  </th> 
         <th class="column">Due date<br/>03/09/2019</th> <th>action9</th>
     </tr>
  
    </table >
  </section>


      </section >


    </div>
  
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" style="width:160px; height: 40px">
          <a style="text-decoration: none"  href="http://localhost/autoscan2/app/ticket.php">Add a ticket</a></button>
      
    </div>
  </form>
</body>
</html>