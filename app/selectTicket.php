<?php

require_once "config.php";

$ticket_id = $_REQUEST["i"];





 $status= $title= $assign_to=$message=
            $priority=$category=$due_date=$last_updated=$created_date=$attached_doc = "";


           // $username=$_SESSION["username"];

$numOfRows = 0;

$sql = "SELECT`message` FROM `ticket` WHERE `ticket_id` = '$ticket_id'; ";



//WHERE username ={ SELECT User_type FROM UserT WHERE = ".$_SESSION["username"]."}



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
                //while($stmt->fetch()){ 
                
                //if(mysqli_stmt_fetch($stmt)){
    
                   
                   
                   
                  //  <div>first 40 chars <span style="visibility:hidden">last 120 chars</span></div>
    
    
    
    
    
    
                  echo '<td>'.$message.'</td>';

/* <tr>
                  <td>'.$ticket_id.'</td><td>'.$status.'</td><td>'.$title.'</td><td> 
                  
                  <div style="width: 60px; text-overflow: ellipsis; white-space: nowrap;
                  overflow: hidden;"> '.$message.'</div>
                  
                  
                 </td><td>'.$assign_to
                  .'</td><td>'.$username.'</td><td>'.$priority.'</td><td>'.$category.'</td><td>'.$due_date.'</td><td>'.
                  $last_updated.'</td><td>'.$created_date.'</td><td>'.$attached_doc.'</td>
    
                */




                // <input name=del type=hidden value='".$record['course_code']."';
    
                //$numOfRows++;
                //}
    
               // echo   '<input type="hidden"  name="id" id="id" />';
    
              }
            }
        }
    }


?>