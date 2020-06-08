<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

// Load Composer's autoloader
require '../vendor/autoload.php';

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $email =  $userType= "";
$username_err =  "";
 



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Check if username is empty
      if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }


     // Validate credentials
     if(empty($username_err)){
        // Prepare a select statement
        $sql = "SELECT username, email FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
              
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $email);
                    if(mysqli_stmt_fetch($stmt)){
                     
                            //session_start();

                         
                            // Store data in session variables
                            $_SESSION["username"] = $username;   
                            $_SESSION["email"] = $email;   


                            //generate token
                            $token = bin2hex(random_bytes(16));

                            $cryptToken = $token;

                            
                            $sql = "UPDATE users SET token= ? WHERE username = ?";
        
                        

                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "ss",$param_cryptToken,$param_username);
                                
                                // Set parameters
                                $param_username = $username;
                                $param_cryptToken = $cryptToken;
                                
                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){


                                        // Instantiation and passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {


   
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                        
                        
                        $mail->IsSMTP(true);
                        $mail->Host = 'smtp.gmail.com'; // not ssl://smtp.gmail.com
                        $mail->SMTPAuth= true;
                        $mail->Username='damignot@gmail.com';
                        $mail->Password='REGARDEMONZIZI69';
                        $mail->Port = 465; // not 587 for ssl 
                        $mail->SMTPDebug = 2; 
                        $mail->SMTPSecure = 'ssl';
                        $mail->SetFrom('dipakapatel.ind@gmail.com', 'Dipak');
                        $mail->AddAddress(''.$email.'', ''.$username.'');
                        $mail->Subject = 'Hi '.$username.'';
                        $mail->Subject = "Here is the solution for send mail";
                        $mail->Body    = "This is the HTML message body <b>in gagne!</b>";
                        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
                        // Name is optional
                    

                        // Attachments
                        

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = 'This link me redirect you to the next step of reseting your password <b> <a href="http://localhost/autoscan2/app/resetPasswordMail.php?t='.$cryptToken.'">click me</a></b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }


                    $newURL="login.php";
                    header('Location: '.$newURL);



                                }

                            }

                        }
                    }
                    else
                    {  // Display an error message if username doesn't exist
                        $username_err = "No account found with that username.";}
                } else{
                  
                
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);

}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>








</head>
<body>

    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill in your credentials to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reset Password">
            </div>
            
            <p><a href="login.php">go back to login</a></p>
            
        </form>
    </div>    
</body>
</html>