<?php
    require_once 'dompdf/autoload.inc.php';
    require_once "include/main.function.php";
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    
if(isset($_POST['insert'])){

    // $formid = mysqli_fetch_row($db->getall("in_form where id = $_POST[form_id]" , 'url'))[0];
    $formid = $db->formlimit(['XfsadrtTTSd2' => $formid]);
    // if(!is_int($formid)){
    //     $json_data = array("status"=> 4,"id"=> 0,"msg" => "$formid" , "st" => 'warning', 'title'=> 'Error!');
    //     echo json_encode($json_data);
    //     die();
    // }
    // // die();

    // $nic = $db->niccheck($_POST['NIC'], $_POST['form_id']);
    // if($nic){
    //     $json_data = array("status"=> 3,"id"=> 0,"msg" => "ID already enrolled for current exam.", "title"=> "Candidate ID");
    //     echo json_encode($json_data);
    //     die();
    // }
    

    // $nic = $_POST['NIC'];
    // $last_name = $_POST['lastname'];
    // $usual = $_POST['usualforename'];
    // $fullname = $_POST['fullname'];
    // $pox = $_POST['address'];
    // $district = $_POST['district'];
    // $city = $_POST['city'];
    // $region = $_POST['region'];
    // $country = $_POST['country'];
    // $home_phone = $_POST['telephone'];
    // $work_phone = $_POST['worknumber'];
    // $email = $_POST['email'];
    // $passp1 = $_POST['datep1'];
    // $passp2 = $_POST['datep2'];
    // $count_pce = $_POST['postgraduate'];
    // $count_oeo = $_POST['ethnicOrigin'];
    // $regis_num = $_POST['regnum'];
    // $regis_auth = $_POST['regauth'];
    // $date_reg = $_POST['regdate'];
    // $osce = $_POST['osce'];
    // $pref_d1 = implode(" - ", $_POST['predate1']);
    // $pref_d2 = implode(" - ", $_POST['predate2']);
    // $pref_d3 = implode(" - ", $_POST['predate3']);
    // $bank_acc = $_POST['bank'];
    // $bank_name = $_POST['bankname'];
    // $b_fullname = $_POST['fullnamesignature'];
    // $b_date = $_POST['dateofapply'];
    $action = $_POST['form_action'];
    // $form_title = explode("|" , "$_POST[form_title]");
    
    // $html = $_POST['html'];
    
   
    ob_start();
    $other = '';
    $pass = '';
    $sign ='';
    $alert = 0;
    $alertmdg = '';
   
    $_GET['XfsadrtTTSd2'] = 'dc104753956f3754cbdc5ef417104a0f';
    include('form-bkp.php');
    // include('form.php');
    
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    // print_r($html);
    // die();
    $dompdf->setPaper('A4', '');
    $dompdf->render();
    $output = $dompdf->output();

    if($action == 'view'){
        $pdfBase64 = base64_encode($output);
        $json_data = array("status"=> 2,"id"=> 0,"msg" => "$pdfBase64");
        echo json_encode($json_data);    
        die();
    }



    // end /////////////////////////////////////////////


    $nic_insert = "INSERT INTO `form_nic`(`customer_name`, customer_num) VALUES ('$_POST[NIC]' ,$_POST[form_id] )";
    $qus = $db->qu->query($nic_insert);
    $nic_id = $db->qu->insert_id;
    
    if($nic_id){
        $select = '';
        $nic = $_POST['NIC'];
        $name = trim($_POST['usualforename']);
        unset($_POST['NIC']);
        unset($_POST['insert']);
        unset($_POST['form_id']);
        unset($_POST['form_action'] );
        unset($_POST['form_title']);
        $arr = array_filter($_POST, function($value) {
            return $value !== 'undefined';
        });
       
        if (!file_exists('upload')) {
            mkdir('upload', 0777, true);
        }
        

        $img_passport = ($_FILES['passport']['name'] != null)? $target_dir ."passport-$name-($nic)-".  strtotime(date('Ymd-His')).'.'.pathinfo($_FILES['passport']['name'], PATHINFO_EXTENSION) : '' ;
        $signature = ($_FILES['signature']['name'] != null)? $target_dir ."signature-$name-($nic)-".  strtotime(date('Ymd-His')).'.'.pathinfo($_FILES['signature']['name'], PATHINFO_EXTENSION) : '' ;
        


        $arr[] = $nic_id; 
        $arr[] = $img_passport; 
        $arr[] = $signature;

        $att = array();
        foreach ($_FILES['attachments']['name'] as $key => $value) {
            if($value){
                $att[$key] = $target_dir."img$key-$name-($nic)-".  strtotime(date('Ymd-His')).'.'.pathinfo($value, PATHINFO_EXTENSION);
            }
        }
        foreach ($_FILES['attachments']['tmp_name'] as $key => $value) {      
            move_uploaded_file($value, $att[$key]);
        }

        $att = implode(",", $att);
        $arr[] = $att;
        
        

        $select =  array_map(function($item) {
            return (is_array($item)) ? "'" . implode(" - ", $item)."'"  : "'" . $item . "'" ;
        }, $arr);

        $select = implode(",", $select);
        

        if(move_uploaded_file($_FILES['passport']['tmp_name'], $img_passport) && move_uploaded_file($_FILES['signature']['tmp_name'], $signature)) {
            // echo "The file ". htmlspecialchars($image). " has been uploaded.";
        }
        $select = 
        "INSERT INTO `form_detail`(  `full_name`, 
        `po_box`, 
        `district`, 
        `city_town_village`, 
        `province_region`, 
        `country`, 
        `home_telephone`, 
        `work_telephone`, 
        `email`, 
        `DOF_part1_exam`, 
        `DOF_part2_exam`, 
        `COPC_exp`, 
        `COE_origin`, 
        `registration_auth`, 
        `registration_num`, 
        `registration_date`, 
        `preference_date1`, 
        `preference_date2`, 
        `preference_date3`, 
        `fullname_end`, 
        `date_end`, 
        `form_id`, 
        `img_passport` , 
        `signature`, 
        `other_att` )
        VALUES ($select)";
        if($db->qu->query($select)){
           
            if (!file_exists('pdfs')) {
                mkdir('pdfs', 0777, true);
            }
        
            $pdfFilePath = "pdfs/form-$name-($nic)-".  strtotime(date('Ymd-His')).'.pdf';
            if(file_put_contents($pdfFilePath, $output)){
                $urls = sprintf(
                    "%s://%s%s",
                    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                    $_SERVER['HTTP_HOST'],
                    "/$pdfFilePath"
                );
                $id     = $db->qu->insert_id;
                $db -> qu -> query("UPDATE `form_detail` SET `form_pdf` = '/$pdfFilePath' WHERE `form_detail`.`id` = $id");
                $status = 1;
                $header = "<h3>Successfully Inserted!!</h3>";
                $msg    = "<p>For preview final PDF <a target='v' href='$urls'>Click Me</a></p>";
                // $msg    = '<iframe width="1000" height="500" src="'.$urls.'" frameborder="0"></iframe>';
                $json_data = array("status"=> $status,"id"=> $id,"msg" => $msg , "head"=>$header, "st" => 'success');
                echo json_encode($json_data);
                die();
            }
        
        }else{
            $db->qu->query("DELETE FROM form_nic WHERE `form_nic`.`id` = $nic_id");
            $status = 4;
            $id     = 0;
            $msg    = 'There is some issue.';
            $json_data = array("status"=> $status,"id"=> $id,"msg" => $msg, "st" => 'error', 'title'=> 'Error!');
            echo json_encode($json_data);
            die();
        }
    }
}else{
    $nic = $db->niccheck($_POST['NIC'], $_POST['form_id']); 
    if($nic){
        echo "Candidate ID already enrolled for current exam.";
    }else{
        echo 'false';
    }
}
?>