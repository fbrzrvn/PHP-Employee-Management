<?php
include 'library/loginManager.php';

if(time() - $_SESSION['loginTime'] > 600){
  logout();
}