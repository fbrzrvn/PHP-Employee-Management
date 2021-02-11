<!-- TODO Employee view -->
<?php
//if user isn't logged in, can't access the dashboard and redirects to index
session_start();
if(!isset($_SESSION['userId'])){
  header("Location: ../../index.php");
}

readfile('../assets/html/header.html');
readfile('../assets/html/employeeform.html');
readfile('../assets/html/footer.html');

?>