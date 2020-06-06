<?php


# Include the Autoloader (see "Libraries" for install instructions)
require '../vendor/autoload.php';
use Mailgun\Mailgun;




if($_SERVER["REQUEST_METHOD"] == "POST"){
   

    /*
    # Instantiate the client.
    $mgClient = new Mailgun('adefc5e0fe368cd15c3039438f75e4e4-7bce17e5-1976f291');
$domain = "sandbox846554219a284358b28b3fba51744c0b.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'	=> 'Mailgun Sandbox <postmaster@sandbox846554219a284358b28b3fba51744c0b.mailgun.org>',
	'to'	=> 'david damignot@gmail.com',
	'subject' => 'Hello',
	'text'	=> 'Testing some Mailgun awesomness!'
));*/

}
 /*
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@YOUR_DOMAIN_NAME';   // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = 'sandbox846554219a284358b28b3fba51744c0b.mailgun.org';
$mail->FromName = 'Mailer';
$mail->addAddress('damignot@gmail.com');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Hello';
$mail->Body    = 'Testing some Mailgun awesomness';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
*/





// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $userType= "";
$username_err = $password_err = "";
 

/*


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your new password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
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


                        //echo "hello";

                       // $password = '666';

                        

                        $sql = "UPDATE users SET password = ? WHERE username = ?";

                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss",$param_password, $param_username);
                            
                            // Set parameters
                            
                            $param_username = $username;
                            $param_password = password_hash($password, PASSWORD_DEFAULT);
                        
                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                // Redirect to welcome page
                               header("location: login.php");

                            } else{
                                echo "Something went wrong. Please try again later.";
                            }
                        }
   }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

*/
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