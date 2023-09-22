<?php
    
    session_start();

    include("adminconnection.inc.php");
    include("adminfunctions.inc.php");
   
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //Something was posted
        $user_name=$_POST['user_name'];
        $password=$_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id=random_num(20);
            $query="insert into admin_use4(user_id,user_name,password) values('$user_id','$user_name','$password')";
            
            mysqli_query($con,$query);
            header("Location:adminlogin.php");
            die;
        }else{
            echo "Please enter some valid information!";
        }

    }
?>

<!DOCTYPE html>
        <head>
        <meta charset="UTF-8">
        <title>Admin Login form</title>
        <link rel="stylesheet" href="style.css">
        </head>
         <body>
	     <div class="container">
		<h1 class="label">SignUp</h1>
		<form class="login_form"  method="post" name="form" onsubmit="return validated()">
			<div class="font">Username</div>
			<input type="text" name="user_name">
			<div id="uname_error">Please fill up your Username with atleast 9 characters</div>
			<div class="font font2">Password</div>
			<input type="password" name="password">
			<div id="pass_error">Please fill up your Password with atleast 6 characters</div>
			<button type="submit">Admin SignUp</button>
            <a href="adminlogin.php">Click to Admin Login</a><br><br>
		</form>
	</div>	
	<script src="script.js"></script>
</body>
</html>