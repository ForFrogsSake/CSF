<?php 
session_start();

$username = "";
$email = "";
$errors = array();
$logerrors = array();

$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'csf';

	$conn = mysqli_connect($host,$user,$pass,$dbname) or die('Cannot connect to database');

if (isset($_POST['register'])){
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$psw1 = mysqli_real_escape_string($conn, $_POST['password']);
	$psw2 = mysqli_real_escape_string($conn, $_POST['repassword']);
    
    
	if(empty($firstname)){
		array_push($errors, "First name is required");
	}

	if(empty($lastname)){
		array_push($errors, "Last name is required");
	}

	if(empty($email)){
		array_push($errors, "Email is required");
	}

	if(empty($username)){
		array_push($errors, "Username is required");
	}

	if(empty($psw1)){
		array_push($errors, "Password is required");
	}

	if($psw1 != $psw2){
		array_push($errors, "The two passwords do not match");
	}
    
    if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)){
        array_push($errors, "Invalid input for first name and last name");
    }
    
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
	$result1 = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result1);

	//if user exist
	if($user){
		if($user['username'] === $username ){
			array_push($errors, "Username already exist");
		}

		if($user['email'] === $email){
			array_push($errors, "Email already exists");
		}
	}

    
	$sql = "SELECT username from users where username = '$username' ";
		$result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count != 1) {
			if($psw1==$psw2){
				$password = md5($psw1);
				$sql = "INSERT INTO users (fname, lname, email, username, password) 
						VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
				mysqli_query($conn, $sql) or die($mysqli_error($conn));
				header("Location: index.php?signup=success");
				exit;
			} else if($psw1!=$psw2) {
				header("Location: index.php?signup=failed");
			}
		}
}

//LOGIN
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn,$_POST['logpassword']);


	if(empty($_POST['uname'])){
        array_push($logerrors, "Username is required");
    }
    
    if(empty($_POST['logpassword'])){
		array_push($logerrors, "Password is required");
	}
		
     if(count($logerrors) == 0){
         $password = md5($password);
         $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
         $results=mysqli_query($conn, $query);
         if(mysqli_num_rows($results)==1){
             $_SESSION['username'] = $username;
             header('Location: home.php');
         }else{
             array_push($logerrors, "You have entered an incorrect username and password combination");
         }
     }
}
?>