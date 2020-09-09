<?php
  session_start();
  if (!$_SESSION['u_name']) {
    header('location:login.php');
  }
  require 'link.php';
 ?>


 <?php
  $id = $_GET['e_id'];
  $query = "DELETE FROM movie_list where id = $id";
  if (mysqli_query($link, $query)) {
    header('location: index.php');
  }else {
    echo "Error occured";
  }
  ?>
