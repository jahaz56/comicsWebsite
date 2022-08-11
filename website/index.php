<?php
  require_once("tools.php");
  $currentComic = "";
  if (isset($_GET['comic'])) {
    $currentComic = $_GET['comic'];
  } else {
    $currentComic = $comics[count($comics) - 1];
  }
?>
<!DOCTYPE html>
<html lang="en">
    <?= writeHead() ?>
    <body>
        <?= displayHeader() ?>
        <main>
            <?= displayComicsNav($comics, $currentComic) ?>
            <h2><?= $currentComic ?></h2>
            <img src='../media/<?= echoFilename($dates, $comics, $currentComic) ?>'/>
            <?= displayComicsNav($comics, $currentComic) ?>
        </main>
    </body>
</html>