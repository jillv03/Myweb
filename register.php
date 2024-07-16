<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

        include("config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

        $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

        if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                <p> This email is used, Try another One Please!</p>
                </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn1'>Go back</button>";
        }
        else{
            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Error Occured");

            echo "<div class='message'>
            <p>Registration Successfully!</p>
            </div> <br>";
            echo "<a href='index.php'><button class='btn2'>Go back</button>";
        }
        }else {

        ?>
            
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="inputfield">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>   
                </div>

                <div class="inputfield">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>   
                </div>

                <div class="inputfield">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>   
                </div>

                <div class="inputfield">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>   
                </div>

                <div class="inputfield">
                    <input class="btn" type="submit" name="submit" value="Register now" required>
                </div>

                <div class="links">
                    Have an account already? <a href="index.php">Sign in now!</a>
                </div>
            </form> 
            
        </div>
        <?php } ?>
    </div>
    
</body>
</html>