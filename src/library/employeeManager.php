<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
//Load the file
$contents = file_get_contents('../../resources/employees.json');
//Decode the JSON data into a PHP array.
$contentsDecoded = json_decode($contents, true);
//set id
$newEmployee['id'] = getNextIdentifier($contentsDecoded);
//Modify Json
array_push($contentsDecoded, $newEmployee);
//Encode the array back into a JSON string.
$json = json_encode($contentsDecoded);
//Save the file.
file_put_contents('../../resources/employees.json', $json);

if(isset($_POST['employeeSubmit'])){
  header('Location: ../employee.php?employee=success');
}
}


function deleteEmployee(string $id)
{
//Load the file
$contents = file_get_contents('../../resources/employees.json');
//Decode the JSON data into a PHP array.
$contentsDecoded = json_decode($contents, true);
//Modify Json delete user
foreach($contentsDecoded as $element){
  if($element['id'] == $id){
    $index = array_search($element,$contentsDecoded);
    array_splice($contentsDecoded,$index , 1);
  }
}
//Encode the array back into a JSON string.
$json = json_encode($contentsDecoded);
//Save the file.
file_put_contents('../../resources/employees.json', $json);
}


function updateEmployee(array $updateEmployee)
{
//Load the file
$contents = file_get_contents('../../resources/employees.json');
//Decode the JSON data into a PHP array.
$contentsDecoded = json_decode($contents, true);
//Update json
foreach($contentsDecoded as &$element){
  if($element['id'] == $updateEmployee['id']){
    //replace array keeping different keys
    $updateEmployee = array_replace($element, $updateEmployee);
    $element = $updateEmployee;
  }
}
//Encode the array back into a JSON string.
$json = json_encode($contentsDecoded);
//Save the file.
file_put_contents('../../resources/employees.json', $json);

header('Location: ../dashboard.php?update=successful');
}


function getEmployee(string $id)
{
//Load the file
$contents = file_get_contents('../../resources/employees.json');
//Decode the JSON data into a PHP array.
$contentsDecoded = json_decode($contents, true);

//get employee info form json
foreach($contentsDecoded as $element){
  if($element['id'] == $id){
    $id = $element['id'];
    $name = $element['name'];
    $lastName = $element['lastName'];
    $email = $element['email'];
    $age = $element['age'];
    $gender = $element['gender'];
    $city = isset($element['city']) ? $element['city'] : '';
    $streetAddress = isset($element['streetAddress']) ? $element['streetAddress'] : '';
    $state = isset($element['state']) ? $element['state'] : '';
    $postalCode = isset($element['postalCode']) ? $element['postalCode'] : '';
    $phoneNumber = isset($element['phoneNumber']) ? $element['phoneNumber'] : '';
    $avatar = isset($element['avatar']) ? $element['avatar'] : '';
    header("Location: ../../src/employee.php?id=$id&name=$name&lastName=$lastName&email=$email&age=$age&gender=$gender&city=$city&streetAddress=$streetAddress&state=$state&postalCode=$postalCode&phoneNumber=$phoneNumber&avatar=$avatar");
  }
}
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
  $counter = count($employeesCollection) + 1;
  return $counter++;
}
