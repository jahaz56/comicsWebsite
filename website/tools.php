<?php

  $files = array_diff(scandir("../media"), array(".", ".."));
  $dates = array();
  $comics = array();

  foreach($files as $file) {
    $datesAndNames = explode("_", $file);
    array_push($dates, $datesAndNames[0]);
    array_push($comics, basename($datesAndNames[1], ".jpg"));
  }

  function writeHead() {
    echo <<<"OUTPUT"
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="author" content="James Hazeldine" />
      <meta name="description" content="A website that shows my comics" />
      <title>James H Comics</title>
      <link id="stylecss" type="text/css" rel="stylesheet" href="style.css" />
    </head>
OUTPUT;
  }

  function displayHeader() {
    echo <<<"OUTPUT"
    <header>
      <h1>
        James H Comics
      </h1>
      <nav id='header-nav'>
        <a class='header-nav-link' href="index.php">Home</a><a class='header-nav-link' href="archive.php">Archive</a><a class='header-nav-link' href="about.php">About</a>
      </nav>
    </header>
OUTPUT;
  }

  function displayArchiveLinks($dates, $comics) {
    $arrLength = count($dates);
    for ($i = 0; $i < $arrLength; $i++) {
      $date = $dates[$i];
      $comic = $comics[$i];
      echo "<p>$date <a class='blue-to-red-link' href='index.php?comic=$comic'>$comic</a></p>";
    }
  }

  function displayComicsNav($comics, $currentComic) {
    $index = array_search($currentComic, $comics);
    echo "<nav class='comics-nav'>";

    if ($index != 0) {
      echo "<span><a class='blue-to-red-link' href='index.php?comic=$comics[0]'>first</a> | </span>";
      $prevIndex = $index - 1;
      echo "<span><a class='blue-to-red-link' href='index.php?comic=$comics[$prevIndex]'>prev</a> | </span>";
    } else {
      echo "<span>first | </span>\n";
      echo "<span>prev | </span>\n";
    }

    $lastIndex = count($comics) - 1;
    $randIndex = rand(0, $lastIndex);
    echo "<span><a class='blue-to-red-link' href='index.php?comic=$comics[$randIndex]'>rand</a> | </span>";

    if ($index != $lastIndex) {
      $nextIndex = $index + 1;
      echo "<span><a class='blue-to-red-link' href='index.php?comic=$comics[$nextIndex]'>next</a> | </span>";
      echo "<span><a class='blue-to-red-link' href='index.php?comic=$comics[$lastIndex]'>last</a></span>";
    } else {
      echo "<span>next | </span>\n";
      echo "<span>last</span>\n";
    }

    echo "</nav>";
  }

  function echoFilename($dates, $comics, $comic) {
    $index = array_search($comic, $comics);
    echo "$dates[$index]_$comics[$index].jpg";
  }

?>