<?php

//requires both my FileMovieManager and movie
require("Movie.php");
require("FileMovieManager.php");
require("HTMLpage.php");
require("Alert.php");
require("FileOpenException.php");
require("FileWriteException.php");
require("FileCloseException.php");
require("DatabaseMovieManager.php");
require("DataSource.php");
require("movieCredentials.php");

//The funtion array
function printArray(array $array) {
  echo '<pre>' . print_r($array, true) . '</pre>';
}

?>
