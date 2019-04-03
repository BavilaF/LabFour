<?php
//links the movieBase file
require("movieBase.php");

//Extracts using the $_GET variable
extract($_GET);

/**
*This will strip and remove any extra space from input.
*It uses an if statement to requires 3 contents in order to writeToFile.
*/
if (!empty($movie_name) && !empty($directors_name) && !empty($rating)) {
  $movie = new Movie($movie_name, $directors_name, $artists, $genre, $rating);

  try {
    //If writing to file did not work...
    @$dataSource->getMovieManager()->create($movie); //@ will suppress any errors
    $alert = new Alert("Success! Information saved to the" . $dataSource->getSource() . "!", 'success');
    //$message = sprintf("$alert", 'success', 'Success! Information saved.');
    } catch (FileOpenException $e) {
    $message = $e;
    }  catch (FileWriteException $e) {
    $message = $e;
    } catch (FileCloseException $e) {
    $message = $e;
    } catch (Exception $e) {
    $message = $e->getMessage();
    }
} else {
  $alert = new Alert("ERROR! Movie name, Directors name, and rating are required!", 'danger');
  $message = $alert->show();
  //$message = sprintf("$alert", 'danger', 'ERROR! Movie name, Directors name, and rating are required!');
}


$body = <<<EOT
<div class="container">
  <div class="row">
    $message
  </div>
</div>
EOT;
$htmlPage->setBody($body);
$htmlPage->printPage();
?>
