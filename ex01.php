<?php
  $mess = 'hi php language';
  $var = 14;

  echo "<br>".$var;
  echo "<br>".$mess;

  $x = 5;
  $y = 10;
  echo "<br>.$x + $y";

  $concat = $x; //convert integer

  // condition
  $day = "sunday";
  if ($day == "sunday") {
    echo "its sunday";
  }else{
    echo "its not sunday";
  }

  $favorFood = "pizza";

  switch ($favorFood) {
    case 'pizza':
      break;
    case 'apple':
      break;
    case 'hamberger':
      break;
    default:
      break;
  }

  // loop

  $l = 1;
  while ($l <= 10) {
    echo "this is number while: $l \n";
    $l++;
  }

  do {
    echo "this is number do while: $l \n";
    $l++;
  } while ($l <= 10);

  $students = array("a","b","c");
  foreach ($students as $student) {
    echo "$student \n";
  }

  // error all
  error_reporting(0);
  error_reporting(E_ALL);
  //warning
  error_reporting(E_WARNING);

?>