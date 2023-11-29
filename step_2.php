<?php
// $page_title = 'Step 2';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<style>
    @keyframes load {
        0% {
            width: 0;
        }
        100% {
            width: 20%;
        }
    }
    iframe body  {
            max-width: 100%;
            word-break: break-all;
        }
    element style {
        max-width: 100%;
            word-break: break-all;
    }
</style>
<iframe><html><head></head>
<body style="
        max-width: 100%;
        word-break: break-all; 
    ">
    </body></html></iframe>
<div class="container" style="margin-top: 28px;">
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
                <div class="number">
                    <p>2</p>
                </div>
            </div>
            <div>
                <h4 class="text_blue ml-4">Nice to meet you, give yourself a great Bio/About <br> Me so that others can know you well</h4>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1">
                    <p>2</p>
                </div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Nice to meet you, give yourself <br> a great Bio/About Me so that <br> others can know you well</h4>
            </div>
        </div>
    </div>
</div>


<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-7">

            <div class="wrapper mobile-hidden" style="display: block; width: 74%; margin-left: 48px; position: relative;">
                <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post">

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
                            <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a>

                        </div>



                    </div>

                    <!-- Editor text box -->
                    <textarea class="editor-text-box" id="editor-text-box" name="about_me" style="width: 100%; max-width: 100%; display:none" wrap="hard">
                        
                    </textarea>
                    <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox" style="height: 150px; word-break: break-all;"></iframe>
                    </iframe>   
                </form>
            </div>
            <div class="wrapper desktop-hidden" style="display: block; width: 100%; margin-left: 0px; position: relative;">
                <form name="wc-richTextEditor" id="wc-richTextEditor-form" class="wc-richTextEditor" action="#" method="post">

                    <!-- Editor Control Box -->
                    <div class="editor-controls" id="editor-controls">

                        <!-- Font Size -->
                        <!-- <div class="rte editor button-group" id="textSizeGroup">
                                <div class="rte editor dropdown-label"><i class="fa fa-fw fa-text-height"></i></div>
                                <select class="rte dropdown editor" id="fontSize" title="Font Size" onclick=""><i class="fa fa-fw fa-font"></i>
                                    <option value="1" size="1">1</option>
                                    <option value="2" size="2">2</option>
                                    <option value="3" size="3">3</option>
                                    <option value="4" size="4">4</option>
                                    <option value="5" size="5">5</option>
                                    <option value="6" size="6">6</option>
                                    <option value="7" size="7">7</option>
                                </select>
                            </div> -->



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
                            <a class="btn_editor custom-btn ml-1" id="myBtn" class="btn1">Predefined Text</a>

                        </div>



                    </div>

                    <!-- Editor text box -->
                    
                    <textarea class="editor-text-box" id="editor-text-box" name="textareaBox" style="width: 100%; max-width: 100%;">
                        
                    </textarea>
                    <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox" style="height: 150px; word-break: break-all;">
                    </iframe>   
                </form>
            </div>
            <div class="row py-5 mobile-hidden mt-5 ml-5">
                <div class="col-12 col-lg-12 mt-5">
                    <div style="color:red;" id="about_error"></div>
                    <div class="d-flex mt-5 mb-5">
                        <a href="<?php echo SITE_URL;?>step_1"> <button type="button" class="button4 mr-3">Back</button></a>
                        <button type="button" class="button4" onclick="check_step_two()">Continue</button>
                        
                    </div>
                </div>
            </div>
            <div class="row ml-2 t_20 desktop-hidden mt-5 mb-5">
                <div class="col-12 col-lg-12 mb-5 mt-5">
                    <button class="button4 mt-4" onclick="window.open('https://oneprofile.online/web/0.html');">Back</button>
                    <button class="button4 mt-4" onclick="window.open('https://oneprofile.online/web/3.html');">Continue</button>
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
                    <div>
                        <p class="ml-3">An artist is a person able to put their point of view, their way of seeing the world and feel things on a canvas, a sheet or paper. An artist is a dreamer, is a poet, he is a speaker, is someone provided with sensibility sufficient
                            or necessary to make us see things through their eyes.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div>
                        <p class="ml-3">Good paragraphs begin with a topic sentence that briefly explains what the paragraph is about. Next come a few sentences for development and support, elaborating on the topic with more detail. Paragraphs end with a conclusion
                            sentence that summarizes the topic or presents one final piece of support to wrap up.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div><i class="fa-regular fa-circle-left" style="font-size: 25px;"></i></div>
                    <div>
                        <p class="ml-3">A cryptocurrency is a digital currency that can be used to buy goods and services, but uses an online ledger with strong cryptography to secure online transactions. Much of the interest in these unregulated currencies is to
                            trade for profit, with speculators at times driving prices skyward.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="<?= SITE_URL ?>assets/text_editor.js"></script>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn1");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
