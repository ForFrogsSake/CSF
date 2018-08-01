<?php 

    $host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'csf';
    

	$conn = mysqli_connect($host,$user,$pass,$dbname) or die('Cannot connect to database');
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
        <title>My Profile</title>
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
            
        
        <div class="homebody" >
            <form>
            <h2>My Profile</h2>
            <?php
                $sql = "SELECT fname, lname, email, username, password FROM users where username='".$_SESSION['username']."'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result ) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<style>";
                        echo "form {text-align: center;}";
                        echo "label {float:left; margin:10px; margin-left:15%;}";
                        echo "input[type=text], input[type=password] { width:50%; padding: 10px; margin:10px; }";
                        echo "</style>";
                        echo "<form id='managetable'>";
                        echo "<label>First Name:</label>";
                        echo "<input type=text value='".$row['fname']."' readonly><br>";
                        echo "<label>Last Name:</label>";
                        echo "<input type=text value='".$row['lname']."' readonly><br>";
                        echo "<label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
                        echo "<input type=text value='".$row['email']."' readonly><br>";
                        echo "<label>Username:</label>";
                        echo "<input type=text value='".$row['username']."' readonly><br>";
                        echo "<label>Password:</label>";
                        echo "<input type=password value='".$row['password']."' readonly>";

                        }
                            $result->free();
                        }
                        else
                        {
                            echo "No results found";
                        }
                    ?>
            </form>
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