<?php

class Alert { //This is my Alert Class
  private $message = '';
  private $type = '';
  private $alert = '<div class="alert alert-%s" role="alert">%s</div>';

  //Function construction
  function __construct($message, $type) {
    $this->message = $message;
    $this->type = $type;
  }
  //Function show()
  public function show() {
    return sprintf("$this->alert", $this->type, $this->message);
  }
}

 ?>
