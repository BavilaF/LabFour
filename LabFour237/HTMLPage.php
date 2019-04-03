<?php

class HTMLPage {

  private $head = <<<EOT
  <head>
    <meta charset="utf-8">
    <title>Movie Log</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="movieStyle.css">
  </head>
EOT;
  private $body = '';
  private $nav = <<<EOT
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="MainAssign1.php">
          Movie Logs
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="MainAssign1.php">Add Movies</a></li>
        <li><a href="MovieList.php">List Movies</a></li>
        <li><a href="characters.php">Characters</a></li>
      </ul>
    </div>
  </nav>
EOT;

  function setHead($head) {
    $this->Head->$head;
  }

  function setNav($nav) {
    $this->nav = $nav;
  }

  function setBody($body) {
    $this->body = <<<EOT
    <body class="image">
      $this->nav
      $body
    </body>
EOT;
  }

  function printPage() {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
    $this->head
    $this->body
    </html>
EOT;
  }
}

$htmlPage = new HTMLPage();

?>
