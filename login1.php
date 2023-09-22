<?php
 session_start();

 include("connections.php");
 include("functions.php");

 if($_SERVER['REQUEST_METHOD']=="POST")
 {
     //Something was posted
     $user_name=$_POST['user_name'];
     $password=$_POST['password'];

     if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
     {
         //read from database
         $query="select * from users where user_name='$user_name' limit 1";
         $result=mysqli_query($con,$query);

         if($result)
         {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if ($user_data['password']===$password)
                {
                    $_SESSION['user_id']=$user_data['user_id'];
                    header("Location:displaypage.html");
                    die;
                }
            }
         }
         echo "Wrong username or password!";
         
     }else{
        echo "Please enter some valid information!";
    }

 }

?>



        <!DOCTYPE html>
        <head>
        <meta charset="UTF-8">
        <title>Login form</title>
        <link rel="stylesheet" href="userstyle.css">
        </head>
         <body>
	     <div class="container">
		<h1 class="label">User Login</h1>
		<form class="login_form"  method="post" name="form" onsubmit="return validated()">
			<div class="font">Username</div>
			<input type="text" name="user_name">
			<div id="uname_error">Please fill up your Username</div>
			<div class="font font2">Password</div>
			<input type="password" name="password">
			<div id="pass_error">Please fill up your Password</div>
			<button type="submit">Login</button>
            <a href="signup.php">Click to signup</a><br><br>
		</form>
	</div>	
	<script src="valid.js"></script>
</body>
</html>