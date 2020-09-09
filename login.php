<?php require 'link.php';
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php //require 'alert.php';?>
    <form method="post">
      <div class="container">
        <h2 class="ta">Login</h2>
        <div class="form-group">
          <input type="text" class="form-control offset-md-3 col-md-6" name="u_name" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control offset-md-3 col-md-6" name="password" placeholder="Password" id="exampleInputPassword1">
        </div>
        <div class="col-md-6 offset-md-3 sb">
          <button type="submit" name="submit" class="btn" >Login</button>
            <a href="register.php" class="btn">Register</a>
        </div>
      </div>
    </form>
    <?php
      if (isset($_POST['submit'])) {
        $u_name = $_POST['u_name'];
        $password = $_POST['password'];

        $query = "SELECT * FROM Registration WHERE username = '$u_name'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($authenticate = mysqli_fetch_assoc($result)) {
            if ($u_name == $authenticate['username'] && $password == $authenticate['password']) {
              $_SESSION['u_name'] = $u_name;
              header('refresh:1; index.php');
            }else {
              echo "Enter correct password";
            }
          }
        }else {
          echo "<script>alert('You are not registered user')</script";
          header('location: register.php');
        }
      }
     ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
