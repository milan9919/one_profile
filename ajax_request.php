<?php
include("config.php");

extract($_POST);
$objectives = $db->pdoQuery("SELECT * FROM tbl_user_objectives WHERE user_id = '".$_SESSION['userData']['id']."'")->results();

if (isset($_POST['action']) and $_POST['action'] == "saveStep1") {

    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];

    $db->pdoQuery("DELETE FROM tbl_user_tags WHERE user_id = $user_id ");

    if(!empty($_POST['creator'])){
        foreach($_POST['creator'] as $tag_id){
            $res = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id = '".$user_id."' AND tag_id = '". $tag_id."'")->result();

            if(empty($res)){
                $insert_array = array(
                    "user_id" => $user_id,
                    "tag_id"    => $tag_id
                );
                
                $db->insert("tbl_user_tags", $insert_array)->lastInsertId();
            }
        }    
    }
    
    // if(!empty($_POST['category'])){
    //     foreach($_POST['category'] as $tag_id){
    //         $res = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id = '".$user_id."' AND tag_id = '". $tag_id."'")->result();

    //         if(empty($res)){
    //             $insert_array = array(
    //                 "user_id" => $user_id,
    //                 "tag_id"    => $tag_id
    //             );
                
    //             $db->insert("tbl_user_tags", $insert_array)->lastInsertId();
    //         }
    //     }    
    // }
    $update_array = array("step" => 1);
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}

if (isset($_POST['action']) and $_POST['action'] == "saveStep2") {
    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];
    
    $update_array = array("step" => 2, "about_me" => $_POST['about_me']);
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}

if (isset($_POST['action']) and $_POST['action'] == "saveStep3") {
    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];
    
    $update_array = array("step" => 3, "introduction_video_link" => $_POST['link']);
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}

if (isset($_POST['action']) and $_POST['action'] == "saveStep4") {
    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];
    
    $update_array = array("step" => 4);
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}

if (isset($_POST['action']) and $_POST['action'] == "saveStep5") {
    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];
    /* $db->pdoQuery("DELETE FROM tbl_user_tags WHERE user_id = $user_id ");
    if(!empty($_POST['x_years'])){
        foreach($_POST['x_years'] as $tag_id){
            $res = $db->pdoQuery("SELECT * FROM tbl_user_tags WHERE user_id = '".$user_id."' AND tag_id = '". $tag_id."'")->result();

            if(empty($res)){
                $insert_array = array(
                    "user_id" => $user_id,
                    "tag_id"    => $tag_id
                );
                
                $db->insert("tbl_user_tags", $insert_array)->lastInsertId();
            }
        }    
    } */
    
    $update_array = array("step" => 5, "availability" => $_POST['availability'], "looking_for_job" => $_POST['looking_for_job'], "looking_for_job_description" => $_POST['looking_for_job_description']);
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}

if (isset($_POST['action']) and $_POST['action'] == "saveStep6") {
    extract($_REQUEST);

    $user_id = $_SESSION['userData']['id'];
    $db->pdoQuery("DELETE FROM tbl_user_key_results WHERE objective_id IN (SELECT id FROM tbl_user_objectives WHERE user_id = '".$user_id."')");
    $db->pdoQuery("DELETE FROM tbl_user_objectives WHERE user_id = '".$user_id."'");

    $archive_revenue_array = $_POST['archive_revenue'];
    
    if(!empty($archive_revenue_array)){
        foreach($archive_revenue_array as $i => $archive_revenue){
            if($archive_revenue != "" && $position != ""){
                $position = isset($_POST['position'][$i]) ? $_POST['position'][$i] : "";
                $start_date = isset($_POST['start_date'][$i]) ? $_POST['start_date'][$i] : "";
                $end_date = isset($_POST['end_date'][$i]) ? $_POST['end_date'][$i] : "";
                $status = isset($_POST['status_'.($i+1)]) ? 'complete' : 'ongoing';
                    
                $no_of_objective = isset($_POST['no_of_objective'][$i]) ? $_POST['no_of_objective'][$i] : "";
                
                $insert_array = array(
                    "user_id"   => $user_id,
                    "archive_revenue"    => $archive_revenue,
                    "position"    => $position,
                    "start_date"    => $start_date,
                    "end_date"    => $end_date,
                    "status"    => $status
                );
                
                if(isset($_FILES['image_'.($i+1)]['name']) && $_FILES['image_'.($i+1)]['name'] != ""){
                    $name = "objectives-".time();
            		$target_dir = DIR_UPD. "user/";
            		$target_file = $target_dir .$name."-".$_FILES['image_'.($i+1)]["name"];
            		move_uploaded_file($_FILES['image_'.($i+1)]["tmp_name"], $target_file);
            		$image = $name."-".$_FILES['image_'.($i+1)]["name"];
            		$insert_array['image'] = $image;
                }
                
                $objective_id = $db->insert("tbl_user_objectives", $insert_array)->lastInsertId();
                
                if($no_of_objective != ""){
                    $quarterly_revenues = isset($_POST['quarterly_revenue_'.$no_of_objective]) ? $_POST['quarterly_revenue_'.$no_of_objective] : [];
                    
                    if(!empty($quarterly_revenues)){
                        foreach($quarterly_revenues as $j => $quarterly_revenue){
                            if($quarterly_revenue != ""){
                                $description = isset($_POST['description_'.$no_of_objective][$j]) ? $_POST['description_'.$no_of_objective][$j] : "";
                                $skill = isset($_POST['skill_'.$no_of_objective][$j]) ? $_POST['skill_'.$no_of_objective][$j] : "";
                               
                                if (!isset($uniqueSkills[$skill])) {
                                    $uniqueSkills[$skill] = true;
                                    $insert_key_array = array(
                                        "objective_id" => $objective_id,
                                        "quarterly_revenue" => $quarterly_revenue,
                                        "description" => $description,
                                        "skill" => $skill
                                    );
                                    $db->insert("tbl_user_key_results", $insert_key_array)->lastInsertId();
                                }
                            }
                        }
                    }
                }   
            }
        }    
    }
    
    $update_array = array("step" => '6');
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}



if (isset($_POST['action']) and $_POST['action'] == "saveStep7") {
    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];

    $update_array = array("step" => '7');
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}  

if (isset($_POST['action']) and $_POST['action'] == "save_portfolio") {
    extract($_REQUEST);

    $user_id = $_SESSION['userData']['id'];
    
    $update_array = array(
        "gitub_title"       => $_POST['gitub_title'], 
        "gitub_url"         => $_POST['gitub_url'], 
        "medium_title"      => $_POST['medium_title'],
        "medium_url"        => $_POST['medium_url'], 
        "portfolio_title"   => $_POST['portfolio_title'],
        "portfolio_url"     => $_POST['portfolio_url'], 
        "references_title"  => $_POST['references_title'],
        "references_url"    => $_POST['references_url'], 
        "website_title"     => $_POST['website_title'], 
        "website_url"       => $_POST['website_url'], 
        "youtube_title"     => $_POST['youtube_title'],
        "youtube_url"       => $_POST['youtube_url']
    );
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
} 
if (isset($_POST['action']) and $_POST['action'] == "save_user_team") {

    extract($_REQUEST);
    
    $user_id = $_SESSION['userData']['id'];

    $insert_array = array(
        "user_id" => $user_id,
        "name"    => $name,
        "email"    => $email
    );
    
    $db->insert("tbl_user_team", $insert_array)->lastInsertId();
            
        
    
    $update_array = array("step" => 1);
    
    $db->update("tbl_users",$update_array,array("id"=>$user_id));
    
    $responce = array('status' => 1, "message" => "Saved successfully.");

    echo json_encode($responce);
    exit;		
}
?>
