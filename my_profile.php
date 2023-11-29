<?php
$page_title = 'My Profile';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
$objectives = $db->pdoQuery("SELECT * FROM tbl_user_objectives WHERE user_id = '".$_SESSION['userData']['id']."'")->results();
$res =  $db->pdoQuery("SELECT * FROM tbl_users WHERE id = '".$_SESSION['userData']['id']."' ")->result();

?>
<style>
    @keyframes load {
        0% {
            width: 0;
        }
        100% {
            width: 80%;
        }
    }
    
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #2d88ff;
    }
    
    .active {
        border: 1.5px solid #00000038;
    }
    .number_circle{
        /* position: relative; */
        left: initial;
    }
</style>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-lg-12"></div>
        <div class="col-12 col-lg-12">
            <div class="progress">
                <div class="progress-value"></div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 mobile-hidden">
    <div class="row">
        <div class="col-lg-12">
            <div class="number_circle">
                <div class="number" >
                    <p>8</p>
                </div>
            </div>
            <div>
                <h4 class="text_blue ml-5">Amazing, now it's time to associated <br> the portfolio for impact you have <br> achieved</h4>
                <!-- <p class="text_gray">Gallery, link to web (websites, images, videos) etc..</p> -->
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1">
                    <p>8</p>
                </div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Amazing, now it's time to associated the portfolio <br> for impact you have achieved</h4>
                <!-- <p class="text_gray block_1">Gallery, link to web (websites, images, videos) etc..</p> -->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <div class="col-lg-12"></div>
        <!-- <div class="col-12 col-lg-3 desk_marg mr-1">
            <p class="side__text">Connect your Profile with</p>
            <div class="d-flex mt-3">
                <div style="cursor: pointer;"><img src="<?= SITE_IMG ?>GitHub-Mark.png" height="70px" alt=""></div>
                <div>
                    <p class="text_side_1 mt-3 ml-3">Github</p>
                </div>
            </div>
            <div class="d-flex mt-2">
                <div style="cursor: pointer;"><img src="<?= SITE_IMG ?>stack-overflow-computer.png" height="60px" alt=""></div>
                <div>
                    <p class="text_side_1 mt-3 ml-4">Stackoverflow</p>
                </div>
            </div>
            <div class="d-flex mt-3">
                <div style="cursor: pointer;"><img src="<?= SITE_IMG ?>Leetcode.png" height="60px" alt=""></div>
                <div>
                    <p class="text_side_1 mt-3 ml-4">Leetcode</p>
                </div>
            </div>
            <div class="d-flex mt-3">
                <div style="cursor: pointer;" class="mt-3"><img src="<?= SITE_IMG ?>Kaggle.png" height="26px" alt=""></div>
                <div>
                    <p class="text_side_1 mt-3 ml-3">Kaggle</p>
                </div>
            </div>
            <div class="d-flex mt-3">
                <div style="cursor: pointer;"><img src="<?= SITE_IMG ?>HackerEarth_logo.png" height="60px" alt=""></div>
                <div>
                    <p class="text_side_1 mt-3 ml-4">hackerearth</p>
                </div>
            </div>

        </div> -->
        <div class="col-12 col-lg-6 block_1 mob_marg">
            <!-- <div>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text_pill active" data-toggle="pill" href="#Github" role="tab" aria-controls="pills-Github" aria-selected="true">Github</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text_pill" data-toggle="pill" href="#Stackoverflow" role="tab" aria-controls="pills-Stackoverflow" aria-selected="false">Stackoverflow</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text_pill" data-toggle="pill" href="#Leetcode" role="tab" aria-controls="pills-Leetcode" aria-selected="false">Leetcode</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text_pill" data-toggle="pill" href="#Kaggle" role="tab" aria-controls="pills-Leetcode" aria-selected="false">Kaggle</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text_pill" data-toggle="pill" href="#hackerearth" role="tab" aria-controls="pills-hackerearth" aria-selected="false">hackerearth</a>
                    </li>

                </ul>

                <div class="tab-content mt-3">

                    <div class="tab-pane fade show active" style="background-color: #ffffff; border: none;" id="Github" role="tabpanel" aria-labelledby="Github-tab">
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
                    </div>
                    <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="Stackoverflow" role="tabpanel" aria-labelledby="profile-tab">
                        The Stackoverflows are generally medium-sized slender birds. Most species live in trees, though a sizeable minority are ground-dwelling. The family has a cosmopolitan distribution, with the majority of species being tropical.
                    </div>
                    <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="Leetcode" role="tabpanel" aria-labelledby="Leetcode-tab">
                        The common Leetcode is farmed around the world, particularly for its feathers, which are decorative and are also used as feather dusters. Its skin is used for leather products and its meat is marketed commercially, with its leanness a common marketing
                        point.
                    </div>
                    <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="Kaggle" role="tabpanel" aria-labelledby="Kaggle-tab">
                        The common Kaggle is farmed around the world, particularly for its feathers, which are decorative and are also used as feather dusters. Its skin is used for leather products and its meat is marketed commercially, with its leanness a common marketing point.
                    </div>
                    <div class="tab-pane fade" style="background-color: #ffffff; border: none;" id="hackerearth" role="tabpanel" aria-labelledby="hackerearth-tab">
                        The common hackerearth is farmed around the world, particularly for its feathers, which are decorative and are also used as feather dusters. Its skin is used for leather products and its meat is marketed commercially, with its leanness a common marketing
                        point.
                    </div>
                </div>
            </div> -->
            <form action="" id="editPortfolioForm">

                <p class="heading__comment mt-3">Github</p>
                <input type="text" id="gitub_title" name="gitub_title" placeholder="Enter Title" value= "<?php echo $res['gitub_title']; ?>">
                <input type="text" id="gitub_url" name="gitub_url" placeholder="https://" value="<?php echo $res['gitub_url']; ?>">
            
                <p class="heading__comment mt-3">Medium</p>
            
                <input type="text" id="medium_title" name="medium_title" placeholder="Enter Title" value="<?php echo $res['medium_title']; ?>">
                <input type="text" id="medium_url" name="medium_url" placeholder="https://" value="<?php echo $res['medium_url']; ?>">
            
                <p class="heading__comment mt-3">Portfolio</p>
            
                <input type="text" id="portfolio_title" name="portfolio_title" placeholder="Enter Title" value="<?php echo $res['portfolio_title']; ?>">
                <input type="text" id="portfolio_url" name="portfolio_url" placeholder="https://" value="<?php echo $res['portfolio_url']; ?>">
            
                <p class="heading__comment mt-3">References</p>
            
                <input type="text" id="references_title" name="references_title" placeholder="Enter Title" value="<?php echo $res['references_title']; ?>">
                <input type="text" id="references_url" name="references_url" placeholder="https://" value="<?php echo $res['references_url']; ?>">
            
                <p class="heading__comment mt-3">Website</p>
            
                <input type="text" id="website_title" name="website_title" placeholder="Enter Title" value="<?php echo $res['website_title']; ?>">
                <input type="text" id="website_url" name="website_url" placeholder="https://" value="<?php echo $res['website_url']; ?>">
            
                <p class="heading__comment mt-3">YouTube</p>
            
                <input type="text" id="youtube_title" name="youtube_title" placeholder="Enter Title" value="<?php echo $res['youtube_title']; ?>">
                <input type="text" id="youtube_url" name="youtube_url" placeholder="https://" value="<?php echo $res['youtube_url']; ?>">
            </form>
        </div>

    </div>
</div>



<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-6 block_1">
                <button type="button" class="button4 mt-4" onclick="save_portfolio()" id="save">SAVE</button>  
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script>
    $(document).ready(function() {
        var max_fields = 10000000000; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count


        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed

                //text box increment
                $(wrapper).append('<div class="container"><div class="row d-flex"><div class="col-12 col-lg-12 d-flex"><div class="tax_box d-flex ml-2 mt-2"><img src="./assests/imgs/p-4.png" class="ml-2" style="margin-top: 5px;" height="25px" alt=""><p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p><p class="text_mobile_1" style="margin-left: 100px; color:#039222;">Complete</p><div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;"><i class="fa fa-times mt-2" aria-hidden="true"></i></div></div></div></div></div>'); //add input box
                x++;
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text

            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

<script>
    // Accordion //
    const accSingleTriggers = document.querySelectorAll(".accordion-header");

    accSingleTriggers.forEach((trigger) =>
        trigger.addEventListener("click", toggleAccordion)
    );

    function toggleAccordion() {
        const items = document.querySelectorAll(".accordion-item");
        const thisItem = this.parentNode;

        items.forEach((item) => {
            if (thisItem == item) {
                thisItem.classList.toggle("active");
                return;
            }
            item.classList.remove("active");
        });
    }
</script>