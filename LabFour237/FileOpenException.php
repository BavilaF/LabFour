<?php

class FileOpenException extends Exception {

  public function __toString() { //toString takes no parameters
    $alert = new Alert('File could not be opened.', 'danger');
    return $alert->show(); //returns a string
  }


}


 ?>
