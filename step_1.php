<?php
// $page_title = 'Step 1';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}

$creator_tags = $db->pdoQuery("SELECT * FROM tbl_tags WHERE tag_type = 'creator'")->results();
$creator_user_tag = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id ")->results();
$res = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id = '".$user_id."' AND tag_id = '". $tag_id."'")->result();
$category_tags = $db->pdoQuery("SELECT * FROM tbl_tags WHERE tag_type = 'category'")->results();
?>
<style>
    @keyframes load {
        0% {
            width: 0;
        }
        100% {
            width: 10%;
        }
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
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-12 col-lg-4">
            <div class="progress">
                <div class="progress-value"></div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3 mobile-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center">
            <div class="number_circle">
                <div class="number">
                    <p>1</p>
                </div>
            </div>
            <div>
                <h4 class="text_blue ml-5">Hello <?= $_SESSION['userData']['first_name'] ?>, Tell us a bit about yourself</h4>
                
                <!-- <form action="">
                                <input type="text" placeholder="I am a...">
                            </form> -->
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1">
                    <p>1</p>
                </div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Hello <?= $_SESSION['userData']['first_name'] ?>, Tell us a bit about yourself</h4>
                <p class="text_gray">Join a community of Creators</p>

            </div>
        </div>
    </div>
</div>

<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 desktop-hidden mb-3">
            <!-- <form action="">
                            <input type="text" placeholder="I am a...">
                        </form>         -->
        </div>
    </div>
</div>



<div class="container mobile-hidden">
    <div class="row" id="myDIV">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-inline-block">  
            <?php if (!empty($creator_tags)) {
                $is_checked = [];
                foreach ($creator_tags as $i=>$tag) 
                { 
                    
                    $tag_id = $tag['id'];
                    $user_id = $_SESSION['userData']['id'];
                    
                    $checkTags = $db->count("tbl_user_tags",array("user_id"=>$user_id,"tag_id"=>$tag_id));        
                    
                    if ($checkTags > 0) 
                    {
                        $is_checked = 'active';
                        $is_checkbox = "checked";                   
                     }else{
                        $is_checked = '';
                        $is_checkbox = "";
                    }
                     ?>
                    <div class="btn_1 d-flex tagsinput <?php echo $is_checked;?>">
                        <input type="checkbox" <?php echo $is_checkbox;?> id="check_creator_<?=$i?>" name="creator[]" class="check-tags" value="<?= $tag['id'] ?>" <?php echo $is_checked; ?>> 
                        <label for="check_creator_<?=$i?>" class="tabs_text_blue ml-2"><i class="<?= $tag['tag_icon'] ?>" style="color: #328aff;"></i> <?= $tag['tag_name'] ?></label>
                    </div>
                    <?php 
                }
            } ?>
            </div>
            <div style="color:red;" id="creator_error"></div>
        </div>
        
        <!--<div class="col-12 col-lg-6 block">
            <div class="d-flex">
                <button class="btn_1 d-flex">
                    <i class="fa-solid fa-mobile-screen-button icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Social Media Creator</p>
                </button>
                <button class="btn_1 d-flex ml-2">
                    <i class="fa-sharp fa-solid fa-graduation-cap icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Student</p>
                </button>
                <button class="btn_1 d-flex ml-2">
                    <i class="fa-solid fa-user-tie icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Professional</p>
                </button>

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <button class="btn_1 d-flex">
                    <i class="fa-solid fa-desktop icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Freelancer</p>
                </button>
                <button class="btn_1 d-flex ml-2">
                    <i class="fa-solid fa-paint-roller icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Artist</p>
                </button>
                <button class="btn_1 d-flex ml-2">
                    <i class="fa-solid fa-tags icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Brand</p>
                </button>
                <button class="btn_1 d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Other</p>
                </button>

            </div>
        </div>-->
    </div>


    <div class="row mt-3" id="myDIV_2">
        <!-- <div class="col-12 col-lg-12 d-flex justify-content-center">
            <p>Select one category that best describes the content you create</p>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-inline-block">          
            <?php if (!empty($category_tags)) {
                foreach ($category_tags as $i=>$tag) { 
                     ?>
                    <div class="btn_1 d-flex tagsinput">
                        <input type="checkbox" id="check_category_<?=$i?>" name="category[]" class="check-tags" value="<?= $tag['id'] ?>"> 
                        <label for="check_category_<?=$i?>" class="tabs_text_blue ml-2"><i class="<?= $tag['tag_icon'] ?>" style="color: #328aff;"></i> <?= $tag['tag_name'] ?></label>
                    </div>
                    <?php 
                }
            } ?>
            </div>
            <div style="color:red;" id="category_error"></div>
        </div> -->
        
        <!--<div class="col-12 col-lg-6 block">
            <div class="d-flex">
                <button class="btn_2 d-flex">
                    <i class="fa-solid fa-globe icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Astrology</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="fa-solid fa-business-time icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Business</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="fab fa-btc icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Crypto</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="fas fa-music icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Dance</p>
                </button>

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <button class="btn_2 d-flex">
                    <i class="fas fa-paint-brush icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Design</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="fa-solid fa-database icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Development</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Other</p>
                </button>

            </div>
        </div>-->
    </div>

</div>


<div class="container desktop-hidden">
    <div class="row" id="myDIV_m1">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-flex">
                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-mobile-screen-button icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Software</p>
                </button>
                <button class="btn_m1 d-flex ml-2">
                    <i class="fa-sharp fa-solid fa-graduation-cap icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Product</p>
                </button>


            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-user-tie icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Design</p>
                </button>
                <button class="btn_m1 d-flex ml-2">
                    <i class="fa-solid fa-desktop icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Marketing</p>
                </button>




            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">
                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-paint-roller icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Sales</p>
                </button>
                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-tags icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Customer Success</p>
                </button>
                <button class="btn_m1 d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Other</p>
                </button>
            </div>
        </div>
    </div>


    <!-- <div class="row mt-3" id="myDIV_m2">
        <div class="col-12 col-lg-12 d-flex justify-content-center">
            <p>Select one category that best describes the content you create</p>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-flex">
                <button class="btn_m2 d-flex">
                    <i class="fa-solid fa-globe icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Astrology</p>
                </button>
                <button class="btn_m2 d-flex ml-2">
                    <i class="fa-solid fa-business-time icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Business</p>
                </button>
                <button class="btn_m2 d-flex ml-2">
                    <i class="fab fa-btc icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Crypto</p>
                </button>


            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">
                <button class="btn_m2 d-flex">
                    <i class="fas fa-music icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Dance</p>
                </button>
                <button class="btn_m2 d-flex ml-2">
                    <i class="fas fa-paint-brush icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Design</p>
                </button>
                <button class="btn_m2 d-flex ml-2">
                    <i class="fa-solid fa-database icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Development</p>
                </button>

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <button class="btn_m2 d-flex">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Other</p>
                </button>
            </div>
        </div>
    </div> -->

</div>


<div class="container" style="margin-bottom: 60px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-6">
            <form action="">
                <!-- <input type="text" class="mt-5" id="fname" name="firstname" placeholder="Your Category"> -->
                <button type="button" class="button4 mt-4" onclick="check_step_one()" id="step1btn">Continue</button>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>