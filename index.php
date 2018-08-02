<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
  		<link rel="stylesheet" type="text/css" href="css/style.css">
        <link type="image/png" rel="icon" href="pictures/DOST LOGO.png">

        
    </head>

    <body>
        <div class="topnav">
            <img src="pictures/csfBG.png" class="csfBG">
            <a id="loginbtn" class="modalbtn"> Login</a>
            <a id="regisbtn" class="modalbtn"> Register</a>
            <?php include('errors.php'); ?>
            <?php include('logerrors.php'); ?>
        </div>

        <div class="container1">  

           
                <img class="slides" src="pictures/1.jpg" style="width:100%">
            
                <img class="slides" src="pictures/2.jpg" style="width:100%">
            
                <img class="slides"  src="pictures/4.jpg" style="width:100%">
           
        </div>
        
        <div class="modal" id="themodal">
            <div class="modal-content">
                 <span class="close">&times;</span>
                    <form method="post" action="index.php"> 
                
                    <div class="logindiv">
                        <div class="loginpic">
                        <img src="pictures/login.png" class="circle">
                    </div>
                        <?php include('logerrors.php'); ?>
                        <label>
                            Username:
                            <input type="name" name="uname" placeholder="Enter username" required>
                        </label>
                        <label>
                        Password: 
                                <input type="password" name="logpassword" placeholder="Enter password" required>
                        </label><br>
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label><br>
                        <button type="submit" id="btn1" name="login">Login</button>
                        <input type="reset" name="reset">
                    </div>
                        <div class="loginfooter">
                            <h3>DOST-CAR</h3>
                        </div>
                </form>

            </div>
        </div>

        <div class="modal" id="themodal2">
            <div class="modal-content">
                 <span class="close">&times;</span>
                    <form method="post" action="index.php">
                        
                    <div class="logindiv">
                        <div class="loginpic">
                        <img src="pictures/login.png" class="circle">
                        </div>
                    <?php include('errors.php'); ?>
                        <label>
                            First Name:
                            <input type="name" name="fname"  placeholder="Enter first name" id="fname" required>
                        </label>
                        <label>
                           Last Name:
                            <input type="name" name="lname"  placeholder="Enter last name" id="lname" required>
                        </label>
                        <label>
                           Email Address:
                            <input type="email" name="email" placeholder="Enter email address" id="email" required>
                        </label>
                        <label>
                           Username:
                            <input type="name" name="username"  placeholder="Enter username" id="username" required minlength="5">
                        </label>
                        <label>
                        Password: 
                                <input type="password" name="password" placeholder="Enter password" id="password" required minlength="8">
                        </label>
                        <label>
                        Confirm Password: 
                                <input type="password" name="repassword" placeholder="Re-enter password" id="repassword" required minlength="8">
                        </label>
                        
                        <button type="submit" id="btn2" name="register">Register</button>
                        <input type="reset" name="reset">
                    </div>
                        <div class="loginfooter">
                            <h3>DOST-CAR</h3>
                        </div>
                </form>

            </div>
        </div>

        <script type="text/javascript">
        	function openModal(){
                modal.style.display = 'block';
            }

            function openModal2(){
                modal2.style.display = 'block';
            }

            function closeModal(){
                modal.style.display = 'none';
            }

            function closeModal1(){
                modal2.style.display = 'none';
            }

            function clickOutside(e){
            	if(e.target == modal){
            		modal.style.display = 'none';
            	}else if (e.target == modal2){
            		modal2.style.display= 'none';
            	}
            }

           
            var modal = document.getElementById('themodal');
            var modal2 = document.getElementById('themodal2');
            var logbtn = document.getElementById('loginbtn');
        	var regbtn = document.getElementById('regisbtn');
        	var closebtn1 = document.getElementsByClassName('close')[0];
            var closebtn2 = document.getElementsByClassName('close')[1];


            logbtn.addEventListener('click', openModal);
            regbtn.addEventListener('click', openModal2);
            closebtn1.addEventListener('click', closeModal);
            closebtn2.addEventListener('click', closeModal1);
            window.addEventListener('click', clickOutside);
            
            
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("slides");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 3000); // Change image every 2 seconds
        }

        </script>

        
      
    </body>
</html>