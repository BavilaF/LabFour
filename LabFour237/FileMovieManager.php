<?php
//requires the MovieManagerInterface
require ("MovieManagerInterface.php");

//class implements the other
class FileMovieManager implements MovieManagerInterface {

  private $file = '';

  function __construct(string $file) {
    $this->file = $file;
  }

  /**
  * This is the file in going to write the movie information. It will also open
  * my Logs.txt file and will append. It will also have a boolean function which
  * will tell true or false.
  * @param Movie $movie
  * @return bool
  */
  function create(Movie $movie) : bool {
    $fp = fopen($this->file, 'ab');
        if (!$fp) {
          throw new FileOpenException(); //does not need to pass anything
          //return false;
        }
        $content = "$movie->movie_name,$movie->directors_name,$movie->artists,$movie->genre,$movie->rating\n";
        if (!fwrite($fp, $content)) {
          throw new FileWriteException(); //does not need to pass anything
          //return false;
        }
        if (!fclose($fp)) {
          throw new FileCloseException(); //does not need to pass anything
          //return false;
        }
        return true;
  }

  function read()  : string {
    if (($list = file_get_contents($this->file)) == false) {
      throw new FileOpenException();
    }
    return $list;
  }

  function readOneById(int $id) : Movie {
    return null;
  }

    /**
     * @param int $id
     * @param Movie $movie
     * @return bool
     */
    function update(int $id, Movie $movie) : bool {
      return true;
  }
}

//$file = "Logs.txt";
//$fileMovieManager = new FileMovieManager($file);

  ?>
