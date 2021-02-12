<?php

include './employeeManager.php';

switch($_SERVER["REQUEST_METHOD"]){
  case "POST":
    $newEmployee = array(
      'name' => ucfirst($_POST['name']),
      'lastName' => ucfirst($_POST['lastName']),
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
  case "PUT":{
    parse_str(file_get_contents("php://input"), $_PUT);
    $updateEmployee = array(
      'id' => $_PUT['id'],
      'name' => $_PUT['name'],
      'lastName' => $_PUT['lastName'],
      'age' => $_PUT['age'],
      'email' => $_PUT['email'],
      'gender' => $_PUT['gender']
    );
    updateEmployee($updateEmployee);
    break;
  }
}