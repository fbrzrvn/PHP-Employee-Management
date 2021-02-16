<?php
include 'library/loginManager.php';

if(time() - $_SESSION['loginTime'] > $_SESSION['timer']){
  logout();
}