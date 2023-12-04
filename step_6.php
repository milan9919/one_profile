<?php
// $page_title = 'Step 5';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
$objectives = $db->pdoQuery("SELECT * FROM tbl_user_objectives WHERE user_id = '".$_SESSION['userData']['id']."'")->results();

/* foreach ($objectives as $i => $value) {
    
    $key_results = $db->pdoQuery("SELECT * FROM tbl_user_key_results WHERE objective_id = '".$value['id']."'")->results();
} */
?>

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

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
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
                <div class="col-12 col-lg-12 d-flex">
                    <i class="fa-solid fa-crown crown_text mt-1"></i>
                    <p class="crown_text ml-2">MOST POPULAR</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div>
                        <p class="ml-3">An artist is a person able to put their point of view, their way of seeing the world and feel things on a canvas, a sheet or paper. An artist is a dreamer, is a poet, he is a speaker, is someone provided with sensibility sufficient
                            or necessary to make us see things through their eyes.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div>
                        <p class="ml-3">Good paragraphs begin with a topic sentence that briefly explains.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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
                    <p>5</p>
                </div>
            </div>
            <div>
                <h4 class="text_blue">Let's start with the objective you have <br> achieved or trying to achieve</h4>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1">
                    <p>6</p>
                </div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Let's start with the objective you have <br> achieved or trying to achieve</h4>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-5">
            <!-- <p class="text_black_1 h_font">Create OKR</p> -->
        </div>
    </div>
</div>
<div class="container">
    <form action="#" id="OKRForm" method="post" enctype="multipart/form-data">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6" id="objective_div">
                <?php
                if(!empty($objectives)){ 
                    foreach ($objectives as $i => $value) { 
                        $key_results = $db->pdoQuery("SELECT * FROM tbl_user_key_results WHERE objective_id = '".$value['id']."'")->results();
                        ?>
                       <div class="boxaccordion" data-count="<?php echo $i+1; ?>">
                            <div class="containerwidth">
                                <div class="wrapper_5">
                                    <button class="toggle">
                                        <div class="d-flex">
                                            <img src="<?= SITE_IMG ?>goal.png" height="40px" alt="">
                                            <p class="text_a_pg mt-1 h_font">Aspirational objective:</p>
                                        </div>
                                        <i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <input type="hidden" name="no_of_objective[]" value="<?php echo $i+1;?>">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-12">
                                                    <div class="d-flex">
                                                        <input type="text" id="archive_revenue_<?php echo $i+1;?>" name="archive_revenue[]" value="<?php echo $value['archive_revenue'];?>" placeholder="Archive record revenue while increasing profitability" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-12"></div>
                                                <div class="col-12 col-lg-12">
                                                    <p class="text_black mt-3">Employer</p>
                                                    <input type="text" id="position_<?php echo $i+1;?>" name="position[]" value="<?php echo $value['position'];?>" placeholder="Position" height="20px" style="padding: -1px 0px 2px 10px; margin: 0px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
            
                                                </div>
                                                <div class="col-6 col-lg-6">
                                                    <p class="text_black mt-3">Start Date</p>
                                                    <input class="form-control start_date" id="start_date_<?php echo $i+1;?>" name="start_date[]" value="<?php echo $value['start_date'];?>" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" type="date">
                                                    <div style="color:red;" id="start_date_error_<?php echo $i+1;?>"></div>
                                                </div>
                                                
                                                <div class="col-6 col-lg-6">
                                                    <p class="text_black mt-3">End Date</p>
                                                    <input class="form-control" id="end_date_<?php echo $i+1;?>" name="end_date[]" value="<?php echo $value['end_date'];?>" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" type="date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-12 mt-4 mb-2">
                                            <div class="field image">
                                                <label for="" class="text_black">Select Image</label>
                                                <input type="file" id="image_<?php echo $i+1;?>" name="image_<?php echo $i+1; ?>" value="<?php echo $value['image'];?>" accept=".jpeg,.jpg,.png,.gif">
                                            </div>
                                        </div>
                                        
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-12"></div>
                                                <div class=" col-12 col-lg-12 d-flex">
                                                    <img src="<?= SITE_IMG ?>goal_2.png" height="40px" alt="">
                                                    <p class="text_a_pg mt-1">Measurable key results:</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="key_results_div_<?php echo $i+1;?>">
                                        <?php 
                                        if(!empty($key_results)){ 
                                            foreach($key_results as $k => $row){ ?>
                                                <div class="key_results_div_<?php echo $i+1;?>" id="count_key_results_<?php echo $i+1;?>_<?php echo $k+1;?>" data-count="<?php echo $k+1;?>">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-12">
                                                                <!-- Add a close icon here on the right side -->
                                                                <i class="fa fa-times-circle close-icon float-right" onclick="removeKeyResults('<?php echo $i+1;?>_<?php echo $k+1;?>')" style="color: red; font-size: 20px; cursor: pointer;"></i>
                                                            </div>
                                                            <div class="col-12 col-lg-12 d-flex">
                                                                <input type="text" id="quarterly_revenue_<?php echo $i+1;?>_<?php echo $k+1;?>" name="quarterly_revenue_<?php echo $i+1;?>[]" value="<?php echo $row['quarterly_revenue'];?>" placeholder="Hit quarterly revenue of $10,000,000" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);"> 
                                                            </div>
                                                            <div class="ml-3" style="color:red;" id="quarterly_revenue_error_<?php echo $i+1;?>_<?php echo $k+1;?>"></div>
                                                            <div class="col-12 col-lg-12 d-flex">
                                                                <textarea id="description_<?php echo $i+1;?>_<?php echo $k+1;?>" name="description_<?php echo $i+1;?>[]" placeholder="Description" style="width:100%;padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);"><?php echo $row['description'];?></textarea>  
                                                            </div>
                                                            <div class="ml-3" style="color:red;" id="description_error_<?php echo $i+1;?>_<?php echo $k+1;?>"></div>
                                                            <div class="col-12 col-lg-12 d-flex mt-2">
                                                                <input type="text" id="skill_<?php echo $i+1;?>_<?php echo $k+1;?>" name="skill_<?php echo $i+1;?>[]" value="<?php echo $row['skill'];?>" data-role="tagsinput"  placeholder=" " height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                            </div>
                                                            <div class="col-12 col-lg-4">
                                                                <fieldset>
                                                                    <div class="select-wrap mb-2 mt-2" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                        
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row" id="myDIV">
                                                            <div class="col-12 col-lg-12 m_section_topa">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                        <?php }
                                        } else{ ?>
                                            <div class="key_results_div_1" id="count_key_results_1_1" data-count="1">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12">
                                                        <i class="fa fa-times-circle close-icon float-right" onclick="removeKeyResults('1_1')" style="color: red; font-size: 20px; cursor: pointer;"></i>
                                                    </div>
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <input type="text" id="quarterly_revenue_1_1" name="quarterly_revenue_1[]" placeholder="Hit quarterly revenue of $10,000,000" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                    </div>
                                                    <div class="ml-3" style="color:red;" id="quarterly_revenue_error"></div>
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <textarea id="description_1_1" name="description_1[]" placeholder="Description" style="width:100%;padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);"></textarea>
                                                    </div>
                                                    <div class="ml-3" style="color:red;" id="description_error"></div>
                                                    <div class="col-12 col-lg-12 d-flex mt-2">
                                                        <input type="text" id="skill_1_1" name="skill_1[]" data-role="tagsinput" placeholder="" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                    </div>
                                                    <div class="col-12 col-lg-4 mt-2">
                                                        <fieldset>
                                                            <div class="select-wrap mb-2 mt-2" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                
                                                            </div>
                                                        </fieldset>
                                                    </div>
                
                                                </div>
                                            </div>
                                            
                                            <div class="container">
                                                <div class="row" id="myDIV">
                                                    <div class="col-12 col-lg-12 m_section_topa">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php   
                                        } ?>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 mt-3 mb-3">
                                                    <i onclick="addKeyResults(<?php echo $i+1;?>)" class="fa fa-plus-circle add_field_button mt-2" style="color: #328aff; font-size: 30px; cursor: pointer;" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                <?php }  
                }
                else
                { ?>
                    <div class="boxaccordion" data-count="1">
                        <div class="containerwidth">
                            <div class="wrapper_5">
                                <button class="toggle">
                                    <div class="d-flex">
                                        <img src="<?= SITE_IMG ?>goal.png" height="40px" alt="">
                                        <p class="text_a_pg mt-1 h_font">Aspirational objective:</p>
                                    </div>
                                    <i class="fas fa-plus icon"></i>
                                </button>
                                <div class="content">
                                    <input type="hidden" name="no_of_objective[]" value="1">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-12">
                                                <div class="d-flex">
                                                    <input type="text" id="archive_revenue_1" name="archive_revenue[]" placeholder="Archive record revenue while increasing profitability" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-12"></div>
                                            <div class="col-12 col-lg-12">
                                                <p class="text_black mt-3">Employer</p>
                                                <input type="text" id="position_1" name="position[]" placeholder="Position" height="20px" style="padding: -1px 0px 2px 10px; margin: 0px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
        
                                            </div>
                                            <div class="col-6 col-lg-6">
                                                <p class="text_black mt-3">Start Date</p>
                                                <input class="form-control start_date" id="start_date_1" name="start_date[]" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" type="date">
                                            </div>
                                            <div style="color:red;" id="start_date_error"></div>
                                            <div class="col-6 col-lg-6">
                                                <p class="text_black mt-3">End Date</p>
                                                <input class="form-control" id="end_date_1" name="end_date[]" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 mt-4 mb-2">
                                        <div class="field image">
                                            <label for="" class="text_black">Select Image</label>
                                            <input type="file" id="image_1" name="image_1" accept=".jpeg,.jpg,.png,.gif">
                                        </div>
                                    </div>
                                    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-12"></div>
                                            <div class=" col-12 col-lg-12 d-flex">
                                                <img src="<?= SITE_IMG ?>goal_2.png" height="40px" alt="">
                                                <p class="text_a_pg mt-1">Measurable key results:</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="key_results_div_1">
                                        <div class="key_results_div_1" id="count_key_results_1_1" data-count="1">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <input type="text" id="quarterly_revenue_1_1" name="quarterly_revenue_1[]" placeholder="Hit quarterly revenue of $10,000,000" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                    </div>
                                                    <div class="ml-3" style="color:red;" id="quarterly_revenue_error"></div>
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <textarea id="description_1_1" name="description_1[]" placeholder="Description" style="width:100%;padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);"></textarea>
                                                    </div>
                                                    <div class="ml-3" style="color:red;" id="description_error"></div>
                                                    <div class="col-12 col-lg-12 d-flex">
                                                        <input type="text" id="skill_1_1" name="skill_1[]" data-role="tagsinput"  placeholder="" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                                                    </div>
                                                    <div class="col-12 col-lg-4 mt-2">
                                                        <fieldset>
                                                            <div class="select-wrap mb-2 mt-2" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">
                
                                                            </div>
                                                        </fieldset>
                                                    </div>

                
                                                </div>
                                            </div>
                                            <!--<div class="wrapper mobile-hidden mt-3" style="display: block; width: 94%; margin-left: 15px; position: relative;">
                                                <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post">
                                                    <div class="editor-controls" id="editor-controls">
                                                        <div class="rte editor button-group" id="inlineStyleGroup">
                                                            <a class="rte button editor" id="bold" title="Bold" onclick="boldSel()"><i class="fa fa-fw fa-bold"></i></a>
                                                            <a class="rte button editor" id="italic" title="Italicize" onclick="italicSel()"><i class="fa fa-fw fa-italic"></i></a>
                                                            <a class="rte button editor" id="underline" title="Underline" onclick="underlineSel()"><i class="fa fa-fw fa-underline"></i></a>
                                                            <a class="rte button editor" id="strikethrough" title="Strikethrough" onclick="strikethroughSel()"><i class="fa fa-fw fa-strikethrough"></i></a>
                                                        </div>
                                                        <div class="button-group" id="alignmentGroup">
                                                            <a class="rte button editor" id="left" title="Left-align" onclick="alignLeftSel()"><i class="fa fa-fw fa-align-left"></i></a>
                                                            <a class="rte button editor" id="center" title="Center-align" onclick="alignCenterSel()"><i class="fa fa-fw fa-align-center"></i></a>
                                                            <a class="rte button editor" id="right" title="Right-align" onclick="alignRightSel()"><i class="fa fa-fw fa-align-right"></i></a>
                                                            <a class="rte button editor" id="justify" title="Justify" onclick="alignJustifySel()"><i class="fa fa-fw fa-align-justify"></i></a>
                                                        </div>
                                                        <div class="button-group" id="listsGroup">
                                                            <a class="rte button editor" id="unordered" title="Bulleted List" onclick="newUlSel()"><i class="fa fa-fw fa-list-ul"></i></a>
                                                            <a class="rte button editor" id="ordered" title="Numbered List" onclick="newOlSel()"><i class="fa fa-fw fa-list-ol"></i></a>
                                                            <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a>
                                                        </div>
                                                    </div>
                                                    <textarea class="editor-text-box" id="editor-text-box" name="description_1[]" style="display:none" wrap="hard"></textarea>
                                                    <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox"></iframe>
                                            </form>
                                            </div>-->
                                            
                                            <!--<div class="wrapper desktop-hidden" style="display: block; width: 100%; margin-left: 0px; position: relative;">
                                                <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post">
                                                    <div class="editor-controls" id="editor-controls">
                                                        <div class="rte editor button-group" id="inlineStyleGroup">
                                                            <a class="rte button editor" id="bold" title="Bold" onclick="boldSel()"><i class="fa fa-fw fa-bold"></i></a>
                                                            <a class="rte button editor" id="italic" title="Italicize" onclick="italicSel()"><i class="fa fa-fw fa-italic"></i></a>
                                                            <a class="rte button editor" id="underline" title="Underline" onclick="underlineSel()"><i class="fa fa-fw fa-underline"></i></a>
                                                            <a class="rte button editor" id="strikethrough" title="Strikethrough" onclick="strikethroughSel()"><i class="fa fa-fw fa-strikethrough"></i></a>
                                                        </div>
                                                        <div class="button-group" id="alignmentGroup">
                                                            <a class="rte button editor" id="left" title="Left-align" onclick="alignLeftSel()"><i class="fa fa-fw fa-align-left"></i></a>
                                                            <a class="rte button editor" id="center" title="Center-align" onclick="alignCenterSel()"><i class="fa fa-fw fa-align-center"></i></a>
                                                            <a class="rte button editor" id="right" title="Right-align" onclick="alignRightSel()"><i class="fa fa-fw fa-align-right"></i></a>
                                                            <a class="rte button editor" id="justify" title="Justify" onclick="alignJustifySel()"><i class="fa fa-fw fa-align-justify"></i></a>
                                                        </div>
                                                        <div class="button-group" id="listsGroup">
                                                            <a class="rte button editor" id="unordered" title="Bulleted List" onclick="newUlSel()"><i class="fa fa-fw fa-list-ul"></i></a>
                                                            <a class="rte button editor" id="ordered" title="Numbered List" onclick="newOlSel()"><i class="fa fa-fw fa-list-ol"></i></a>
                                                            <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a>
                                                        </div>
                                                    </div>
                                                    <textarea class="editor-text-box" id="editor-text-box" name="textareaBox" style="display:none" wrap="hard"></textarea>
                                                    <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox"></iframe>
                                                </form>
                                            </div>-->
                                            <div class="container">
                                                <div class="row" id="myDIV">
                                                    <div class="col-12 col-lg-12 m_section_topa">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 mt-3 mb-3">
                                                <i onclick="addKeyResults(1)" class="fa fa-plus-circle add_field_button mt-2" style="color: #328aff; font-size: 30px; cursor: pointer;" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                
            </div>
        </div>
    </form>
</div>

<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-6 col-lg-2">
            <form action="">
                <button type="button" class="button4 mt-4" id="addObjectiveBtn" onclick="addObjective()">Add Objective</button>
            </form>
        </div>

        <div class="col-6 col-lg-2">
            <div style="color:red;" id="about_error"></div>
            <form action="">
                <button type="button" class="button4 mt-4 mb-3" id="step6btn" onclick="check_step_6()">Continue</button>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

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
    /*var header = document.getElementById("myDIV_1");
    var btns = header.getElementsByClassName("btn_2");
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
    //<![CDATA[
    
    function load_toggles(){
        let toggles = document.getElementsByClassName("toggle");
        let contentDiv = document.getElementsByClassName("content");
        let icons = document.getElementsByClassName("icon");
        
        for (let i = 0; i < toggles.length; i++) {
            toggles[i].addEventListener("click", () => {
                
                if (parseInt(contentDiv[i].style.height && contentDiv[i].style.height == "") != contentDiv[i].scrollHeight) {
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
                        contentDiv[j].style.height = "0px";
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#step6btn').click(function() {
            var isValid = true;
            
            <?php foreach ($objectives as $i => $value) { ?>
                var startDate = $('#start_date_<?php echo $i + 1; ?>').val();
                var errorDiv = $('#start_date_error_<?php echo $i + 1; ?>');

                if (startDate === "") {
                    errorDiv.html("Please enter a Start Date.");
                    isValid = false;
                } else {
                    errorDiv.html("");
                }
            <?php } ?>
            <?php foreach ($objectives as $i => $value) { ?>
                var Title = $('#quarterly_revenue_<?php echo $i+1;?>_<?php echo $k+1;?>').val();
                var errorDiv = $('#quarterly_revenue_error_<?php echo $i+1;?>_<?php echo $k+1;?>');

                if (Title === "") {
                    errorDiv.html("Please enter KR title.");
                    isValid = false;
                } else {
                    errorDiv.html("");
                }
            <?php } ?>
            <?php foreach ($objectives as $i => $value) { ?>
                var Description = $('#description_<?php echo $i+1;?>_<?php echo $k+1;?>').val();
                var errorDiv = $('#description_error_<?php echo $i+1;?>_<?php echo $k+1;?>');

                if (Description === "") {
                    errorDiv.html("Please enter Description.");
                    isValid = false;
                } else {
                    errorDiv.html("");
                }
            <?php } ?>
            
            if (isValid) {
                
                check_step_6(isValid);
            }
        });
    });
</script>

<script>
    function removeKeyResults(ele_id) {
        $("#count_key_results_" + ele_id).remove();
    }
</script>

<script src="<?= SITE_URL ?>assets/text_editor.js"></script>


