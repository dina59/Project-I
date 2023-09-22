<!DOCTYPE html>
<html>
    <head>
    <style>
        .error{color:FF0000;}
    </style>
</head>
<body>
<?php
$nameErr=$emailErr=$genderErr=$websiteErr="";
$name=$email=$gender=$comment=$website="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
            if(empty($_POST['name'])){
            $nameErr="Name is required";
            }else
               {   
               $name=test_input($_POST['name']);
               if (!preg_match("/^[a-zA-Z]*$/",$name)){
               $nameErr="Only letters and white spaces allowed";
               } 
        }

        if(empty($_POST['email']))
        {
           $emailErr="Email is required";
        }else{ 
        $email=test_input($_POST['email']);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr="Invalid email format";
        }
        }
        
        if(empty($_POST['gender']))
        {
            $genderErr="Gender is required";
        }
        else
        {
            $gender=test_input($_POST['gender']);
        }
    } 
    

        <p><span class="error">*required field.</span></p>
        <form method="post" action=
            "<?php echo
              htmlspecialchars($_SERVER['PHP_SELF']);
             ?>"> 
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class ="error">*<?php echo $nameErr;?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class ="error">*<?php echo $emailErr;?></span>
        <br><br>
        Gender: <input type="radio" name="gender" <?php if(isset($gender)&& $gender=="female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if(isset($gender)&& $gender=="male") echo "checked"; ?> value="male">Male
        <span class ="error">*<?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>"
        echo $email;
        echo "<br>"
        echo $gender;
        echo "<br>"
        ?>
        
</body>
</html>