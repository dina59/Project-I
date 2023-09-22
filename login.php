<?php
session_start();

include("connections.php");
include("functions.php");

$user_data=check_login($con);

?>


<html>
    <head>
        <title>My Website</title>
    </head>
    <body>
      <a href="logout.php">Logout</a>
      <p>Hello, <? echo $user_data['user_name']; ?></p>
    </body>
</html>