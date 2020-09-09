<?php
  session_start();
  if (!$_SESSION['u_name']) {
    header('location: login.php');
  }
 ?>
<?php require 'link.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <nav class="navbar">
      <h4>Hello, <?php echo $_SESSION['u_name']; ?></h3>
      <form class="form-inline">
        <a href="logout.php" class="navbar-brand">Log out</a>
      </form>
    </nav>
    <div class="container empcol">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item color">Options</li>
            <li class="list-group-item"><a href="add_new.php">Add new</a></li>
            <li class="list-group-item"><a href="index.php">View all</a></li>
          </ul>
        </div>
        <div class="col-md-9">
            <p style="background:black;color:white;padding:7px;">Add Movie</p>
              <form method="post">
                <div class="container">
                  <div class="form-group">
                    <input type="text" class="form-control offset-md-3 col-md-6" name="movie" placeholder="movie" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control offset-md-3 col-md-6" name="year" placeholder="year" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control offset-md-3 col-md-6" name="actor" placeholder="actor" required>
                  </div>
                  <div class="form-group" required>
                    <select class="form-control col-md-6 custom-select" name="rating">
                      <option value="">--Rating--</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                    </select>
                  </div>
                  <div class="col-md-6 offset-md-3">
                    <button type="submit" name="submit" class="btn btn-success">Add</button>
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>

    <?php
      if (isset($_POST['submit'])) {
        $movie = $_POST['movie'];
        $year = $_POST['year'];
        $actor = $_POST['actor'];
        $rating = $_POST['rating'];

        $query = "INSERT INTO movie_list(movie,year,actor,rating) VALUES('$movie','$year','$actor','$rating')";

        if (mysqli_query($link, $query)) {
          echo "<html><div class='alert alert-primary' role='alert'>This is a primary alert—check it out!</div></html>";
          header('refresh:1; index.php');
        }else {
          echo mysqli_errno($link);
        }
      }
     ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
