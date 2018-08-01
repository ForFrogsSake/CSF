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
                        echo ".label {float:left; margin:15px; margin-left:15%; margin-right:45px; }";
                        echo "input[type=text], input[type=password] { width:40%; padding: 15px; margin:15px; }";
                        echo "#confirm{ float:left; margin-left:15%; margin-top:15px; }";
                        echo "input[name=confirmpass]{ width:40%; padding: 15px; margin-right:15px;  margin-top:15px;  margin-bottom:15px; margin-left:0;}";
                        echo "#savebtn{  background-color: #0080ff; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 20%;}";
                        echo "#cancelbtn{  background-color: #FF6347; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 20%;}";
                        echo "</style>";
                        echo "<form id='managetable'>";
                        echo "<label class='label'>First Name:</label>";
                        echo "<input type=text value='".$row['fname']."' ><br>";
                        echo "<label class='label'>Last Name:</label>";
                        echo "<input type=text value='".$row['lname']."' ><br>";
                        echo "<label class='label'>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
                        echo "<input type=text value='".$row['email']."' readonly><br>";
                        echo "<label class='label'>Username:</label>";
                        echo "<input type=text value='".$row['username']."' readonly><br>";
                        echo "<label class='label'>Password:</label>";
                        echo "<input type=password ><br>";
                        echo "<label id='confirm'>Confirm Password:</label>";
                        echo "<input type=password name='confirmpass' ><br>";
                        echo "<button type='submit' id='savebtn' name='save'>Save</button>&nbsp;";
                        echo "<button type='submit'  id='cancelbtn' name='cancel'>Cancel</button>";

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