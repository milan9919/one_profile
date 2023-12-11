$(document).ready(function() {
    $('.check-tags').change(function() {
        if(this.checked) {
            $(this).parent().addClass("active");
        }
        else{
            $(this).parent().removeClass("active");
        }
    });
    
});
$(document).on('keypress', '#OKRForm',function(e){
    var keyPressed = event.keyCode || event.which; 
    if (keyPressed === 13) { 
        e.preventDefault(); 
        return false; 
    } 
});
function check_step_one(){
    var is_valid = 1;
    if($("input[name='creator[]']:checked").length == 0){
        $("#creator_error").html("Please select atleast one creator!");
        is_valid = 0;
    }
    // if($("input[name='category[]']:checked").length == 0){
    //     $("#category_error").html("Please select atleast one category!");
    //     is_valid = 0;
    // }
    
    if(is_valid == 1){
        $("#creator_error").html("");
        
        var creator = [];
        //var category = []
        $("input[name='creator[]']:checked").each(function() {
           creator.push($(this).val());
        });
        // $("input[name='category[]']:checked").each(function() {
        //    category.push($(this).val());
        // });
          
        var data = {
            action: "saveStep1",
            creator: creator,
           // category: category
          };
          
        var $btn = $('#step1btn');
        $btn.html('Loading...');
        $btn.attr('disabled', true);

        $.ajax({
            url: SITE_URL + "ajax_request",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(response) {
                $btn.html('Continue');
                $btn.attr('disabled', false);
                window.location.href = SITE_URL + "step_2";
            }
        });
    }
}

function check_step_two(){
    var about_me = window.frames['richTextBox'].document.body.innerHTML;
    
    if(about_me == ""){
        $("#about_error").html("Please enter Bio/About Me !");
    }else{
        $("#about_error").html("");
        var data = {
            action: "saveStep2",
            about_me: about_me
          };
          
        var $btn = $('#step2btn');
        $btn.html('Loading...');
        $btn.attr('disabled', true);

        $.ajax({
            url: SITE_URL + "ajax_request",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(response) {
                $btn.html('Continue');
                $btn.attr('disabled', false);
                window.location.href = SITE_URL + "step_3";
            }
        });
    }
}
function goBack() {
    
    window.location.href = SITE_URL + "step_1";
}

function check_step_three(){
    var introduction_video_link = $("#introduction_video_link").val();
    if (introduction_video_link !== "") {
        var re = /^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/;
        if (!re.test(introduction_video_link)) {
            $("#video_link_error").html("Please enter a valid URL!");
        } else {
            $("#video_link_error").html("");
            var data = {
                action: "saveStep3",
                link: introduction_video_link
              };
              
            var $btn = $('#step3btn');
            $btn.html('Loading...');
            $btn.attr('disabled', true);
    
            $.ajax({
                url: SITE_URL + "ajax_request",
                type: "POST",
                data: data,
                dataType: 'json',
                success: function(response) {
                    $btn.html('Ok');
                    $btn.attr('disabled', false);
                    window.location.href = SITE_URL + "step_4";
                }
            });   
        }
    }
    else
    {
        $("#video_link_error").html("");
        var data = {
            action: "saveStep3",
            link: introduction_video_link
          };
          
        var $btn = $('#step3btn');
        $btn.html('Loading...');
        $btn.attr('disabled', true);

        $.ajax({
            url: SITE_URL + "ajax_request",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(response) {
                $btn.html('Ok');
                $btn.attr('disabled', false);
                window.location.href = SITE_URL + "step_4";
            }
        });    
    }
}

function check_step_four() {
    var data = {
        action: "saveStep4"
    };

    var $btn = $('#step4btn');
    $btn.html('Loading...');
    $btn.attr('disabled', true);

    $.ajax({
        url: SITE_URL + "ajax_request",
        type: "POST",
        data: data,
        dataType: 'json',
        success: function (response) {
            $btn.html('Continue');
            $btn.attr('disabled', false);
            window.location.href = SITE_URL + "step_6";
        }
    });
}

function check_step_five() {
    

    var is_valid = 1;
    
    if (is_valid == 1) {
        $("#x_years_tags_error").html("");
        var looking_for_job_description = window.frames['richTextBox'].document.body.innerHTML;
        /* var x_years = [];
        $("input[name='x_years[]']:checked").each(function () {
            x_years.push($(this).val());
        }); */

        var looking_for_job = 0;
        if ($("input[name='looking_for_job']").is(":checked")) {
            looking_for_job = 1;
        }

        var data = {
            action: "saveStep5",
            looking_for_job_description: looking_for_job_description,
            looking_for_job: looking_for_job
        };

        var $btn = $('#step5btn');
        $btn.html('Loading...');
        $btn.attr('disabled', true);

        $.ajax({
            url: SITE_URL + "ajax_request",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function (response) {
                $btn.html('Continue');
                $btn.attr('disabled', false);
                window.location.href = SITE_URL + "my_profile";
            }
        });
    }
}


function check_step_6(isValid) {
    
    if (isValid) {
        
        var formData = new FormData($("#OKRForm")[0]);
        formData.append('action', 'saveStep6');
        /*var data = $("#OKRForm").serializeArray();
        data.push({
            name: 'action',
            value: 'saveStepA'
        });*/
        
        var $btn = $('#step6btn');
        $btn.html('Loading...');
        $btn.attr('disabled', true);

        $.ajax({
            url: SITE_URL + "ajax_request",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                $btn.html('Next');
                $btn.attr('disabled', false);
                window.location.href = SITE_URL + "step_7";
            }
        });
    }
}

function check_step_seven() {
    var formData = new FormData($("#OKRForm")[0]);
    formData.append('action', 'saveStep7');
    
    var $btn = $('#step7btn');
    $btn.html('Loading...');
    $btn.attr('disabled', true);

    $.ajax({
        url: SITE_URL + "ajax_request",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
            $btn.html('Next');
            $btn.attr('disabled', false);
            window.location.href = SITE_URL + "step_5";
        }
    });
}
function save_portfolio() {
    var formData = new FormData($("#editPortfolioForm")[0]);
    formData.append('action', 'save_portfolio');
    
    var $btn = $('#save');
    $btn.html('Loading...');
    $btn.attr('disabled', true);

    $.ajax({
        url: SITE_URL + "ajax_request",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
            $btn.html('SAVE');
            $btn.attr('disabled', false);
            window.location.href = SITE_URL + "profile";
        }
    });
}

function save_user_team() {
    var formData = new FormData($("#user_team")[0]);
    formData.append('action', 'save_user_team');
    
    var $btn = $('#save');
    $btn.html('Loading...');
    $btn.attr('disabled', true);

    $.ajax({
        url: SITE_URL + "ajax_request",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
            $btn.html('SAVE');
            $btn.attr('disabled', false);
            window.location.href = SITE_URL + "profile";
        }
    });
}

function addObjective() {
    var count = parseInt($(".boxaccordion:last-child").attr("data-count")) + 1;

    var html = '<div class="boxaccordion" data-count="' + count +'">\
                    <div class="containerwidth">\
                        <div class="wrapper_5">\
                            <button class="toggle">\
                                <div class="d-flex">\
                                    <img src="'+ SITE_URL + 'assets/imgs/goal.png" height="40px" alt="">\
                                    <p class="text_a_pg mt-1 h_font">Aspirational objective:</p>\
                                </div>\
                                <i class="fas fa-plus icon"></i>\
                            </button>\
                            <div class="content">\
                                <input type="hidden" name="no_of_objective[]" value="' + count +'">\
                                <div class="container">\
                                    <div class="row">\
                                        <div class="col-12 col-lg-12">\
                                            <div class="d-flex">\
                                                <input type="text" id="archive_revenue_' + count +'" name="archive_revenue[]" placeholder="Archive record revenue while increasing profitability" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="container">\
                                    <div class="row">\
                                        <div class="col-12 col-lg-12"></div>\
                                        <div class="col-12 col-lg-12">\
                                            <p class="text_black mt-3">Employer</p>\
                                            <input type="text" id="position_' + count +'" name="position[]" placeholder="Position" height="20px" style="padding: -1px 0px 2px 10px; margin: 0px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                                        </div>\
                                        <div class="col-6 col-lg-6">\
                                            <p class="text_black mt-3">Start Date</p>\
                                            <input class="form-control" id="start_date_' + count +'" name="start_date[]" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" type="date">\
                                        </div>\
                                        <div class="col-6 col-lg-6">\
                                            <p class="text_black mt-3">End Date</p>\
                                            <input class="form-control" id="end_date_' + count +'" name="end_date[]" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" type="date">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="col-12 col-lg-12 mt-4 mb-2">\
                                    <div class="field image">\
                                        <label for="" class="text_black">Select Image</label>\
                                        <input type="file" id="image_' + count +'" name="image_' + count +'" accept=".jpeg,.jpg,.png,.gif">\
                                    </div>\
                                </div>\
                                \
                                <div class="container">\
                                    <div class="row">\
                                        <div class="col-12 col-lg-12"></div>\
                                        <div class=" col-12 col-lg-12 d-flex">\
                                            <img src="'+ SITE_URL + 'assets/imgs/goal_2.png" height="40px" alt="">\
                                            <p class="text_a_pg mt-1">Measurable key results:</p>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div id="key_results_div_' + count +'">\
                                    <div class="key_results_div_' + count +'" id="count_key_results_' + count +'_1" data-count="1">\
                                        <div class="container">\
                                            <div class="row">\
                                                <div class="col-12 col-lg-12 d-flex">\
                                                    <input type="text" id="quarterly_revenue_' + count +'_1" name="quarterly_revenue_' + count +'[]" placeholder="Hit quarterly revenue of $10,000,000" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                                                </div>\
                                                <div class="col-12 col-lg-12 d-flex">\
                                                    <textarea id="description_' + count +'_1" name="description_' + count +'[]" placeholder="Description" style="width:100%;padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);"></textarea>\
                                                </div>\
                                                <div class="col-12 col-lg-12 d-flex mt-2">\
                                                    <input type="text" id="skill_' + count +'_1" name="skill_' + count +'[]" data-role="tagsinput" placeholder="" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                                                </div>\
                                                <div class="col-12 col-lg-4">\
                                                    <fieldset>\
                                                        <div class="select-wrap mb-2 mt-2" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                                                        </div>\
                                                    </fieldset>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="container">\
                                    <div class="row">\
                                        <div class="col-12 col-lg-12 mt-3 mb-3">\
                                            <i onclick="addKeyResults(' + count +')" class="fa fa-plus-circle add_field_button mt-2" style="color: #328aff; font-size: 30px; cursor: pointer;" aria-hidden="true"></i>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>';
                
    /*<div class="wrapper mobile-hidden mt-3" style="display: block; width: 94%; margin-left: 15px; position: relative;">\
        <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post">\
            <div class="editor-controls" id="editor-controls">\
                <div class="rte editor button-group" id="inlineStyleGroup">\
                    <a class="rte button editor" id="bold" title="Bold" onclick="boldSel()"><i class="fa fa-fw fa-bold"></i></a>\
                    <a class="rte button editor" id="italic" title="Italicize" onclick="italicSel()"><i class="fa fa-fw fa-italic"></i></a>\
                    <a class="rte button editor" id="underline" title="Underline" onclick="underlineSel()"><i class="fa fa-fw fa-underline"></i></a>\
                    <a class="rte button editor" id="strikethrough" title="Strikethrough" onclick="strikethroughSel()"><i class="fa fa-fw fa-strikethrough"></i></a>\
                </div>\
                <div class="button-group" id="alignmentGroup">\
                    <a class="rte button editor" id="left" title="Left-align" onclick="alignLeftSel()"><i class="fa fa-fw fa-align-left"></i></a>\
                    <a class="rte button editor" id="center" title="Center-align" onclick="alignCenterSel()"><i class="fa fa-fw fa-align-center"></i></a>\
                    <a class="rte button editor" id="right" title="Right-align" onclick="alignRightSel()"><i class="fa fa-fw fa-align-right"></i></a>\
                    <a class="rte button editor" id="justify" title="Justify" onclick="alignJustifySel()"><i class="fa fa-fw fa-align-justify"></i></a>\
                </div>\
                <div class="button-group" id="listsGroup">\
                    <a class="rte button editor" id="unordered" title="Bulleted List" onclick="newUlSel()"><i class="fa fa-fw fa-list-ul"></i></a>\
                    <a class="rte button editor" id="ordered" title="Numbered List" onclick="newOlSel()"><i class="fa fa-fw fa-list-ol"></i></a>\
                    <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a>\
                </div>\
            </div>\
            <textarea class="editor-text-box" id="editor-text-box" name="description_1[]" style="display:none" wrap="hard"></textarea>\
            <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox"></iframe>\
       </form>\
    </div>\*/

    $("#objective_div").append(html);

    // $('#skill_' + count +'_1').tagsinput('items');
    //$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();

    load_toggles();
}

function addKeyResults(row_id){
    var count = parseInt($(".key_results_div_"+row_id+":last-child").attr("data-count")) + 1;
    var ele_id = row_id +"_"+count;
    
    var html = '<div class="key_results_div_'+row_id+' mt-3" id="count_key_results_' + ele_id +'" data-count="' + count +'">\
                    <div class="container">\
                        <div class="row">\
                            <div class="col-12 col-lg-12">\
                                <i class="fa fa-times-circle close-icon float-right" onclick="removeKeyResults(\'' + ele_id + '\')" style="color: red; font-size: 20px; cursor: pointer;"></i>\
                            </div>\
                            <div class="col-12 col-lg-12 d-flex">\
                                <input type="text" id="quarterly_revenue_' + ele_id +'" name="quarterly_revenue_'+row_id+'[]" placeholder="Hit quarterly revenue of $10,000,000" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                            </div>\
                            <div class="col-12 col-lg-12 d-flex">\
                                <textarea id="description_' + ele_id +'" name="description_' + row_id +'[]" placeholder="Description" style="width:100%;padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);"></textarea>\
                            </div>\
                            <div class="col-12 col-lg-12 d-flex mt-2">\
                                <input type="text" id="skill_' + ele_id +'" name="skill_'+row_id+'[]" data-role="tagsinput" placeholder="" height="20px" style="padding: 2px 10px 2px 10px; box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);">\
                            </div>\
                            <div class="col-12 col-lg-4">\
                                <fieldset>\
                                    <div class="select-wrap mb-2 mt-2" style="box-shadow: 0 2px 6px rgb(0 0 0 / 7%), 0 1px 6px rgb(0 0 0 / 20%);" >\
                                    </div>\
                                </fieldset>\
                            </div>\
                        </div>\
                    </div>\
                </div>';
                
    $("#key_results_div_" + row_id).append(html);
    
    function removeKeyResults(ele_id) {
        $("#count_key_results_" + ele_id).slideUp(function() {
            $(this).remove();
        });
    }
    /*<div class="wrapper mobile-hidden mt-3" style="display: block; width: 94%; margin-left: 15px; position: relative;">\
        <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post">\
            <div class="editor-controls" id="editor-controls">\
                <div class="rte editor button-group" id="inlineStyleGroup">\
                    <a class="rte button editor" id="bold" title="Bold" onclick="boldSel()"><i class="fa fa-fw fa-bold"></i></a>\
                    <a class="rte button editor" id="italic" title="Italicize" onclick="italicSel()"><i class="fa fa-fw fa-italic"></i></a>\
                    <a class="rte button editor" id="underline" title="Underline" onclick="underlineSel()"><i class="fa fa-fw fa-underline"></i></a>\
                    <a class="rte button editor" id="strikethrough" title="Strikethrough" onclick="strikethroughSel()"><i class="fa fa-fw fa-strikethrough"></i></a>\
                </div>\
                <div class="button-group" id="alignmentGroup">\
                    <a class="rte button editor" id="left" title="Left-align" onclick="alignLeftSel()"><i class="fa fa-fw fa-align-left"></i></a>\
                    <a class="rte button editor" id="center" title="Center-align" onclick="alignCenterSel()"><i class="fa fa-fw fa-align-center"></i></a>\
                    <a class="rte button editor" id="right" title="Right-align" onclick="alignRightSel()"><i class="fa fa-fw fa-align-right"></i></a>\
                    <a class="rte button editor" id="justify" title="Justify" onclick="alignJustifySel()"><i class="fa fa-fw fa-align-justify"></i></a>\
                </div>\
                <div class="button-group" id="listsGroup">\
                    <a class="rte button editor" id="unordered" title="Bulleted List" onclick="newUlSel()"><i class="fa fa-fw fa-list-ul"></i></a>\
                    <a class="rte button editor" id="ordered" title="Numbered List" onclick="newOlSel()"><i class="fa fa-fw fa-list-ol"></i></a>\
                    <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a>\
                </div>\
            </div>\
            <textarea class="editor-text-box" id="editor-text-box" name="description_'+row_id+'[]" style="display:none" wrap="hard"></textarea>\
            <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox"></iframe>\
       </form>\
    </div>\*/
    
    var index = $("#key_results_div_" + row_id).closest('.boxaccordion').data('count') - 1;
    
    let contentDiv = document.getElementsByClassName("content");
    contentDiv[index].style.height = contentDiv[index].scrollHeight + "px";
}


