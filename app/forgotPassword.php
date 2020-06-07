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
$username = $password = $userType= "";
$username_err = $password_err = "";
 



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
        $sql = "SELECT us_id, username, password, userType FROM users WHERE username = ?";
        
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
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $userType);
                    if(mysqli_stmt_fetch($stmt)){
                     
                            //session_start();

                         
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;   
                            $_SESSION["userType"] = $userType;   



                            $token = bin2hex(random_bytes(16));

                            echo $token."66";
                            echo "daaavid";
                            echo crypt($token,'st');



                 
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

    
 /*
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
    $mail->AddAddress('damignot@gmail.com', 'HisName');
    $mail->Subject = 'Hi David';
    $mail->Subject = "Here is the solution for send mail";
    $mail->Body    = "This is the HTML message body <b>in gagne!</b>";
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    // Name is optional
  

    // Attachments
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>MIDI-evil888</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


$newURL="login.php";
header('Location: '.$newURL);
*/
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


<script src="https://smtpjs.com/v3/smtp.js"></script>

<input type="button" value="Send Email" onclick="sendEmail()">

<script>


function sendEmail() {
/*
    Email.send({
        Host : "smtp.mailgun.org",
        Username : "postmaster@sandbox846554219a284358b28b3fba51744c0b.mailgun.org",
        Password : "85b1cb4709f0b4e3b4c47990b46349b4-7bce17e5-0e75c63e",
        To : 'damignot@gmail.com',
        From : "sandbox846554219a284358b28b3fba51744c0b.mailgun.org",
        Subject : "Test email",
        Body : "<html><h2>Header</h2><strong>Bold text</strong><br></br><em>Italic</em></html>"
    }).then(
    message => alert(message)
    );
*/

    Email.send({
        Host : "smtp.mailtrap.io",
        Username : "52d5940d2139d5",
        Password : "363f7457a8a4f0",
        To : 'damignot@gmail.com',
        From : "ca61e28732-3bfc4f@inbox.mailtrap.io",
        Subject : "Test email",
        Body : "<html><h2>Header</h2><strong>Bold text</strong><br></br><em>Italic</em></html>"
    }).then(
    message => alert(message)
    );

}

</script>



    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill in your credentials to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>New password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reset Password">
            </div>
            
            <p><a href="login.php">go back to login</a></p>
            
        </form>
    </div>    
</body>
</html>