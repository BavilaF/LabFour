<?php
//requires my movieBase.
require("movieBase.php");
//id is empty
$id = null;
//Gets Id through Global variable $_GET
if (isset($_GET) && isset($_GET['id'])) {
  $id = $_GET['id'];
  $movie = $dataSource->getMovieManager()->eadOneById($id); //readOneById function to array
}
//changes the input with the $_POST variable
if (isset($_POST) && !empty($_POST)) {
  extract($_POST);
  $movie = new Movie($movie_name, $directors_name, $artists, $genre, $rating);
  if ($dataSource->getMovieManager()->update($id, $movie)) { //pass in Id and Movie
    header('Location: /MovieList.php');
  }
}

$body = <<<EOT
<div class="container">
  <div class="row">
  <h1 class="text-center">Add Movie Log</h1>

  <form action="" method="POST" class="form-horizontal" novalidate>

    <div class="form-group required">
      <label class="control-label" >Movie Name</label>
      <input type="text" class="form-control" name="movie_name" placeholder="Enter A Movie Name" value="$movie->movie_name" required>
    </div>

    <div class="form-group required">
      <label class="control-label">Director's Name</label>
      <input type="text" class="form-control" name="directors_name" placeholder="Enter Director's Name" value="$movie->directors_name" required>
    </div>

    <div class="form-group">
      <label for="FormControlInput3">Artists (Spaced with no commas)</label>
      <input type="text" class="form-control" name="artists" placeholder="Enter Artist's Name" value="$movie->artists">
    </div>

    <div class="form-group">
      <label for="FormControlSelect">Genre</label>
      <select class="form-control" name="genre" value="$movie->genre">
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
      <input type="radio" name="rating" id="inlineRadio1" value="$movie->rating" > 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio2" value="$movie->rating" > 2
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio3" value="$movie->rating" > 3
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio4" value="$movie->rating" > 4
    </label>
    <label class="radio-inline">
      <input type="radio" name="rating" id="inlineRadio5" value="$movie->rating" > 5
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
