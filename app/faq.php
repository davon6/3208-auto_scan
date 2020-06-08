<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<script>

function redirect(){

    var id = document.getElementById("username").innerHTML;


  if(id==="admin")
    window.location.href = "welcome.php";
    else
    window.location.href = "homeMember.php";

}

</script>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/css.css">
<title>FAQ</title>
</head>

<div class="page-header">
        <h1 style="visibility:hidden;" >Hi, <b id="username"><?php echo htmlspecialchars($_SESSION["userType"]); ?></b> </h1>
    </div>
<body>

        <div class="topnav">
        <a class="active" onclick="redirect();">Home</a>
            <a href="news.php">News</a>
            <a href="faq.php">Frequently Asked Questions</a>
            <a href="about.php">About</a>
          </div>

          <div class="imgcontainer">
      <img src="img_avatar2.png" alt="logo" class="avatar">
    </div>


<h1>FAQ</h1>


<br>
<br>
<p>Fission track dating (FTD) researcher, some questions :

1. Does your system handle both the tradition EDM (External Detector Method) technique, as well as the newer La ICP-MS (Laser Ablation + Inductively Coupled Plasma Mass Spectrometer) technique ?
The answer would be that it DOES. And this is important, as the traditional EDM technique requires the use of a slow neutron reactor. But these are being closed down in many countries.
On the other hand, the equipment required for La ICP-MS is expensive. But then again, many universities and research institutes already have some of these.
They DO give a LOT of extra information, and they ARE quick (days, compared to several months, to get an answer). So I suspect that many FTD researchers will end up using the new method.
<br>
<br>
2. Is it possible to use other brands or models of microscope, apart from the Zeiss AxioImager Z2m or M2m ?
The answer is NO. The reason is that
a) our software has been written with these two Zeiss models in mind only, and perhaps even more importantly :
b) these two models are the only ones we have found so far that seem to have eliminated the problem of thermal expansion (a major influence on image focus, and an issue with automatic analysis).
c) also, these microscopes are able to be computer-controlled in all respects, and are amazingly accurate in focus (again, an important consideration for automatic analysis).
<br>
<br>
3. How about the cameras ?
The answer is that these were chosen, not so much for the image resolution, as for the frame repetition rate and non-interlaced imaging.
The problem with interlaced imaging and slow frame rate repetition is that the image "tears" when the stage applies motion.
The issue with image resolution is that (at the 1000x magnification which is the most critical for FTD work), the resolution of what comes out of the top of the microscope is low, anyway.
So applying a high-resolution camera to such an image is a waste of time. The IDS camera we have chosen is the best camera for the job (even though higher resolution cameras are available).
<br>
<br>
4. What about the stages ? You have gone from manufacturing your own, to supplying those used by Zeiss.
We supply two types of stages : the standard systems use ones driven by stepper motors, and there are larger stages for multiple samples, driven by Piezo-motors.
Both of these types are driven directly from the Zeiss microscopes, thus avoiding the need for separate stage controllers.
They are 2-axis (X and Y) models, with the third axis (focus, or Z-axis) movement being supplied by the microscope.
Our own 3-axis stage models were a bit of an overkill, but could not compete with the microscope's Z-axis control and resolution, which is of the order of nanometers!
Also, our stages required an external stage motion controller. Whereas the Zeiss stages are controlled from our computers, via the microscopes.</p>





  
<footer>
  
  <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</footer>
</body>
</html>