<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSGaleri</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

        form {
            background-color: #f4f4f9;
            padding: 20px;
            max-width: 400px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        form input[type="file"] {
            margin-bottom: 15px;
            font-size: 16px;
            color: black;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: blue;
        }

        h2 {
            text-align: center;
            color: black;
        }


        body {
            background-color: rgb(21, 169, 214);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .napis{
            color: black;
        }
    </style>
<body>
    <header>
    <H1 class="Name">TSGallery</H1>
    <hr/>
    <nav class="Menu">
            <ul class="Menu">
                <li><a href="index.php?page=home">UserBook</a></li>
                <li><a href="galery.php?page=galerie">Gallery</a></li>
                <li><a href="upload.php?page=upload">MultiUpload</a></li>
            </ul>
    </nav>

    </header>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <h2 class="napis">Vyber obrázek:</h2>
    <input type="file" name="image" id="image">
    <input type="submit" value="Nahrát obrázek" name="submit">
</form>
<?php

$target_dir = "obrazky/"; 

$target_file = $target_dir . basename($_FILES["image"]["name"]);

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "Soubor je obrázek - " . $check["mime"] . ".";
        
        if (file_exists($target_file)) {
            echo "Soubor už existuje.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Soubor ". htmlspecialchars(basename($_FILES["image"]["name"])) . " byl úspěšně nahrán.";
            } else {
                echo "Došlo k chybě při nahrávání souboru.";
            }
        }
    } else {
        echo "Soubor není obrázek.";
    }
}
?>

<footer>
    <p>Aktuální datum a čas: <?php echo date('d.m.Y H:i:s'); ?></p>
</footer>

</body>
</html>