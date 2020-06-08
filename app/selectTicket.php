<?php

require_once "config.php";

$ticket_id = $_REQUEST["i"];





 $status= $title= $assign_to=$message=
            $priority=$category=$due_date=$last_updated=$created_date=$attached_doc = "";


$numOfRows = 0;

$sql = "SELECT`message` FROM `ticket` WHERE `ticket_id` = '$ticket_id'; ";

          if($stmt = mysqli_prepare($link, $sql)){
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);


        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) >= 1){     
          
        
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $message);
           

          //  while($stmt->fetch()){ 
            
            if(mysqli_stmt_fetch($stmt)){

       
                echo '<table border="0" cellspacing="2" cellpadding="4" id="ticketModal"> <tr> 
                <td> <font face="Arial">ticket_id</font> </td> 
                <td> <font face="Arial">status</font> </td> 
                <td> <font face="Arial">title</font> </td> 
                <td> <font face="Arial">description</font> </td> 
                <td> <font face="Arial">assign_to</font> </td> 
                <td> <font face="Arial">raised_by</font> </td> 
                <td> <font face="Arial">priority</font> </td> 
                <td> <font face="Arial">category</font> </td> 
                <td> <font face="Arial">due_date</font> </td> 
                <td> <font face="Arial">last_updated</font> </td> 
                <td> <font face="Arial">created_date</font> </td> 
                <td> <font face="Arial">attached_doc</font> </td> 
            </tr>';
        
                  echo '<td>'.$message.'</td>';

    
              }
            }
        }
    }


?>