<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
//if user isn't logged in, can't access the dashboard and redirects to index
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../../index.php");
}
readfile('../assets/html/header.html');
readfile('../assets/html/footer.html');

?>