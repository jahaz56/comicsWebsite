<?php
  require_once("tools.php");
?>
<!DOCTYPE html>
<html lang="en">
    <?= writeHead() ?>
    <body>
        <?= displayHeader() ?>
        <main>
            <h2>
                Archive
            </h2>
            <?= displayArchiveLinks($dates, $comics) ?>
        </main>
    </body>
</html>