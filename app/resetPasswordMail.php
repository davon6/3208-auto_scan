<?php

 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";


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
      

      var xmlhttp = new XMLHttpRequest();

      

      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              window.location.href = "./login.php"; 
             
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

      //alert(document.getElementById("token").innerHTML+ "&w=" + document.getElementById("new_password").value);

     
      xmlhttp.open("POST", "resetPassword.php?t=" +  document.getElementById("token").innerHTML+ "&w=" + document.getElementById("new_password").value, true);
      xmlhttp.send();  
      
      alert("Your password has been changed");
       

        


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
                <a class="btn btn-link" href="login.php">login</a>
            </div>
        </form>

    </div>    
</body>
</html>