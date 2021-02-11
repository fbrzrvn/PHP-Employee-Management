<?php

include './employeeManager.php';

switch($_SERVER["REQUEST_METHOD"]){
  case "POST":
    $newEmployee = array(
      'id' => $_POST['id'],
      'name' => $_POST['name'],
      'lastName' => $_POST['lastName'],
      'age' => $_POST['age'],
      'email' => $_POST['email'],
      'gender' => $_POST['gender']
    );
    addEmployee($newEmployee);
    break;
  case "DELETE":{
    parse_str(file_get_contents("php://input"), $_DELETE);
    deleteEmployee($_DELETE['id']);
    break;
  }
}