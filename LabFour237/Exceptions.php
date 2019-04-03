<?php

try {
  throw new Exception('Something terrible happened!', 42);
  //name of the object is $e
} catch (Exception $e) {
  echo "This exception has the following message: " . $e->getMessage() . "</br>";
  echo "This is the line where exception got thrown from: " . $e->getLine() . "</br>";
  echo "This is the file where the exception is coming from: " . $e->getFile() . "</br>";
}

 ?>
