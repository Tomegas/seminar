<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSGallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
.comentar-wrapper {
    color: black;
}
</style>
<body>
<header>
    <h1 class="Name">TSGallery</h1>
    <hr/>
    <nav class="Menu">
        <ul class="Menu">
            <li><a href="index.php">UserBook</a></li>
            <li><a href="galery.php?page=galerie">Gallery</a></li>
            <li><a href="upload.php?page=upload">MultiUpload</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page === 'galerie') {
            include 'galerie.php'; 
        } elseif ($page === 'upload') {
            include 'upload.php'; 
        } else {
        }
    } else {
        
        echo '<h1>Vítejte na TSGallery!</h1>';
        echo '<p>Toto je vaše místo pro sdílení a prohlížení obrázků.</p>';
    }
    ?>

    <h1>Zanechte nám odezvu na naše fotky</h1>
    <form class="comment-form" action="submit.php" method="post">
        <label for="comment">Tvůj komentář:</label>
        <textarea id="comment" placeholder="Vložte vaši reakci..." name="comment" rows="4" required></textarea>
        <button type="submit">Odeslat</button>
    </form>
    
    <div class="comentar-wrapper">
        <h2>Reakce</h2>
        <div class="nazor-list">
        <?php
            $filename = 'nazor.txt';
            if (file_exists($filename)) {
                $nazorData = file_get_contents($filename);
                $nazorArray = explode(';', $nazorData);
                foreach ($nazorArray as $comment) {
                    if (!empty(trim($comment))) {
                        echo "<p>" . htmlspecialchars(trim($comment)) . "</p>";
                    }
                }
            }
        ?>
        </div>
    </div>
</div>

<footer>
    <p>Aktuální datum a čas: <?php echo date('d.m.Y H:i:s'); ?></p>
</footer>

</body>
</html>
