
<?php

require_once "config.php";

$ticket_id= $status= $title= $message=$assign_to=
            $priority=$category=$due_date=$last_updated=$created_date=$attached_doc = "";


$username = $_REQUEST["u"];


           

$numOfRows = 0;

$sql = "SELECT`ticket_id`,`status`,`title`,`message`,`assign_to`,`priority`,`category`,`due_date`,`last_updated`,`created_date`,`attached_doc`  FROM `ticket` WHERE `username` LIKE '$username'; ";
 

          if($stmt = mysqli_prepare($link, $sql)){

           
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){

      
        // Store result
        mysqli_stmt_store_result($stmt);



        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) >= 1){ 
            
            
       
          
        
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $ticket_id, $status, $title, $message,$assign_to,
            $priority,$category,$due_date,$last_updated,$created_date,$attached_doc);
           

          

            while($stmt->fetch()){ 

   
            
            //if(mysqli_stmt_fetch($stmt)){

              echo '<table class="table2" >
              <tr>
              <th class="column" >action1 </th>  <th style="width: 10%" class="column">action2</th> <th class="column">action3<th>
              <th style="width: 20%"class="column">assigned to '.$assign_to.'<br/>name </th>   <th style="width: 20%"class="column">Raised by '.$username.'<br>name  </th>
              <th class="column" style="width: 15%">Priority'.$priority.'<br/>low  </th> <th class="column" style="width: 20%">Category'.$category.'<br/>Support  </th> 
              <th class="column">created on '.$created_date.' <th>action9</th>
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

           // echo   '<input type="hidden"  name="id" id="id" />';



         }
        
        
        }}
?>