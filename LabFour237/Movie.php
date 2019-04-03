<?
//My class movie with variables
class Movie {
  private $movie_name = '';
  private $directors_name= '';
  private $artists = '';
  private $genre = '';
  private $rating = '';

//One way of setting and getting the movie information, through a constructor.
  function __construct($movie_name, $directors_name, $artists, $genre, $rating) {
    $this->setMovieName($movie_name);
    $this->setDirectorsName($directors_name);
    $this->setArtists($artists);
    $this->setGenre($genre);
    $this->setRating($rating);
  }
//A second way of getting and setting informations, through accesors __get and __set.
  function __get($attr_name) {
    return $this->$attr_name;
  }

  function __set($attr_name, $value) {
    $function = "set$attr_name";
    $this->$function($value);
  }

  //This implements the setter function
  function setMovieName($movie_name) {
    $this->movie_name = trim($movie_name);
  }

  function setDirectorsName($directors_name) {
    $this->directors_name = trim($directors_name);
  }

  function setArtists($artists) {
    $this->artists = trim($artists);
  }

  function setGenre($genre) {
    $this->genre = trim($genre);
  }

  function setRating($rating) {
    $this->rating = trim($rating);
  }
}

?>
