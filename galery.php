<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie obrázků - TSGallery</title>
    <link href="galery.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
</head>
<body>
<header>
    <h1 class="Name">TSGallery</h1>
    <hr/>
    <nav class="Menu">
        <ul class="Menu">
            <li><a href="index.php?page=home">UserBook</a></li>
            <li><a href="galery.php?page=galerie">Gallery</a></li>
            <li><a href="upload.php?page=upload">MultiUpload</a></li>
        </ul>
    </nav>
</header>

<h1>Galerie obrázků</h1>
<div class="gallery">
    <?php
    $dir = 'obrazky/'; 
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif'); 
    $files = scandir($dir);

    foreach ($files as $file) {
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), $allowed_extensions) && !is_dir($file)) {
            echo '<a href="' . $dir . $file . '" data-lightbox="gallery">';  
            echo '<img src="' . $dir . $file . '" alt="Obrázek" style="width:200px; height:auto; margin:5px;">';
            echo '</a>';
        }
    }
    ?>
</div>

<footer>
    <p>Aktuální datum a čas: <?php echo date('d.m.Y H:i:s'); ?></p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
