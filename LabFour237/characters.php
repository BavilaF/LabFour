<?php

require("movieBase.php");

$ts = rand(1,100);
$hash = md5($ts . $secret . $apiKey);
$url = 'http://gateway.marvel.com:443/v1/public/characters?nameStartsWith=ts=' . $ts . '&apikey=' . $apiKey . '&hash=' . $hash;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

$jsonArray = json_decode($result);

$entry = '';
foreach($jsonArray->data->results as $character) {
  $image = $character->thumbnail->path . '.' . $character->thumbnail->extension;
  $description = $character->$description;
  $entry .= <<<EOT
  <li class="media">
    <div class="media-left">
      <a href="#">
        <img class="media-object" src="$image" alt="$character->name" style="width: 100px;">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">$character->name</h4>
      $description
    </div>
  </li>
EOT;
}

$body = <<<EOT
<div class="container">
  <div class="row">
    <ul class="media-list">
      $entry
    </ul>
  </div>
</div>
EOT;
$nav = <<<EOT
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="characters.php">
        Characters
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="MainAssign1.php">Back to the Movie Log</a></li>
    </ul>
  </div>
</nav>
EOT;
$htmlPage->setNav($nav);
$htmlPage->setBody($body);
$htmlPage->printPage();

 ?>
