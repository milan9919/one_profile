<?php
include("config.php");
// checkUserIsLoggedIn();
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/imgs/favicon.jpeg">
    <title><?= SITE_NAME ?> <?= isset($page_title) ? $page_title : "" ?></title>
    <link rel="stylesheet" href="<?php echo FRONT_SITE_CSS; ?>style.css">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"></link>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        var SITE_URL = '<?= SITE_URL ?>';
    </script>
</head>

<body>

    <section>
    <div class="container mt-4">
            <div class="row">
                <div class="col-5 col-lg-8">
                    <img src="./assets/imgs/logo.png" height="50px" alt="">
                </div>
                <div class="col-2 col-lg-1 mt-1">
                    <button class="button14">Share</button>
                </div>
                <div class="col-4 col-lg-2 mt-1">
                    <button class="button14 ">Contact Me</button>
                </div>
                <div class="col-1 col-lg-1 mt-4 d-flex justify-content-end">
                    <i class="fa-solid fa-bars fa-xl" style="color: #116BC4; cursor: pointer;"></i>
                </div>
            </div>
        </div>