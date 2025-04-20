<?php 
include "../include/main.function.php";

$id = $_POST["id"];
$action = $_POST["action"];
$user_login =  $db ->user_id;
if($action == 'edit'){
    $id = explode('#',$_POST['id']);
    $pdf = $id[1];
    ?>
    <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#navtabs-messages" role="tab" aria-selected="true">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">View PDF</span>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content p-3 text-muted">            
            <div class="tab-pane active" id="navtabs-home" role="tabpanel">
            <iframe id="iframepdf" height="500" width="850" src="<?=$pdf;?>" frameborder="0"></iframe>
            </div>
        </div>

    <?php 
}else if($action == 'block'){
    $block= $_POST['block']?0:1;
    $qu = $db->qu->query("UPDATE `in_form` SET `is_block` = '$block' WHERE `id` = $id");
    $json_data = array("status"=> 1,"msg" => 'Updated!!');
    echo json_encode($json_data);
    die();
    
}else if ($action == 'acceptreject'){

    $id = base64_decode($id);
    $status = $_POST['status'];
    $reason = $_POST['reason'];
    $qu = $db->qu->query("UPDATE `form_detail` SET `status` = '$status' , reason = '$reason' WHERE `id` = $id");
    print_r($qu);
    die();
}else if($action == "batchadd") {

    $name = $_POST['name'];
    
    $sdate = $_POST['start'];
    $edate = $_POST['end'];
    $limit = $_POST['limit'];
    $extlimit = $_POST['elimit'];
    $location = $_POST['location'];

    $p1 = $_POST['exam1'];
    
    $p1 = $p1 == ''? '' : implode(" | ", array_filter($p1));
    
    $p2 = $_POST['exam2'];
    $p2 = $p2 == ''? '' : implode(" | ", array_filter($p2));
    
    $p3 = $_POST['exam3'];
    $p3 = $p3 == ''? '' : implode(" | ", array_filter($p3));
    $urls   = md5("admin@".date('ymd-His'));
    
    $id = (isset($_POST['update'])) ? "And id != $_POST[update]" :'' ;
    
    if(mysqli_num_rows($db->qu->query("select id from in_form where name='$name' $id"))>0){
        $msg = 'Batch name already in Record.';
        $json_data = array("status"=> 0,"msg" => $msg , 'icon'=>'warning');
        echo json_encode($json_data);
        die();
    }

    $status = 1;
    $icon = 'success';

    if(isset($_POST['update'])){
        
        $query = "UPDATE `in_form` SET name = '$name' , location = '$location', start_date ='$sdate', end_date = '$edate', p1 ='$p1', p2='$p2', 
        p3='$p3',form_limit='$limit', extar_form_limit = '$extlimit' , updated_date='NOW()'  WHERE `id` = $id";
        $msg = 'Batch Updated!!';
    
    }else{
        
        $query = "INSERT INTO `in_form`(`name`,`location` , `start_date`, `end_date`, `form_limit`, `extar_form_limit`, `url` , `p1`, `p2`, `p3` ) 
        VALUES ( '$name', '$location' , '$sdate' , '$edate' , $limit , $extlimit , '$urls' , '$p1', '$p2', '$p3')";
        $msg = 'Batch Inserted!!';
    }

    if(!$db->qu->query($query)){
        $status = 0;
        $msg = 'There is some error!! Please try again.';
        $icon = 'error';
    }

        $json_data = array("status"=> $status,"msg" => $msg , 'icon'=> $icon);
        echo json_encode($json_data);
    die();
} ?>