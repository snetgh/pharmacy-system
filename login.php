<?php
session_start();
require_once 'db.php';

    if (isset($_POST['login'])) {
    $user_username = $_POST['txt_username'];
    $user_password = $_POST['txt_password'];

    if (!isset($user_username) && !isset($user_password)) {
      echo "<script>alert('Please Fill All Spaces');window.location.href='login.php';</script>";
    } else {
       // $password = md5($password);
        $result = mysqli_query($connection,"SELECT * FROM `users_table` WHERE user_username = '$user_username' LIMIT 1");
       
        if (mysqli_num_rows($result) >= 1) {
            $user = mysqli_fetch_assoc($result);
            $get_password = $user['user_pass'];
           if(password_verify($user_password,$get_password)){
    
            $get_id = $user['users_table_id'];
            $user_name = $user['user_name'];

            setcookie("i", $get_id, time() + (86400 * 30),"/");
            setcookie("n", $user_name, time() + (86400 * 30),"/");
        
            echo "<script>window.location.href='manager/index.php?dashboard'</script>";

           }else{
            echo "<script>alert('Wrong Password Entered');window.location.href='login.php';</script>";
           }
           
        } else {
          echo "<script>alert('User Not Found');window.location.href='login.php';</script>"; 
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="main.css">
<!--=============================================================================================== -->
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="img/img-01.png" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="post">
          <span class="login100-form-title">
            Member Login
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="txt_username" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="txt_password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="login">
              Login
            </button>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="#">
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="js/lib/jquery-2.1.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="main.js"></script>

<!--===============================================================================================-->
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--=============================================================================================== -- >

</body>
</html>