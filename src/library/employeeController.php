<?php



switch($_SERVER["REQUEST_METHOD"]){
  case "GET":
    require ('./employeeManager.php');
    if(isset($_GET['id'])){
      getEmployee($_GET['id']);
    }
    break;
  case "POST":
    include './employeeManager.php';
    $newEmployee = array(
      'name' => $_POST['name'],
      'lastName' => $_POST['lastName'],
      'age' => $_POST['age'],
      'email' => $_POST['email'],
      'gender' => $_POST['gender']
    );
    addEmployee($newEmployee);
    break;
  }
  case "DELETE":{
    include './employeeManager.php';
    parse_str(file_get_contents("php://input"), $_DELETE);
    deleteEmployee($_DELETE['id']);
    break;
  }
  case "PUT":{
    include './employeeManager.php';
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