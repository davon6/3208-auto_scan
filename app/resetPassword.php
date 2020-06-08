<?php


                     $token =   $_REQUEST["t"] ;
                      $password =  $_REQUEST["w"] ;
/*
                      echo $token.'   '.$password;


*/

require_once "config.php";

                      $sql = "UPDATE users SET password = ? WHERE token = ?";

        

        
                      if($stmt = mysqli_prepare($link, $sql)){
                          // Bind variables to the prepared statement as parameters
                          mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_token);
                          
                          // Set parameters
                          $param_password = password_hash($password, PASSWORD_DEFAULT);
                          $param_token = $token;
              
              
                          //echo  $param_password.'  '.$param_token;
                          
                          // Attempt to execute the prepared statement
                          if(mysqli_stmt_execute($stmt)){
                              // Password updated successfully. Destroy the session, and redirect to login page
                              session_destroy();
                              header("location: login.php");
                              exit();
                          } else{
                              echo "Oops! Something went wrong. Please try again later.";
                          }
                      }
                      
                      // Close statement
                      mysqli_stmt_close($stmt);
                  
                  
                  // Close connection
                  mysqli_close($link);





?>