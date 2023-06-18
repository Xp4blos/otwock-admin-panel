<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otwock Alert</title>
    <link rel="shortcut icon" href="./img/herb.png" type="image/x-icon">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php 
        include "includes/header.php"
    ?>
    <section class="content">
        <?php
            if(isset($_GET['status']))
            {
                $status = $_GET['status'];

                if($status == 2){
                    include "dodaj.php";
                }

                if($status == 1){
                    include "show.php";
                }
            }
            else{
                include "welcome.php";
            }
        ?>
    </section>
</body>
</html>