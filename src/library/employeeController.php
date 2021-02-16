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
    if(isset($_POST['id']) && $_POST['id']>0){
      $updateEmployee = array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'lastName' => $_POST['lastName'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'gender' => $_POST['gender'],
        'city' => isset($_POST['city']) ? $_POST['city'] : '',
        'streetAddress' => isset($_POST['streetAddress']) ? $_POST['streetAddress'] : '',
        'state' => isset($_POST['state']) ? $_POST['state'] : '',
        'postalCode' => isset($_POST['postalCode']) ? $_POST['postalCode'] : '',
        'phoneNumber' => isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '',
        'avatar' => isset($_POST['avatar']) ? $_POST['avatar'] : ''
      );
      updateEmployee($updateEmployee);
    }
    else{
      $newEmployee = array(
        'id' => "",
        'name' => $_POST['name'],
        'lastName' => $_POST['lastName'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'gender' => $_POST['gender'],
        'city' => isset($_POST['city']) ? $_POST['city'] : '',
        'streetAddress' => isset($_POST['streetAddress']) ? $_POST['streetAddress'] : '',
        'state' => isset($_POST['state']) ? $_POST['state'] : '',
        'postalCode' => isset($_POST['postalCode']) ? $_POST['postalCode'] : '',
        'phoneNumber' => isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '',
        'avatar' => isset($_POST['avatar']) ? $_POST['avatar'] : ''
      );
      addEmployee($newEmployee);
    }
    break;
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