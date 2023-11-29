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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    </link>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script type="text/javascript" src="./assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="./assets/dist/bootstrap-tagsinput.css">

    <script type="text/javascript" src="./assets/js/app.js"></script>
    <script type="text/javascript" src="./assets/dist/bootstrap-tagsinput.js"></script>
    <script type="text/javascript" src="./assets/dist/bootstrap-tagsinput.min.js"></script>
    <script>
        var SITE_URL = '<?= SITE_URL ?>';
    </script>
</head>

<body>

    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-6 col-lg-10">
                    <img src="<?php echo SITE_IMG; ?>logo.png" height="50px" alt="">
                </div>
                <?php if (isset($_SESSION['userData'])) { ?>
                    <div class="col-3 col-lg-1 d-flex justify-content-end">
                        <a href="<?php echo SITE_URL; ?>logout" class="text_small" style="cursor: pointer; margin-top: 20px;">
                            Log Out
                        </a>
                    </div>
                    <div class="col-3 col-lg-1 mt-1">
                        <img src="<?= $_SESSION['userData']['picture'] ?>" style="cursor: pointer;" height="40px" alt="">
                    </div>
                <?php } ?>
                <!-- <div class="col-3 col-lg-1 d-flex justify-content-end">
                    <p class="text_small" style="cursor: pointer; margin-top: 20px;">
                        Log In
                    </p>
                </div>
                <div class="col-3 col-lg-1">
                    <button class="btn_small text_small_1 mt-3">Sign Up</button>
                </div> -->
            </div>
        </div>