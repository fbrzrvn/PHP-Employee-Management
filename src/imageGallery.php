<!-- TODO If you are going to add the extra feature implement here the image selection as a gallery or whatever you like -->
<?php

include'library/avatarsApi.php';
// array from json
$arrayFromJson =json_decode($response,true);
// new avatar array
$avatarArray =array();
foreach($arrayFromJson as $element){
  echo "<label><input type='radio' name='avatar' value=".$element['photo']."><img src=".$element['photo']." width='100px' /></label>";
}
// print_r($avatarArray);

?>

