3<?php
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
          <table class="table table-dark">
            <p style="background:black;color:white;padding:7px;">MOVIE DETAIL</p>
            <tbody>

              <?php
                $id = $_GET['e_id'];
                $query = "SELECT * FROM movie_list WHERE id = '$id'";
                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0):
                  while ($movie_list = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <th>MOVIE</th>
                <td><?php echo $movie_list['movie']; ?></td>
              </tr>
              <tr>
                <th>YEAR</th>
                <td><?php echo $movie_list['year']; ?></td>
              </tr>
              <tr>
                <th>ACTOR</th>
                <td><?php echo $movie_list['actor']; ?></td>
              </tr>
              <tr>
                <th>RATING</th>
                <td><?php echo $movie_list['rating']; ?></td>
              </tr>
              <tr>
                <th>
                  <a href="#" class="btn btn-warning">Edit</a>
                  <a href="employee_del.php?e_id=<?php echo $movie_list['id']?>" class="btn btn-danger">Delete</a>
                </th>
              </tr>
              <?php endwhile; ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
