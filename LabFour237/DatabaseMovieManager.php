<?php

class DatabaseMovieManager implements MovieManagerInterface { //This is my class DatabaseMovieManager, which implements MovieManagerInterface

  private $connection = null;
  private $host = '';
  private $username = '';
  private $passwd = '';
  private $dbname = '';

  //This function construct implements the $host, $usernamer, $passwd, and $dbname
  function __construct(string $host, string $username, string $passwd, string $dbname) {
  $this->host = $host;
  $this->username = $username;
  $this->passwd = $passwd;
  $this->dbname = $dbname;
}

  //Function connects to the database
  private function connect() {
    $this->connection = new mysqli($this->host, $this->username, $this->passwd, $this->dbname);
    if ($this->connection->connect_error) {
      echo 'Error connection to ' . $this->dbname . '. ' . $this->connection->connect_errno . ': ' . $this->connection->connect_error;
      exit;
    }
  }

  //Function disconnects from the database
  private function disconnect() {
    if ($this->connection) {
      $this->connection->close();
    }
  }

  //This function tests the connection
  function testConnection() {
    $this->connect();
    echo "Success! Connection established to the database $this->dbname!";
    $this->disconnect();
  }

  //This functions creates a new movie
  function create(Movie $movie) : bool {
    $this->connect();
    $query = "INSERT INTO movie (movie_name, director, artists, genre, rating) VALUES (?, ?, ?, ?, ?)";
    $statement = $this->connection->prepare($query);
    $movie_name = $movie->movie_name;
    $director = $movie->director;
    $artists = $movie->artists;
    $genre = $movie->genre;
    $rating = $movie->rating;
    $statement->bind_param('ssssi', $movie_name, $director, $artists, $genre, $rating);
    $statement->execute();
    $this->disconnect();
    if ($statement->affected-rows > 0) {
      return true;
    }
    return false;
  }

  //This functions reads from the database
  function read() : string {
    $this->connect();
    $query = "SELECT * FROM movie";
    $statement = $this->connection->prepare($query);
    $statement->execute();
    $statement->bind_result($id, $movie_name, $director, $artists, $genre, $rating);
    $returnString = '';
    while($statement->fetch()) {
      $returnString .= "$movie_name|-|$director|-|$artists|-|$genre|-|$rating|-|$id\n";
    }
    $this->disconnect();
    return $returnString;
  }
  //Did not get to it
  function readOneById(int $id) : Movie {

  }
  //Did not get to it
  function update(int $id, Movie $movie) : bool {

  }

}

 ?>
