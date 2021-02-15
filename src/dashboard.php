<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
//if user isn't logged in, can't access the dashboard and redirects to index
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../../index.php");
}
include 'library/sessionHelper.php';
readfile('../assets/html/header.html');

if(isset($_GET['update'])){
  echo '<div class="alert alert-success alert-dismissible fade show message">
  <strong>Update!</strong> Employee has been updated.
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>';
}
?>
  <div id="message"></div>
  <div id="jsGrid" class="jsGrid-table"></div>

<?php

readfile('../assets/html/footer.html');

?>