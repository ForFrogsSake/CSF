<?php 
    $host = 'localhost';
	$user = 'root1';
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
        <title>Manage Accounts</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link type="image/png" rel="icon" href="pictures/DOST LOGO.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="modifyrecords.js"></script>
        <script src = "js/jquery-3.1.1.js"></script>	
        
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
            
        
        <div class="homebody" id="disp_data" align='center' style="margin: 0px auto;">
            <form>
            <h2>USER MANAGEMENT</h2>
            <?php
                echo "<style>";
                echo "table {border-collapse: collapse; color: black; text-align:center;}";
                echo "tr {border: 1px solid black}";
                echo "th {border: 1px solid black; padding: 20px;}";
                echo "td {border: 1px solid black; padding: 10px; }";
                echo "input[type=button] { width:100%;}";
                echo "</style>";
                echo "<table id='managetable'>";
                
                $sql = "SELECT * FROM users ";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Username</th><th>Status</th><th>Account Type</th><th>Action</th></tr>";
                    while($row=mysqli_fetch_assoc($result)){
                       echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>"?> <div id="fname<?php echo $row["id"]; ?>"> <?php echo $row["fname"]?> <?php echo "</td>
                            <td>"?> <div id="lname<?php echo $row["id"]; ?>"> <?php echo $row["lname"]?> <?php echo "</td>
                            <td>"?> <div id="email<?php echo $row["id"]; ?>"> <?php echo $row["email"];?> <?php echo "</td>
                            <td>"?> <div id="username<?php echo $row["id"];?>"> <?php echo $row["username"];?> <?php echo "</td>
                            <td>"?> <div id="status<?php echo $row["id"];?>"> <?php echo $row["status"];?> <?php echo "</td>
                            <td>"?> <div id="acctype<?php echo $row["id"];?>"> <?php echo $row["acctype"];?> <?php echo "</td>
                           
                            <td>"?> 
                                <input type='button' class="edit_button" name="edit" id="edit_button<?php echo $row['id'];?>" value="edit" onclick="edit_row('<?php echo $row['id'];?>');">
                                <input type='button' class="save_button" name="save" id="save_button<?php echo $row['id'];?>" value="save" onclick="save_row('<?php echo $row['id'];?>');"> 
                                <input type='button' class="delete_button" name="del" id="delete_button<?php echo $row['id'];?>" value="delete" onclick="delete_row('<?php echo $row['id'];?>');"><?php echo "</td>";
                           echo "</tr>";
                    }
                
                    
                    echo "</form>";
                    echo"</table>";
                    
                }else{
                    echo "<h3>SORRY NO AVAILABLE DATA</h3>";
                }
            ?>
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


