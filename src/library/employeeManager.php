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

//Modify Json
array_push($contentsDecoded, $newEmployee);

//Encode the array back into a JSON string.
$json = json_encode($contentsDecoded);

//Save the file.
file_put_contents('../../resources/employees.json', $json);
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
// TODO implement it
}


function getEmployee(string $id)
{
// TODO implement it
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
// TODO implement it
}
