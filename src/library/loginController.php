<?php
include 'loginManager.php';
if(isset($_POST['login'])){
  login();
}else if(isset($_POST['logout'])){
  logout();
}