<?php
//$page_title = 'Step 3';
$page_title = 'Comming Soon';

include("header.php");
if (!isset($_SESSION['userData'])) {
    header("Location: ".SITE_URL);
}
?>
<style>
    @keyframes load {
        0% { width: 0; }
        100% { width: 30%; }
    }
</style>

<?php 

$res =  $db->pdoQuery("SELECT * FROM tbl_users WHERE id = '".$_SESSION['userData']['id']."' ")->result();
$youtube_link = $res['introduction_video_link'];

if (!empty($youtube_link)) {
    $video_id = getYouTubeVideoId($youtube_link);

    $embed_link = 'https://www.youtube.com/embed/' . $video_id;
    $html_video = '<iframe width="205" height="120" src="' . $embed_link . '" title="YouTube video player" class="video_size" alt="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    //print_r($html_video);exit;

} else {
    $html_video = '<i class="fa fa-play-circle video_circle" style="font-size:48px;color:rgb(255, 255, 255); position: absolute; "></i><img src="./assets/imgs/shifaaz-shamoon-9K9ipjhDdks-unsplash 2.png" class="video_size" alt="" width="200" height="116">';
}
function getYouTubeVideoId($url) {
    $video_id = '';
    $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    if (preg_match($pattern, $url, $match)) {
        $video_id = $match[1];
    }
    return $video_id;
}
?>

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
                <div class="number"><p>3</p></div>
            </div>
            <div>
                <h4 class="text_blue">Give yourself a nice video introduction</h4>
                <!-- <p class="text_gray">Experts suggests that video can give a boost to your profile and you can <br> get noticed more</p> -->
            </div>
        </div>
    </div>
</div>


<div class="container mt-3 desktop-hidden">
    <div class="row">
        <div class="col-12 col-lg-12 d-flex justify-content-center desktop-hidden">
            <div class="number_circle_1">
                <div class="number_1"><p>3</p></div>
            </div>
            <div class="ml-2">
                <h4 class="text_blue mt-3">Give yourself a nice video introduction</h4>
                <p class="text_gray">Experts suggests that video can give a boost <br> to your profile and you can get noticed more</p>
                
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="video col-12 col-lg-6">
            <div class="border_video">
                <div class="d-flex justify-content-center html_video">
                    <?php echo $html_video;?>
                </div>
            </div>
        </div>
        <a href="https://www.mmhmm.app/home" target="_blank">
            <div class="video_1 col-12 col-lg-6" style="cursor: pointer;">
                <div class="video_line">
                    <p class="video_text">
                        You can create video for better impact using  
                    </p>
                    <a href="https://www.mmhmm.app/home" target="_blank"  class="d-flex justify-content-center">
                        <img src="./assets/imgs/image 28.png" alt="">
                    </a>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="container" style="margin-bottom: 80px;">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-12 col-lg-6">
            <form action="">

                <input type="text" value="<?php echo $youtube_link;?>" class="mt-5" id="introduction_video_link" name="introduction_video_link" placeholder="https://">
                <div style="color:red;" id="video_link_error"></div>
                <div class="d-flex">
                <a href="<?php echo SITE_URL;?>step_2"> <button type="button" class="button4 mt-1 mr-2">Back</button></a>
                <button type="button" class="button4 mt-1" onclick="check_step_three()" id="step3btn">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script type="text/javascript">
    
$(document).on("change","#introduction_video_link",function() 
{
    var link = $("#introduction_video_link").val();

    if(link == '')
    {
        $(".html_video").html('<i class="fa fa-play-circle video_circle" style="font-size:48px;color:rgb(255, 255, 255); position: absolute; "></i><img src="<?= SITE_IMG ?>shifaaz-shamoon-9K9ipjhDdks-unsplash 2.png" class="video_size" alt="">');        
    }
    else
    {

    $(".html_video").html('<iframe width="205" height="120" src="'+link+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    }
});    


</script>