<?php

require("movieBase.php");

$dataSourceStatus = $dataSource->getStatus();
$buttons = $dataSource->buttons();
$source = $dataSource->getSource();

$body = <<<EOT
<div class="container">
  <div class="row">
  <p class="bg-info">$dataSourceStatus</p>
    $buttons
  <h1 class="text-center">Add Movie Log</h1>

  <form action="Assignment1Php.php" method="GET" class="form-horizontal" novalidate>
    <input type="hidden" name="source" value=$source>

    <div class="form-group required">
      <label class="control-label" >Movie Name</label>
      <input type="text" class="form-control" name="movie_name" placeholder="Enter A Movie Name" required>
    </div>

    <div class="form-group required">
      <label class="control-label">Director's Name</label>
      <input type="text" class="form-control" name="directors_name" placeholder="Enter Director's Name" required>
    </div>

    <div class="form-group">
      <label for="FormControlInput3">Artists (Spaced with no commas)</label>
      <input type="text" class="form-control" name="artists" placeholder="Enter Artist's Name">
    </div>

    <div class="form-group">
      <label for="FormControlSelect">Genre</label>
      <select class="form-control" name="genre">
        <option>Please Select...</option>
        <option>Action</option>
        <option>Crime</option>
        <option>Horror</option>
        <option>Comedy</option>
        <option>Not Listed</option>
      </select>
    </div>

    <div class="form-group required">
      <label for="FormControlInput4">Rating</label>
    </div>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio1" value="1 stars"> 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio2" value="2 stars"> 2
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio3" value="3 stars"> 3
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio4" value="4 stars"> 4
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio5" value="5 Stars"> 5
    </label>

    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  </div>
</div>
EOT;
$htmlPage->setBody($body);
$htmlPage->printPage();

?>
