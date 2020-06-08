<?php

 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

/*
$isTouch = isset($_REQUEST["t"]);

if($isTouch)
{}
else
header("location: http://localhost/autoscan2/app/login.php");

*/

//$isTouch = isset($_REQUEST["t"]);

//if($isTouch = empty($_REQUEST["t"]))
//header("location: http://localhost/autoscan2/app/login.php");



//echo isset($_REQUEST["t"]).'ffff';


//if(isset($_REQUEST["t"]))
//{
   









//}
//else
   // header("location: http://localhost/autoscan2/app/login.php");


/*
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

 

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE token = ?";

        

        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_token);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_token = $_REQUEST["t"];


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
    }
    
    // Close connection
    mysqli_close($link);
}*/
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
    <script>
    
    function changePassword()
    {
       // alert(document.getElementById("token").innerHTML+ "  "+ document.getElementById("new_password").value);
        //alert(document.getElementById("new_password").value);


        //if(document.getElementById("token").innerHTML==="")
      //  alert("oo");

      var xmlhttp = new XMLHttpRequest();

      

      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              alert(this.responseText);
/*
              if(this.responseText=='admin')
                window.location.href = "./welcome.php";
                else
                window.location.href = "./homeMember.php";*/
          }
          else {
          //alert("error") //ticket not created
          }
      }
     //?t=" +  "title"+ "&m=" +"message

      alert(document.getElementById("token").innerHTML+ "&w=" + document.getElementById("new_password").value);

     
      xmlhttp.open("POST", "resetPassword.php?t=" +  document.getElementById("token").innerHTML+ "&w=" + document.getElementById("new_password").value, true);
      xmlhttp.send();   

        


    }


    </script>
</head>
<body>

<p style="display:none" id=token><?echo $_REQUEST["t"];?></p>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control" >

                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" onclick="changePassword();">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form>

    </div>    
</body>
</html>