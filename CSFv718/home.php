<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link type="image/png" rel="icon" href="pictures/DOST LOGO.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="home">
            <div class="homebtn">
                <a href="home.php"><img src="pictures/dostcarlogo.png"  style="width:400px;"></a>
            </div>
        
        <div class="navbar" id="mynavbar">
            
            <div class="dropdown">
                 <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    
                <button class="btn3"><strong><?php echo $_SESSION['username'];?>&#9662;</strong></button>
                <div class="dropdown-cont">
                    <a href="profile.php" >My Profile</a>
                    <a href="csfform.php" >Create a CSF Form</a>
                    <a href="manageacc.php" >User Management</a>
                    
                    <a href="index.php?logout='1'" >Logout</a>
                </div>
                <?php endif ?>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
       </div>   
            
        <div class="content">
  
</div>
        
        <div class="homebody">
        <h1><script src="jscript.js" >
                    </script> <?php echo $_SESSION['username'];?> ! &#9786;</h1>
            <div class="innerhomediv">
               <h4><img src="pictures/calendar_icon.png" id="calendar" style="width:20px;">
                TODAY IS 
                   <?php 
                   date_default_timezone_set('Asia/Manila');
                   $currentDate=date('l\, jS \of F Y h:i:s A');
                   echo strtoupper($currentDate); ?></h4>
            </div>
        </div>
        
        <script>
        function myFunction() {
            var x = document.getElementById("mynavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
        </script>
        

       
    </body>
</html>


