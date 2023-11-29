<?php
//$page_title = 'Step 4';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
?>
<style>
    @keyframes load {
        0% { width: 0; }
        100% { width: 40%; }
    }
</style>
<div class="container" style="margin-top: 130px;">
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
                <div class="number"><p>4</p></div>
            </div>
            <div>
                <h4 class="text_blue ml-3">Let's show the impact you have created </h4>
                <p class="text_4_gray ml-3">Let's begin!</p>
            </div>
        </div>
    </div>
</div>


<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1"><p>4</p></div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Let's show the impact you have created</h4>
                <p class="text_4_gray">Let's begin!</p>
                
            </div>
        </div>
    </div>
</div>



<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-6">
            <form action="">
                <div class="d-flex">
                <a href="<?php echo SITE_URL;?>step_3"> <button type="button" class="button4 mt-4">Back</button></a>
                <button type="button" class="button4 mt-4" onclick="check_step_four()" style="margin-left: 45px;" id="step4btn">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
