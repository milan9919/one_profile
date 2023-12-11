<?php
// $page_title = 'Step 6';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
$objectives = $db->pdoQuery("SELECT * FROM tbl_user_objectives WHERE user_id = '".$_SESSION['userData']['id']."'")->results();
?>
<style>
    @keyframes load {
        0% {
            width: 0;
        }
        100% {
            width: 60%;
        }
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
                    <p>6</p>
                </div>
            </div>
            <div>
                <h4 class="text_blue">Great going, you have one or more Key <br> Results</h4>
                <!-- <p class="text_black">Add Key Result</p> -->
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1">
                    <p>7</p>
                </div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Great going, you have one or more Key Results</h4>
                <p class="text_black">Add Key Result</p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-6">
            <h5 class="ml-5">Objective:</h5>
            <div class="accordion ml-5 mt-1">
                <?php if(!empty($objectives)){ 
                    foreach($objectives as $i => $value){ 
                    
                        $key_results = $db->pdoQuery("SELECT * FROM tbl_user_key_results WHERE objective_id = '".$value['id']."'")->results();
                       
                    ?>
                    <?php if(!empty($key_results)){ ?>
                        <div class="accordion-item <?= $i == 0 ? "active" : "" ?>">
                            <div class="accordion-header">
                                <div class="ml-3">
                                    <img src="<?= SITE_IMG ?>goal.png" alt="" height="25" width="25">
                                </div>
                                <p class="text_drop ml-2 mt-3"> <b><?= $value['archive_revenue'] ?></b></p>
                            </div>
                            <div class="accordion-body">
                                <div class="accordion-body-content">
                                    <h6 class="mt-2">Key Result:</h6>
                                    <div class="container">
                                        <?php if(!empty($key_results)){ 
                                            foreach($key_results as $k => $row){ ?>
                                                <div class="row d-flex">
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <div class="tax_box d-flex ml-2 py-2">
                                                            <img src="<?= SITE_IMG ?>goal_2.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                                            <p class="text_mobile ml-2" style="width: 80%; word-wrap: break-word;" ><b><?= $row['quarterly_revenue'] ?></b><br><?= $row['description'] ?><br><?= $row['skill'] ?></p>
                                                            <p class="text_mobile_1" style="margin-left: 80px; color:#039222;">&nbsp;</p>
                                                            <!-- <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                
                                                </div>
                                        <?php }
                                        } ?>
        
                                        
                                    </div>
        
        
                                </div>
                            </div>
                        </div>
                      <?php } ?>               
                <?php }
                } ?>
                

                <!--<div class="accordion-item">
                    <div class="accordion-header">
                        <div class="ml-3">
                            <img src="<?= SITE_IMG ?>p1.png" alt="">
                        </div>
                        <p class="text_drop ml-2 mt-3"> Archive record revenue while increasing profitability</p>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-body-content">
                            <h6 class="mt-2">Key Result:</h6>



                            <div class="container">
                                <div class="row d-flex">
                                    <div class="col-12 col-lg-12 d-flex">


                                        <div class="tax_box d-flex ml-2 py-2">
                                            <img src="<?= SITE_IMG ?>p-4.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                            <p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p>
                                            <p class="text_mobile_1" style="margin-left: 80px; color:#039222;">Complete</p>
                                            <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row input_fields_wrap mt-2 d-flex">
                                    <div class="col-12 col-lg-12 d-flex">


                                        <div class="tax_box d-flex ml-2 py-2">
                                            <img src="<?= SITE_IMG ?>p-5.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                            <p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p>
                                            <p class="text_mobile_1" style="margin-left: 107px; color:#FF9900;">Ongoing</p>
                                            <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <div class="ml-3">
                            <img src="./assests/imgs/p1.png" alt="">
                        </div>
                        <p class="text_drop ml-2 mt-3"> Archive record revenue while increasing profitability</p>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-body-content">
                            <h6 class="mt-2">Key Result:</h6>



                            <div class="container">
                                <div class="row d-flex">
                                    <div class="col-12 col-lg-12 d-flex">


                                        <div class="tax_box d-flex ml-2 py-2">
                                            <img src="./assests/imgs/p-4.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                            <p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p>
                                            <p class="text_mobile_1" style="margin-left: 80px; color:#039222;">Complete</p>
                                            <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row input_fields_wrap mt-2 d-flex">
                                    <div class="col-12 col-lg-12 d-flex">


                                        <div class="tax_box d-flex ml-2 py-2">
                                            <img src="./assests/imgs/p-5.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                            <p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p>
                                            <p class="text_mobile_1" style="margin-left: 107px; color:#FF9900;">Ongoing</p>
                                            <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <div class="ml-3">
                            <img src="./assests/imgs/p1.png" alt="">
                        </div>
                        <p class="text_drop ml-2 mt-3"> Archive record revenue while increasing profitability</p>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-body-content">
                            <h6 class="mt-2">Key Result:</h6>



                            <div class="container">
                                <div class="row d-flex">
                                    <div class="col-12 col-lg-12 d-flex">


                                        <div class="tax_box d-flex ml-2 py-2">
                                            <img src="./assests/imgs/p-4.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                            <p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p>
                                            <p class="text_mobile_1" style="margin-left: 80px; color:#039222;">Complete</p>
                                            <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row input_fields_wrap mt-2 d-flex">
                                    <div class="col-12 col-lg-12 d-flex">


                                        <div class="tax_box d-flex ml-2 py-2">
                                            <img src="./assests/imgs/p-5.png" class="ml-2" style="margin-top: 5px;" height="25px" alt="">
                                            <p class="text_mobile ml-2">Hit quarterly revenue of $10,000,000</p>
                                            <p class="text_mobile_1" style="margin-left: 107px; color:#FF9900;">Ongoing</p>
                                            <div class="text_mobile_2 remove_field d-flex justify-content-end" style="margin-left: 30px;">
                                                <i class="fa fa-times mt-2 mr-3" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>-->



            </div>
        </div>
    </div>
</div>


<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-2 col-lg-3"></div>
        <div class="col-3 col-lg-4 block_1">
            <form action="">
                <button type="button" class="button4 mt-4" onclick="window.location.href='<?=SITE_URL?>step_6';">Back</button>
            </form>
        </div>
        <div class="col-6 col-lg-3">
            <form action="">
                <button class="button4 mt-4" id="step7btn" onclick="check_step_seven()">NEXT</button>
            </form>
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