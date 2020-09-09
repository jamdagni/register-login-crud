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
            <p style="background:black;color:white;padding:7px;">UPDATE MOVIE</p>
              <form method="post">
                <?php
                  $id = $_GET['e_id'];
                  $query = "SELECT * FROM movie_list WHERE id = $id";
                  $result = mysqli_query($link, $query);
                  if (mysqli_num_rows($result) > 0) :
                    while ($movie_list = mysqli_fetch_assoc($result)):
                 ?>
                <div class="container">
                  <div class="form-group">
                    <input type="text" class="form-control offset-md-3 col-md-6" name="u_movie" value="<?php echo $movie_list['movie'] ?>" placeholder="movie" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control offset-md-3 col-md-6" name="u_year" value="<?php echo $movie_list['year'] ?>" placeholder="year" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control offset-md-3 col-md-6" name="u_actor" value="<?php echo $movie_list['actor'] ?>" placeholder="actor" required>
                  </div>
                  <div class="form-group" required>
                    <select class="form-control col-md-6 custom-select" name="u_rating" value="<?php echo $movie_list['rating']?>" required>
                      <option value="">--Rating--</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                    </select>
                  </div>
                  <div class="col-md-6 offset-md-3">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                  </div>
              </div>
              <?php endwhile;?>
            <?php endif;?>
            </form>
        </div>
      </div>
    </div>

    <?php
      if (isset($_POST['update'])) {
        $movie = $_POST['u_movie'];
        $year = $_POST['u_year'];
        $actor = $_POST['u_actor'];
        $rating = $_POST['u_rating'];

        $query = "UPDATE movie_list SET movie='$movie', year='$year', actor='$actor', rating='$rating' WHERE id='$id'";
        if (mysqli_query($link, $query)) {
          header('location:index.php');
        }else {
          mysqli_errno($link);
        }
      }
     ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
