<?php
/**
* This gets the file and all the contents of fileLog showing  all the input
*in a new page.
*/
require("movieBase.php");

$dataSourceStatus = $dataSource->getStatus();
$buttons = $dataSource->buttons();

try {
  $data = @$dataSource->getMovieManager()->read(); //Suppress the warning with @
  $table_body = $dataSource->list($data);
} catch (FileOpenException $e) {
  $table_body = $e;
} catch (Exception $e) {
  $table_body = $e->getMessage();
}

$body = <<<EOT
<div class="container">
  <div class="table-responsive">
  <p class="bg-info">$dataSourceStatus</p>
    $buttons
    <table class="table">
      <thead>
        <tr>
          <th>Movie Name</th>
          <th>Director's Name</th>
          <th>Artists</th>
          <th>Genre</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        $table_body
      </tbody>
    </table>
  </div>
</div>
EOT;
$htmlPage->setBody($body);
$htmlPage->printPage();

?>
