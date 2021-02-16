<?php
//login function
function login(){
  //get json file
  $JSON = file_get_contents("../../resources/users.json");
  //decode to create json array of users
  $arrayJSON = json_decode($JSON, true);
  //users array
  $users = $arrayJSON['users'];
  //get email user inserted
  $email = $_POST['email'];
  //get password user inserted
  $password = $_POST['password'];

  //if any of the input fields is empty
  if (empty($email) || empty($password)){
    //redirect to index with error
    header("Location: ../../index.php?error=emptyFields");
    exit();
  }
  //redirect to index with error
  else{
    foreach($users as $user){//check for each user if email and password is a math
      if($email== $user["email"] && password_verify($password, $user["password"])){
        //log in succesfull, create session
        session_start();
        $_SESSION['userId'] = $user["userId"];
        $_SESSION['name'] = $user["name"];
        $_SESSION['loginTime'] = time();
        $_SESSION['timer'] = 600;
        //redirect to dashboard
        header("Location: ../../src/dashboard.php");
        exit();
      }
      else{ //if error sent back to index
        header("Location: ../../index.php?error=wrongCredentias");
        exit();
      }
    }
  }
}
//log out function
function logout(){
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../../index.php?logout");
}