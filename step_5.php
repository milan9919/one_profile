<?php
// $page_title = 'Step 7';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
$x_years_tags = $db->pdoQuery("SELECT * FROM tbl_tags WHERE tag_type = 'x_years'")->results();
$res =  $db->pdoQuery("SELECT * FROM tbl_users WHERE id = '".$_SESSION['userData']['id']."' ")->result();

?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<style>
    @keyframes load {
        0% { width: 0; }
        100% { width: 50%; }
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

        input:checked + .slider {
        background-color: #03970a;
        box-shadow: 0 0 12px #03970a;
        }

        input:checked + .slider:before {
        transform: translateX(38px);
        }

        .slider.round {
        border-radius: 20px;
        }
        .slider.round::before {
        border-radius: 20px;
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
            <div class="number_circle mt-2">
                <div class="number"><p>7</p></div>
            </div>
            <div>
                <h4 class="text_blue ml-4">What are you looking to do in next X years?</h4>
               <!--  <p class="text_gray ml-4">We could run similar workflow to capture information in OKR format but <br> can stick only to defining objectives and key results. We <br> can skip other components such as - portfolio, team, recommendations etc.</p> -->
            </div>
        </div>
    </div>
</div>
<!-- <div class="container mt-3 mobile-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center">
            <div><p>Looking for a job with Yes/No</p></div>
            <div class="toggle-switch">
                <label>
                    <input class="toggle-input" type="checkbox" />
                    <span class="toggle-label" data-off="OFF" data-on="ON"></span>
                    <span class="toggle-handle"></span>
                </label>
            </div>
            <div><p>slider (by default No)</p></div>
        </div>
    </div>
</div>

<div class="container mt-3 mobile-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center">
            <div><p>Looking to provide services with Yes/No</p></div>
            <div class="toggle-switch">
                <label>
                    <input class="toggle-input" type="checkbox" />
                    <span class="toggle-label" data-off="OFF" data-on="ON"></span>
                    <span class="toggle-handle"></span>
                </label>
            </div>
            <div><p>slider (by default No)</p></div>
        </div>
    </div>
</div> -->
    
<div class="container mobile-hidden">
    <div class="row" id="myDIV">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-inline-block">          
            <!-- <?php if (!empty($x_years_tags)) {
                foreach ($x_years_tags as $i=>$tag) { 
                     ?>
                    <div class="btn_1 d-flex tagsinput">
                        <input type="checkbox" id="check_x_years_<?=$i?>" name="x_years[]" class="check-tags" value="<?= $tag['id'] ?>"> 
                        <label for="check_x_years_<?=$i?>" class="tabs_text_blue ml-2"><i class="<?= $tag['tag_icon'] ?>" style="color: #328aff;"></i> <?= $tag['tag_name'] ?></label>
                    </div>
                    <?php 
                }
            } ?> -->
            </div>
            <div style="color:red;" id="x_years_tags_error"></div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fa-solid ml-1" style="color: #328aff; font-size: 24px; display: flex; align-items: center;"></i>
                    <p class="tabs_text_blue ml-2" style="display: flex; align-items: center; font-size: 18px;">Looking for a job
                        <label class="toggle_1 col-lg-2">
                            <input name="looking_for_job" value="1" type="checkbox" id="myBtn" onchange="toggleEditor()" <?php echo ($res['looking_for_job'] == 1 ? 'checked' : ''); ?>/>
                            <span class="slider round"></span>
                        </label>
                    </p>
                </div>
                
                <!-- <div class="d-flex ml-2">
                    <i class="fa-sharp fa-solid fa-graduation-cap icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Student
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
                </div> -->
                <!-- <div class=" d-flex ml-2">
                    <i class="fa-solid fa-user-tie icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Professional
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
                </div> -->

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-flex align-items-center">
               
                <div class="d-flex align-items-center">
                    <i class="fa-solid ml-1" style="color: #328aff; font-size: 24px; display: flex; align-items: center;"></i>
                    <p class="tabs_text_blue ml-2" style="display: flex; align-items: center; font-size: 18px;">Looking to provide service
                    <label class="toggle_1 col-lg-2" style="font-size: 24px;">
                        <input name="looking_for_job" value="1" type="checkbox" id="myBtn1" onchange="looking_provide_service()" <?php echo ($res['looking_for_job'] == 1 ? 'checked' : ''); ?>/>
                        <span class="slider round"></span>
                    </label>
                    </p>
                </div>
            </div>
        </div>

        <!-- TEXT EDITOR CODE -->
        <div class="container" style="margin-bottom: 100px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-7">

                    <div class="wrapper mobile-hidden" style="display: block; width: 74%; margin-left: 48px; position: relative;">
                        <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post" style="<?php echo($res['looking_for_job'] == 0 ? 'display:none;' : '')?>">

                            <!-- Editor Control Box -->
                            <div class="editor-controls" id="editor-controls">


                                <!-- Inline Styles -->
                                <div class="rte editor button-group" id="inlineStyleGroup">
                                    <!-- Bold -->
                                    <a class="rte button editor" id="bold" title="Bold" onclick="boldSel()"><i class="fa fa-fw fa-bold"></i></a>
                                    <!-- Italicize -->
                                    <a class="rte button editor" id="italic" title="Italicize" onclick="italicSel()"><i class="fa fa-fw fa-italic"></i></a>
                                    <!-- Underline -->
                                    <a class="rte button editor" id="underline" title="Underline" onclick="underlineSel()"><i class="fa fa-fw fa-underline"></i></a>
                                    <!-- Strikethrough -->
                                    <a class="rte button editor" id="strikethrough" title="Strikethrough" onclick="strikethroughSel()"><i class="fa fa-fw fa-strikethrough"></i></a>
                                </div>

                                <!-- Alignment -->
                                <div class="button-group" id="alignmentGroup">
                                    <!-- Align Left -->
                                    <a class="rte button editor" id="left" title="Left-align" onclick="alignLeftSel()"><i class="fa fa-fw fa-align-left"></i></a>
                                    <!-- Align Center -->
                                    <a class="rte button editor" id="center" title="Center-align" onclick="alignCenterSel()"><i class="fa fa-fw fa-align-center"></i></a>
                                    <!-- Align Right -->
                                    <a class="rte button editor" id="right" title="Right-align" onclick="alignRightSel()"><i class="fa fa-fw fa-align-right"></i></a>
                                    <!-- Justify -->
                                    <a class="rte button editor" id="justify" title="Justify" onclick="alignJustifySel()"><i class="fa fa-fw fa-align-justify"></i></a>
                                </div>

                                <!-- Lists -->
                                <div class="button-group" id="listsGroup">
                                    <!-- Unordered List -->
                                    <a class="rte button editor" id="unordered" title="Bulleted List" onclick="newUlSel()"><i class="fa fa-fw fa-list-ul"></i></a>
                                    <!-- Ordered List -->
                                    <a class="rte button editor" id="ordered" title="Numbered List" onclick="newOlSel()"><i class="fa fa-fw fa-list-ol"></i></a>
                                    <!-- <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a> -->

                                </div>



                            </div>

                            <!-- Editor text box -->
                            <textarea class="editor-text-box" id="editor-text-box" name="about_me" style="width: 100%; max-width: 100%; display:none" wrap="hard">
                                <?php echo $res['looking_for_job_description']; ?>
                            </textarea> 
                            <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox" style="height: 150px; word-break: break-all;">
                                
                            </iframe>
                              
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- TEXT EDITOR CODE ENT -->


        <!-- <div class="col-12 col-lg-3"></div> -->
        <!-- <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <div class=" d-flex">
                    <i class="fa-solid fa-desktop icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Freelancer
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
                </div>
                <div class="d-flex ml-2">
                    <i class="fa-solid fa-paint-roller icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Artist
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
                </div>
                <div class="d-flex ml-2">
                    <i class="fa-solid fa-tags icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Brand
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
                </div>
                <div class="d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Other
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
                </div>

            </div>
        </div> -->
        
    </div>

<!-- 
    <div class="row mt-3" id="myDIV_2">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-flex">
                <div class=" d-flex">
                    <i class="fa-solid fa-globe icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Astrology
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>
                <div class=" d-flex ml-2">
                    <i class="fa-solid fa-business-time icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Business
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>
                <div class=" d-flex ml-2">
                    <i class="fab fa-btc icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Crypto
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>
                <div class=" d-flex ml-2">
                    <i class="fas fa-music icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Dance
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <div class="d-flex">
                    <i class="fas fa-paint-brush icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Design
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>
                <div class="d-flex ml-2">
                    <i class="fa-solid fa-database icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Development
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>
                <div class="d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Advisor
                    <label class="toggle_1">
                        <input type="checkbox" />
                        <span class="slider round"></span>

                    </label></p>
        </div>
                <-- <button class="btn_2 d-flex ml-2">
                    <i class="icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">+ 4</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">+ ADD</p>
                </button> -->

            </div>
        </div>
    </div>
</div>


 <div class="container desktop-hidden">
     <div class="row" id="myDIV_m1">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block">
            <div class="d-flex">
                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-mobile-screen-button icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Social Media Creator</p>
                </button>
                <button class="btn_m1 d-flex ml-2">
                    <i class="fa-sharp fa-solid fa-graduation-cap icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Student</p>
                </button>
                

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">

                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-user-tie icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Professional</p>
                </button>
                <button class="btn_m1 d-flex ml-2">
                    <i class="fa-solid fa-desktop icon_margin_top ml-1" style="color: #fd9a00;"></i>
                    <p class="tabs_text_orange ml-2">Freelancer</p>
                </button>
                
                
                

            </div>
        </div>
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6 block mt-2">
            <div class="d-flex">
                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-paint-roller icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Artist</p>
                </button>
                <button class="btn_m1 d-flex">
                    <i class="fa-solid fa-tags icon_margin_top ml-1" style="color: #37c5ab;"></i>
                    <p class="tabs_text_green ml-2">Brand</p>
                </button>
                <button class="btn_m1 d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Other</p>
                </button>
            </div>
        </div>        
    </div>


    <div class="row mt-3" id="myDIV_m2">
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
                
                <button class="btn_2 d-flex ml-2">
                    <i class="fa-solid fa-circle-nodes icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">Advisor</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">+ 4</p>
                </button>
                <button class="btn_2 d-flex ml-2">
                    <i class="icon_margin_top ml-1" style="color: #328aff;"></i>
                    <p class="tabs_text_blue ml-2">+ ADD</p>
                </button>
            </div>
        </div> 
    </div> 
    
</div>





<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-7">
            <div class="row ml-2 t_5 mobile-hidden">
                <div class="col-12 col-lg-12 ml-5">
                    <div class="d-flex">
                    <a href="<?php echo SITE_URL;?>step_7"> <button type="button" class="button4 mt-4">Back</button></a>
                    &nbsp;
                    <button type="hidden" class="button4 mt-4 " onclick="check_step_five()" id="step5btn">Continue</button>
                    </div>
                </div>
            </div>
            <div class="row ml-2 t_20 desktop-hidden">
                <div class="col-12 col-lg-12">
                    <button class="button4 mt-4" onclick="window.open('https://oneprofile.online/web/7.html');">Continue</button>
                </div>
            </div>

            

        </div>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <form action="">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                            <div class="input-group" style="display: inline-flex; width: 95%;">
                            <div class="input-group-prepend">
                                <button id="button-addon2" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                            <input type="search" placeholder="Filter phrases by keyboard and job title" aria-describedby="button-addon2" class="form-control border-0 bg-light" style="box-shadow: inset 0 1px 1px rgb(191 45 45 / 0%);">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <i class="fa-solid fa-crown crown_text mt-1"></i>
                    <p class="crown_text ml-2">MOST POPULAR</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div><p class="ml-3">An artist is a person able to put their point of view, their way of seeing the world and feel things on a canvas, a sheet or paper. An artist is a dreamer, is a poet, he is a speaker, is someone provided with sensibility sufficient or necessary to make us see things through their eyes.</p></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div><p class="ml-3">Good paragraphs begin with a topic sentence that briefly explains what the paragraph is about. Next come a few sentences for development and support, elaborating on the topic with more detail. Paragraphs end with a conclusion sentence that summarizes the topic or presents one final piece of support to wrap up.</p></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div><p class="ml-3">A cryptocurrency is a digital currency that can be used to buy goods and services, but uses an online ledger with strong cryptography to secure online transactions. Much of the interest in these unregulated currencies is to trade for profit, with speculators at times driving prices skyward.</p></div>
                </div>
            </div>
        </div> 
    </div>
</div>

<?php include("footer.php"); ?>

<script src="<?= SITE_URL ?>assets/text_editor.js"></script>

<script>
    // Add active class to the current button (highlight it)
    /*var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn_1");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active", "");
    }
    this.className += " active";
    });
    }*/
</script>

<script>
    // Add active class to the current button (highlight it)
    /*var header = document.getElementById("myDIV_2");
    var btns = header.getElementsByClassName("btn_2");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active_1");
    if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active_1", "");
    }
    this.className += " active_1";
    });
    }*/
</script>

<script>
    // Add active class to the current button (highlight it)
    /*var header = document.getElementById("myDIV_m1");
    var btns = header.getElementsByClassName("btn_m1");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active_m1");
    if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active_m1", "");
    }
    this.className += " active_m1";
    });
    }*/
</script>

<script>
    // Add active class to the current button (highlight it)
    /*var header = document.getElementById("myDIV_m2");
    var btns = header.getElementsByClassName("btn_m2");
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active_m2");
    if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active_m2", "");
    }
    this.className += " active_m2";
    });
    }*/
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkbox = document.getElementById('myBtn');
        var checkbox1 = document.getElementById('myBtn1');
        var editor = document.getElementById('wc-richTextEditor-form');
        
        var savedState = localStorage.getItem('editorState');
        if (savedState === 'visible') {
            checkbox.checked = true;
            checkbox1.checked = true;
            editor.style.display = 'block'; // Always set it to 'block' when 'visible'.
        } else {
            checkbox.checked = false;
            checkbox1.checked = false;
            editor.style.display = 'block'; // Ensure it's displayed by default.
        }
    });

    function toggleEditor() {
        var editor = document.getElementById('wc-richTextEditor-form');
        var checkbox = document.getElementById('myBtn');
        if (checkbox.checked) {
            localStorage.setItem('editorState', 'visible');
        } else {
            localStorage.setItem('editorState', 'hidden');
        }
    }

    function looking_provide_service(){
        var editor = document.getElementById('wc-richTextEditor-form');
        var checkbox1 = document.getElementById('myBtn1');
        if (checkbox1.checked) {
            localStorage.setItem('editorState', 'visible');
        } else {
            localStorage.setItem('editorState', 'hidden');
        }
    }

</script>
<script>
    var iframe = document.getElementById('editor-richText-box');
    var content = '<?php echo htmlspecialchars($res['looking_for_job_description']); ?>';
    iframe.srcdoc = content;
</script>

