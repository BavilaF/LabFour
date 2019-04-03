<?php

class DataSource { //This is my class DataSource

  public function getSource() : string {
    if (isset($_GET['source'])) {
      return $_GET['source'];
    } else {
      return 'file';
    }
  }

  //This function gets the status
  public function getStatus() : string {
    $source = $this->getSource();
    return "Currently connected to the $source!";
  }

  public function getMovieManager() : MovieManagerInterface {
    $manager = null;
    if ($this->getSource() == 'file') {
      $file = "Logs.txt";
      $manager = new FileMovieManager($file);
    } else if ($this->getSource() == 'database') {
      $Manager = new DatabaseMovieManager('localhost', 'user_web', '12345', 'movie_log');
    }
    return $manager;
  }

  //This function is for the file and databse buttons
  public function buttons() : string {
    $buttons = <<<EOT
    <a class="btn btn-default btn-xs" href="?source=file" role="button">File</a>
    <a class="btn btn-default btn-xs" href="?source=database" role="button">Database</a>
EOT;
return $buttons;
  }

  public function list(string $data) : string {
    $source = ucwords($this->getSource());
    $function = "listFrom$source";
    return $this->$function($data);
  }

  private function listFromFile(string $data) : string {
    /*This sorts and explodes the input array in a table
    *It also makes an edit button.
    */
    $movie = explode("\n", trim($data));
    $table_body = '';
    foreach($movie as $key => $entry) {
      $log = explode('|-|', trim($entry));
      $table_body .='<tr>';
      $table_body .= '<td>' . $log[0] . '</td>';
      $table_body .= '<td>' . $log[1] . '</td>';
      $table_body .= '<td>' . $log[2] . '</td>';
      $table_body .= '<td>' . $log[3] . '</td>';
      $table_body .= '<td>' . $log[4] . '</td>';
      $table_body .= '<td><a href="edit.php?id=' . trim($movie[5]) .'&source=' . $this->getSource() .'" class="btn btn-info btn-sm">Edit</a></td>';
      $table_body .= '</tr>';
    }
    return $table_body;
  }

  private function listFromDatabase(string $data) : string {
    $movie = explode("\n", trim($data));
    $table_body = '';
    foreach($movie as $key => $entry) {
      $log = explode('|-|', trim($entry));
      $table_body .='<tr>';
      $table_body .= '<td>' . $log[0] . '</td>';
      $table_body .= '<td>' . $log[1] . '</td>';
      $table_body .= '<td>' . $log[2] . '</td>';
      $table_body .= '<td>' . $log[3] . '</td>';
      $table_body .= '<td>' . $log[4] . '</td>';
      $table_body .= '<td><a href="edit.php?id=' . trim($movie[5]) .'&source=' . $this->getSource() .'" class="btn btn-info btn-sm">Edit</a></td>';
      $table_body .= '</tr>';
    }
    return $table_body;
  }
}

$dataSource = new DataSource();
//echo $dataSource->getStatus();

 ?>
