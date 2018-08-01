<?php
    $host = 'localhost';
	$user = 'root1';
	$pass = '';
	$dbname = 'csf';
    

	$conn = mysqli_connect($host,$user,$pass,$dbname) or die('Cannot connect to database');

if(isset($_POST['edit_row'])){
     $row=$_POST['row_id'];
     $status=$_POST['status'];
     $acctype=$_POST['acctype'];

     $sql= "UPDATE users SET status='$status',acctype='$acctype' where id='$row'";
     mysqli_query($conn, $sql );
     echo "success";
     exit();
}

if(isset($_GET['delete_row'])){
     $row_no=$_GET['row_id'];
     mysql_query("delete from users where id='$row_no'");
     echo "success";
     exit();
}

?>