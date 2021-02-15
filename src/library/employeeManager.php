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

//check if email exists
foreach($contentsDecoded as $element){
    if($element['email'] == $newEmployee['email']){
      return "hola";
    }
    else{
      //set id
      $newEmployee['id'] = getNextIdentifier($contentsDecoded);
      //Modify Json
      array_push($contentsDecoded, $newEmployee);
      //Encode the array back into a JSON string.
      $json = json_encode($contentsDecoded);
      //Save the file.
      file_put_contents('../../resources/employees.json', $json);
    }
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
}


function getEmployee(string $id)
{
// TODO implement it
header("Location: ../../src/employee.php?=$id");
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
