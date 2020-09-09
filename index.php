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
    <div class="table-responsive-md container empcol">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item color">Options</li>
            <li class="list-group-item"><a href="add_new.php">Add new</a></li>
            <li class="list-group-item"><a href="index.php">View all</a></li>
          </ul>
        </div>
        <div class="table-responsive col-md-9">
          <table class="my-table table-dark">
            <p style="background:black;color:white;padding:7px;">Movies List</p>
            <thead>
              <tr>
                <th>MOVIE</th>
                <th>YEAR</th>
                <th>ACTOR</th>
                <th>RATINGS</th>
                <th>Operation</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM movie_list";
                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0):
                  while ($movie_list = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <th><?php echo $movie_list['movie']; ?></th>
                <td><?php echo $movie_list['year']; ?></td>
                <td><?php echo $movie_list['actor']; ?></td>
                <td><?php echo $movie_list['rating']; ?></td>
                <td>
                  <a href="single_employee.php?e_id=<?php echo $movie_list['id'];?>" class="btn btn-info">Details</a>
                  <a href="employee_update.php?e_id=<?php echo $movie_list['id']; ?>" class="btn btn-warning">Edit</a>
                  <a href="employee_del.php?e_id=<?php echo $movie_list['id'];?>" class="btn btn-danger">Delete</a>
                </td>
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
