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
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

<div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
          </div>
   
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1>
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
  
    <div class="container" >
      <button type="button" style="width:160px; height: 40px;float:left; margin-top:1%;">
          <a style="text-decoration: none"  href="http://localhost/site2/html/ticket.html">Add a ticket</a></button>
      
    </div>
    <p  style="float:left; margin-left:4%; padding: 3%;">
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

</body>
</html>