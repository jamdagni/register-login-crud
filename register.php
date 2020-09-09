
<?php require 'link.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php //require 'alert.php';?>

    <form method="post">
      <div class="container">
        <h2 class="ta">Registration</h2>
        <div class="form-group">
          <input type="text" class="form-control offset-md-3 col-md-6" name="u_name" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control offset-md-3 col-md-6" name="email" placeholder="Email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          <small class="form-text text-muted offset-md-3" >We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <input type="password" class="form-control offset-md-3 col-md-6" name="password" placeholder="Password" id="exampleInputPassword1" required>
        </div>
        <div class="col-md-6 offset-md-3 sb">
          <button type="submit" name="submit" class="btn">Register</button>
          <a href="login.php" class="btn" >Login</a>
        </div>
      </div>
    </form>
    <?php
      if (isset($_POST['submit'])) {
       $u_name = $_POST['u_name'];
       $email = $_POST['email'];
       $password = $_POST['password'];


       $query = "INSERT INTO registration (username,email,password) VALUES ('$u_name','$email','$password')";

       if (mysqli_query($link, $query)) {
         echo "Registered successfully";
         header('refresh:1; login.php');
       }else {
         echo "regitration unsuccessful";
       }
     }
     ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
