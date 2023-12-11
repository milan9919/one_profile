<?php
// $page_title = 'Step 1';
$page_title = 'proifle';
include("profileHeader.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
$user_tag = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id ")->results();
$objectives = $db->pdoQuery("SELECT * FROM tbl_user_objectives WHERE user_id = '".$_SESSION['userData']['id']."'")->results();

?>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"></link>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #2d88ff;
        }
        
        .active {
            border: 1.5px solid #00000038;
        }
        .pd {
            place-content: center;
        }
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #3c3434;
        }
    </style>
    
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
<style>
    @keyframes load {
        0% {
            width: 0;
        }

        100% {
            width: 50%;
        }
    }

    .toggle {
        position: relative;
    }

    .toggle input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle .onoff {
        color: #323232;
        font-size: 22px;
        text-align: center;
        display: block;
        font-family: Arial, Helvetica, sans-serif;
    }

    .slider {
        position: relative;
        display: block;
        cursor: pointer;
        background-color: #fd5d00;
        box-shadow: 0 0 12px #fd5d00;
        transition: 0.4s;
        width: 65px;
        height: 30px;
    }

    .slider:before {
        content: "";
        position: absolute;
        height: 10px;
        width: 10px;
        background-color: #fff;
        transition: 0.4s;
        top: 10px;
        left: 10px;
    }

    input:checked+.slider {
        background-color: #03970a;
        box-shadow: 0 0 12px #03970a;
    }

    input:checked+.slider:before {
        transform: translateX(38px);
    }

    .slider.round {
        border-radius: 20px;
    }

    .slider.round::before {
        border-radius: 20px;
    }
    .btn_1,
    .btn_2,
    .btn_m1,
    .btn_m2 {
        float: left;
        margin: 5px;
    }
    .tagsinput.active {
        outline: 5px auto -webkit-focus-ring-color;
    }
</style>

</head>

<body>

    <section>
        <!-- <div class="container mt-4">
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
        </div> -->

        <div class="container">
            <div class="row">
                <div class="page_border col-12 col-lg-12" style="padding-right: 0px; padding-left: 0px; height: auto;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-12" style="padding-right: 0px; padding-left: 0px;">
                                <div class="">
                                    <img src="./assets/imgs/replace this photo.png" style="border-top-left-radius: 15px; border-top-right-radius: 15px;" height="180px" width="100%" alt="">
                                    <!-- <img class="under_img" src="./assets/imgs/t-1.png" alt=""> -->
                                    <img class="under_img" src="<?= $_SESSION['userData']['picture'] ?>" style="cursor: pointer;" height="40px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row" id="myDIV">
                            <div class="t_p col-12 col-lg-4" style="margin-top: 35px;">
                                <p class="t_1"><?= $_SESSION['userData']['first_name'] . ' ' . $_SESSION['userData']['last_name']; ?></p>
                                <?php
                                    $user_tags = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id = '".$_SESSION['userData']['id']."'")->results();
                                        $tagIds = '';
                                    foreach ($user_tags as $key=>$user_tag) { 
                                        $tagIds = $tagIds . $user_tag['tag_id'] . ((count($user_tags) > $key+1)  ? ',' : '');
                                    
                                    }?>
                                    <?php
                               
                                    $res = $db->pdoQuery("SELECT GROUP_CONCAT(tag_name SEPARATOR ', ') AS combined_tags FROM tbl_tags WHERE id IN($tagIds)")->result();
                                    
                                    echo ($res['combined_tags']);
                                    ?>


                                 
                                <div class="d-flex">
                                <?php if(!empty($objectives)){ 
                                    foreach($objectives as $i => $value){ 
                                    
                                        $key_results = $db->pdoQuery("SELECT * FROM tbl_user_key_results WHERE objective_id = '".$value['id']."'")->results();
                                    
                                    ?>

                                <?php if(!empty($key_results)){ 
                                    foreach($key_results as $k => $row){ ?>
                                        <button class="btn_1 d-flex mt-2">
                                            <i class="fas fa-paint-brush icon_margin_top ml-1" style="color: #328aff;"></i>
                                            <p class="tabs_text_blue ml-2"><?= $row['skill'] ?></p>
                                        </button>
                                    
                                    <!-- <button class="btn_1 d-flex ml-2 mt-2">
                                            <i class="fa-solid fa-database icon_margin_top ml-1" style="color: #37c5ab;"></i>
                                            <p class="tabs_text_green ml-2">Skill</p>
                                        </button>
                                    <button class="btn_1 d-flex ml-2 mt-2">
                                            <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                                            <p class="tabs_text_blue ml-2">Skill</p>
                                        </button> -->
                                        <?php }
                                    } ?>
                                    
                                <?php }
                            } ?>
                                </div>
                                
                            </div>

                            <div class="col-8 col-lg-4 mt-5 d-flex justify-content-center"></div>

                            <div class="col-4 col-lg-4 mt-5 d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <p class="mb-2 t_10">Past Company</p>
                                        <?php
                                            $objectives = $db->pdoQuery("SELECT * FROM tbl_user_objectives WHERE user_id = '" . $_SESSION['userData']['id'] . "'")->results();

                                            foreach ($objectives as $objective) { ?>
                                            <div class="d-flex">
                                                <!-- <img src="./assets/imgs/t-3.png" height="20px" alt=""> -->
                                                <img src="./assets/imgs/2-2-arrow-png-pic-thumb.png" height="20px" alt="→">
                                                <p class="ml-2 mb-1 t_11"><?= $objective['position']; ?></p>
                                            </div>

                                        <?php } ?>
                                        <!-- <div class="d-flex">
                                            <img src="./assests/imgs/t-4.png" height="20px" alt="">
                                            <p class="ml-2 t_11">Meta</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row mobile-hidden">
                            <div class="col-12 col-lg-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="t_3 ml-3">Portfolio</p>
                                    <?php  
                                    if (isset($_SESSION['userData']) && $_SESSION['userData']['user_id'] === $profileOwnerId) { ?>
                                    <a href="my_profile.php" class="edit-icon" title="Edit Portfolio">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                     <?php }?>
                                </div>
                                <div>
                                    <ul class="nav nav-pills ml-5">
                                        <li class="nav-item">
                                            <a class="nav-link text_pill active" data-toggle="pill" href="#gitub_url" role="tab" aria-controls="pills-gitub" aria-selected="true">Github</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#medium_url" role="tab" aria-controls="pills-medium" aria-selected="false">Medium</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#portfolio_url" role="tab" aria-controls="pills-portfolio" aria-selected="false">Portfolio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#refrences_url" role="tab" aria-controls="pills-Refrences" aria-selected="false">References</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#website_url" role="tab" aria-controls="pills-Webiste" aria-selected="false">Website</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#youtube_url" role="youtube" aria-controls="pills-Youtube" aria-selected="false">YouTube</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-3">

                                        <?php
                                            $res =  $db->pdoQuery("SELECT * FROM tbl_users WHERE id = '".$_SESSION['userData']['id']."' ")->result();
                                        ?>
                                        <!-- <div class="tab-pane fade show active" style="background-color: #ffffff; border: none;" id="Github" role="tabpanel" aria-labelledby="Github-tab">
                                            <div class="row">
                                                <div class="col-6 col-lg-3 mt-4 d-flex justify-content-center">
                                                    <div class="wrapper" data-anim="base wrapper">
                                                        <div class="circle" data-anim="base left"></div>
                                                        <div class="circle" data-anim="base right"></div>
                                                        <p class="circle__text d-flex justify-content-center">23 <br> Repository</p>

                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-6 d-flex mt-5">
                                                    <p>15 Completed</p>
                                                    <p class="ml-5">23 Repository</p>
                                                    <p class="ml-5">5 Pending</p>
                                                    <p class="ml-5">3 Ongoing</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="tab-pane fade show active" style="background-color: #ffffff; border: none;" id="gitub_url" role="tabpanel" aria-labelledby="gitub-tab">
                                            
                                            <!-- <input type="text" id="gitub_url" name="gitub_url" value="<?php echo $res['gitub_url']; ?>"> -->
                                            <?php if (!empty($res['gitub_url'])) { ?>
                                                <i class="fab fa-github ml-5 mr-1"></i><a href=""  target="_blank"><?php echo $res['gitub_url']; ?></a>
                                            <?php } else { ?>
                                                <span class="ml-5 mr-1">Not found</span>
                                            <?php } ?> 
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="medium_url" role="tabpanel" aria-labelledby="Leetcode-tab">
                                            <!-- <input type="text" id="medium_url" name="medium_url" value="<?php echo $res['medium_url']; ?>"> -->
                                            <?php if (!empty($res['medium_url'])) { ?>
                                                <i class="fab fa-medium ml-5 mr-1"></i><a href=""  target="_blank"><?php echo $res['medium_url']; ?></a>
                                            <?php } else { ?>
                                                <span class="ml-5 mr-1">Not found</span>
                                            <?php } ?> 
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="portfolio_url" role="tabpanel" aria-labelledby="Kaggle-tab">
                                            <!-- <input type="text" id="portfolio_url" name="portfolio_url" value="<?php echo $res['portfolio_url']; ?>"> -->
                                            <?php if (!empty($res['portfolio_url'])) { ?>
                                                <i class="fa fa-briefcase ml-5 mr-1"></i><a href=""  target="_blank"><?php echo $res['portfolio_url']; ?></a>
                                            <?php } else { ?>
                                                <span class="ml-5 mr-1">Not found</span>
                                            <?php } ?>   
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="refrences_url" role="tabpanel" aria-labelledby="hackerearth-tab">
                                            <!-- <input type="text" id="references_url" name="references_url" value="<?php echo $res['references_url']; ?>"> -->
                                            <?php if (!empty($res['references_url'])) { ?>
                                                <i class="fas fa-link ml-5 mr-1"></i><a href=""  target="_blank"><?php echo $res['references_url']; ?></a>
                                            <?php } else { ?>
                                                <span class="ml-5 mr-1">Not found</span>
                                            <?php } ?>  
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="website_url" role="tabpanel" aria-labelledby="Kaggle-tab">
                                            <!-- <input type="text" id="website_url" name="website_url" value="<?php echo $res['website_url']; ?>"> -->
                                            <?php if (!empty($res['website_url'])) { ?>
                                                <i class="fas fa-globe ml-5 mr-1"></i><a href=""  target="_blank"><?php echo $res['website_url']; ?></a>
                                            <?php } else { ?>
                                                <span class="ml-5 mr-1">Not found</span>
                                            <?php } ?> 
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="youtube_url" role="tabpanel" aria-labelledby="hackerearth-tab">
                                            <!-- <input type="text" id="youtube_url" name="youtube_url" value="<?php echo $res['youtube_url']; ?>"> -->
                                            <?php if (!empty($res['youtube_url'])) { ?>
                                                <i class="fab fa-youtube ml-5 mr-1"></i><a href=""  target="_blank"><?php echo $res['youtube_url']; ?></a>
                                            <?php } else { ?>
                                                <span class="ml-5 mr-1">Not found</span>
                                            <?php } ?> 
                                        </div>
                                    </div>
                                </div>
                            


                            </div>
                        </div>
                        <div class="row desktop-hidden">
                            <div class="col-12 col-lg-12">
                                <p class="t_3 ml-3">Portfolio</p>
                                
                                <div>
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link text_pill active" data-toggle="pill" href="#Github1" role="tab" aria-controls="pills-Github" aria-selected="true">Github</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#Stackoverflow1" role="tab" aria-controls="pills-Stackoverflow" aria-selected="false">Stackoverflow</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#Leetcode1" role="tab" aria-controls="pills-Leetcode" aria-selected="false">Leetcode</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#Kaggle1" role="tab" aria-controls="pills-Leetcode" aria-selected="false">Kaggle</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text_pill" data-toggle="pill" href="#hackerearth1" role="tab" aria-controls="pills-hackerearth" aria-selected="false">hackerearth</a>
                                        </li>

                                    </ul>

                                    <div class="tab-content mt-3">

                                        <!-- <div class="tab-pane fade show active" style="background-color: #ffffff; border: none;" id="Github1" role="tabpanel" aria-labelledby="Github-tab">
                                            <div class="row">
                                                <div class="col-6 col-lg-3 mt-4 d-flex justify-content-center">
                                                    <div class="wrapper" data-anim="base wrapper">
                                                        <div class="circle" data-anim="base left"></div>
                                                        <div class="circle" data-anim="base right"></div>
                                                        <p class="circle__text d-flex justify-content-center">23 <br> Repository</p>

                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg-6">
                                                    <p>15 Completed</p>
                                                    <p>23 Repository</p>
                                                    <p>5 Pending</p>
                                                    <p>3 Ongoing</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="Stackoverflow1" role="tabpanel" aria-labelledby="profile-tab">
                                            The Stackoverflows are generally medium-sized slender birds. Most species live in trees, though a sizeable minority are ground-dwelling. The family has a cosmopolitan distribution, with the majority of species being tropical.
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="Leetcode1" role="tabpanel" aria-labelledby="Leetcode-tab">
                                            The common Leetcode is farmed around the world, particularly for its feathers, which are decorative and are also used as feather dusters. Its skin is used for leather products and its meat is marketed commercially, with its leanness a common marketing
                                            point.
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="Kaggle1" role="tabpanel" aria-labelledby="Kaggle-tab">
                                            The common Kaggle is farmed around the world, particularly for its feathers, which are decorative and are also used as feather dusters. Its skin is used for leather products and its meat is marketed commercially, with its leanness a common marketing point.
                                        </div>
                                        <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="hackerearth1" role="tabpanel" aria-labelledby="hackerearth-tab">
                                            The common hackerearth is farmed around the world, particularly for its feathers, which are decorative and are also used as feather dusters. Its skin is used for leather products and its meat is marketed commercially, with its leanness a common marketing
                                            point.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <hr class="line_space">

                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="t_3 ml-3">Your Impact</p>
                                    <a href="step_6.php" class="edit-icon" title="Edit Objective">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                </div>
                                <?php if(!empty($objectives)){ 
                                    foreach($objectives as $i => $value){ 
                    
                                        $key_results = $db->pdoQuery("SELECT * FROM tbl_user_key_results WHERE objective_id = '".$value['id']."'")->results();
                       
                                    ?>
                                    <?php if(!empty($key_results)){ ?>
                                        <div class="row">
                                            <div class="col-12 col-lg-10 d-flex" style="justify-content: space-between;">
                                                <h5 class="block_5">Objective:- <?= $value['archive_revenue'] ?> </h5>
                                                <a href="#popup1"><button class="button4 mb-3" style="padding: 5px 20px 5px 20px;">Add Team</button></a>
                                                <!--popup1-->
                                                <div id="popup1" class="popup-container">
                                                    <div class="popup-content">
                                                        <a href="#" class="close">&times;</a>

                                                        <div class="container">
                                                            <div class="title">Invite</div>
                                                            <form action="#" id="user_team">
                                                                <div class="user__details">
                                                                    <div class="input__box">
                                                                        <span class="details">Full Name</span>
                                                                        <input type="text" name="name" placeholder="" required>
                                                                    </div>
                                                                    <div class="input__box">
                                                                        <span class="details mt-2">Email</span>
                                                                        <input type="email" name="email" placeholder="" required>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button" class="button4 mt-4" onclick="save_user_team()" id="save" style="display: block; margin: 0 auto;">SAVE</button> 
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                       
                                        <!-- remove code objective -->
            
                                        <?php if(!empty($key_results)){ 
                                            foreach($key_results as $k => $row){ ?>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-12 col-lg-9">
                                                        <p class="text____box tax_box_1" style="background: #e7e7e7;">Key Result:- <?= $row['quarterly_revenue'] ?></p>

                                                        <div class="row">
                                                            <div class="col-12 col-lg-12 d-flex">
                                                                <p class="text____box tax_box_1 pb-3" style="background: #e7e7e7;">Description:- <?= $row['description'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-lg-12 d-flex">
                                                                <p class="text____box tax_box_1 pb-3" style="background: #e7e7e7;">Skill:- <?= $row['skill'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        } ?>
                                    <?php }  ?>
                                <?php }
                                } ?>
                                </div>  
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="row mt-5">
                                    <div class="col-12 col-lg-10 d-flex" style="justify-content: space-between;">
                                        <h5 class="block_5 t_15">Feedback from your team Memebers</h5>
                                        <div>
                                            <img src="./assets/imgs/p1.png" class="mt-2" height="30px" alt="">
                                            <img src="./assets/imgs/p2.png" class="mt-2" height="30px" style="margin-left: -15px;" alt="">
                                            <img src="./assets/imgs/p3.png" class="mt-2" height="30px" style="margin-left: -15px;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center mt-4">
                                    <div class="col-12 col-lg-9">
                                        <div class="d-flex">
                                            <img src="./assets/imgs/p-8.png" height="35px" alt="">
                                            <p class="text____box tax_box_1 ml-3" style="background: #e7e7e7;">Nulla Lorem mollit cupidatat irure<i class="fa fa-eye d-flex justify-content-end" style="margin-top: -16px; color: #747474;" aria-hidden="true"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="d-flex">
                                            <img src="./assets/imgs/p-9.png" height="35px" alt="">
                                            <p class="text____box tax_box_1 ml-3" style="background: #e7e7e7;">Nulla Lorem mollit cupidatat irure<i class="fa fa-eye d-flex justify-content-end" style="margin-top: -16px; color: #747474;" aria-hidden="true"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="row mt-3">
                                        <div class="col-12 col-lg-10 d-flex" style="justify-content: space-between;">
                                            <h5 class="block_5 t_3">What's Next ?</h5>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-lg-9">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <p class="text____box tax_box_1 pb-5 mt-3" style="background: #e7e7e7;">I Want to..........</p>

                                                    </div>
                                                </div>
                                                <h5 class="mt-2">Open for Opportunity </h5>
                                                <div class="d-flex" id="myDIV_1">
                                                    <button class="btn_2 d-flex mt-2" style="padding: 5px 5px 5px 0px;">
                                                        <i class="fa fa-podcast icon_margin_top ml-1" style="color: #328aff;"></i>
                                                        <p class="tabs_text_blue ml-2">Option 1</p>
                                                    </button>
                                                    <button class="btn_2 d-flex ml-2 mt-2" style="padding: 5px 5px 5px 0px;">
                                                        <i class="fa fa-podcast icon_margin_top ml-1" style="color: #37c5ab;"></i>
                                                        <p class="tabs_text_green ml-2">Option 2</p>
                                                    </button>
                                                    <button class="btn_2 d-flex ml-2 mt-2" style="padding: 5px 5px 5px 0px;">
                                                        <i class="fa fa-podcast icon_margin_top ml-1" style="color: #328aff;"></i>
                                                        <p class="tabs_text_blue ml-2">Option 3</p>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </section>


    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btn_1");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" active", "");
                }
                this.className += " active";
            });
        }
    </script>

    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV_1");
        var btns = header.getElementsByClassName("btn_2");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active_1");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" active_1", "");
                }
                this.className += " active_1";
            });
        }
    </script>
<!-- objective start -->
    <script>
        //<![CDATA[
        
        function load_toggles(){
            let toggles = document.getElementsByClassName("toggle");
            let contentDiv = document.getElementsByClassName("content");
            let icons = document.getElementsByClassName("icon");
            
            for (let i = 0; i < toggles.length; i++) {
                toggles[i].addEventListener("click", () => {
                    if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                        contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
                        toggles[i].style.color = "#0084e9";
                        icons[i].classList.remove("fa-plus");
                        icons[i].classList.add("fa-minus");
                    } else {
                        contentDiv[i].style.height = "0px";
                        toggles[i].style.color = "#111130";
                        icons[i].classList.remove("fa-minus");
                        icons[i].classList.add("fa-plus");
                    }
        
                    for (let j = 0; j < contentDiv.length; j++) {
                        if (j !== i) {
                            contentDiv[j].style.height = 0;
                            toggles[j].style.color = "#111130";
                            icons[j].classList.remove("fa-minus");
                            icons[j].classList.add("fa-plus");
                        }
                    }
                });
            }  
        }
        //]]>
    </script>

    <script>
        $(document).ready(function() {
            $("#color_mode").on("change", function() {
                colorModePreview(this);
            });
            load_toggles();
            
            $("#OKRForm").on("submit", function(e){
                e.preventDefault();
            });
        });

        function colorModePreview(ele) {
            if ($(ele).prop("checked") == true) {
                $('body').addClass('dark-preview');
                $('body').removeClass('white-preview');
            } else if ($(ele).prop("checked") == false) {
                $('body').addClass('white-preview');
                $('body').removeClass('dark-preview');
            }
        }
        
    </script>


<script src="<?= SITE_URL ?>assets/text_editor.js"></script>

<script src="<?php echo FRONT_SITE_JS; ?>custom.js"></script>
<!-- objective end -->

</body>

</html>
