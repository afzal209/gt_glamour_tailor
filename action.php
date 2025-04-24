<?php
    require_once 'dompdf/autoload.inc.php';
    require_once "include/main.function.php";
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    // echo 'tyes';
    // print_r($_POST['insert']);
    // exit;
    $action = $_POST["action"];
if($action == 'insert'){
    echo 'tyes';
    // print_r($_POST['bill_num']);
    // exit;
    // $formid = mysqli_fetch_row($db->getall("in_form where id = $_POST[form_id]" , 'url'))[0];
    // $formid = $db->formlimit(['XfsadrtTTSd2' => $formid]);
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
    
    $form_id = $_POST['form_id'];
    $bill = $_POST['bill'];
    $customer_id = $_POST['customer_id'];
    $a3 = $_POST['a3'];
    $a3b = $_POST['a3b'];
    $b6 = $_POST['b6'];
    $b5 = $_POST['b5'];
    $b4 = $_POST['b4'];
    $b9 = $_POST['b9'];
    $b8 = $_POST['b8'];
    $b7 = $_POST['b7'];
    $b12 = $_POST['b12'];
    $b11 = $_POST['b11'];
    $b10 = $_POST['b10'];
    $b15 = $_POST['b15'];
    $b14 = $_POST['b14'];
    $b13 = $_POST['b13'];
    $b18 = $_POST['b18'];
    $b17 = $_POST['b17'];
    $b16 = $_POST['b16'];
    $b21 = $_POST['b21'];
    $b20 = $_POST['b20'];
    $b19 = $_POST['b19'];
    $b24 = $_POST['b24'];
    $b23 = $_POST['b23'];
    $b22 = $_POST['b22'];
    $b27 = $_POST['b27'];
    $b26 = $_POST['b26'];
    $b25 = $_POST['b25'];
    $b30 = $_POST['b30'];
    $b29 = $_POST['b29'];
    $b28 = $_POST['b28'];
    $b33 = $_POST['b33'];
    $b32 = $_POST['b32'];
    $b31 = $_POST['b31'];
    $b36 = $_POST['b36'];
    $b35 = $_POST['b35'];
    $b34 = $_POST['b34'];
    $b39 = $_POST['b39'];
    $b38 = $_POST['b38'];
    $b37 = $_POST['b37'];
    $b42 = $_POST['b42'];
    $b41 = $_POST['b41'];
    $b40 = $_POST['b40'];
    $b45 = $_POST['b45'];
    $b44 = $_POST['b44'];
    $b43 = $_POST['b43'];
    $qty = $_POST['qty'];
    $desc = $_POST['desc'];
    $button_type = $_POST['button_type'];
    $button_num = $_POST['button_num'];
    $sheling = $_POST['sheling'];
    $design = $_POST['design'];
    $suit = $_POST['suit'];
    $speciaamount = $_POST['speciaamount'];
    $total = $_POST['total'];
    $dis = $_POST['dis'];
    $adv = $_POST['adv'];
    $bal = $_POST['bal'];

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
   
    // $_GET['XfsadrtTTSd2'] = 'dc104753956f3754cbdc5ef417104a0f';
    // include('form-bkp.php');
    // include('form.php');
    
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    // print_r($html);
    // die();
    $dompdf->setPaper('A4', '');
    $dompdf->render();
    $output = $dompdf->output();

    // if($action == 'view'){
    //     $pdfBase64 = base64_encode($output);
    //     $json_data = array("status"=> 2,"id"=> 0,"msg" => "$pdfBase64");
    //     echo json_encode($json_data);    
    //     die();
    // }



    // end /////////////////////////////////////////////
    

    $nic_insert = "INSERT INTO `form_nic`( `nic`, `form_id`) VALUES ('$bill','$form_id')";
    // echo $nic_insert;
    // die();
    
    $qus = $db->qu->query($nic_insert);
    $nic_id = $db->qu->insert_id;
    
    if($nic_id){
        $select = '';
        $nic = $nic_id;
        
        


        
        $att = array();
        
        
        

        $select = 
        "INSERT INTO `form_details`( `bill_id`, `customer_id`, `a3`, `a3b`, `b6`, `b5`, `b4`, `b9`, `b8`, `b7`, `b12`, `b11`, `b10`, `b15`, `b14`, `b13`, `b18`, `b17`, `b16`, `b21`, `b20`, `b19`, `b24`, `b23`, `b22`, `b27`, `b26`, `b25`, `b30`, `b29`, `b28`, `b33`, `b32`, `b31`, `b36`, `b35`, `b34`, `b39`, `b38`, `b37`, `b42`, `b41`, `b40`, `b45`, `b44`, `b43`) VALUES ('$nic','$customer_id','$a3', '$a3b', '$b6', '$b5', '$b4', '$b9', '$b8', '$b7', '$b12', '$b11', '$b10', '$b15', '$b14', '$b13', '$b18', '$b17', '$b16', '$b21', '$b20', '$b19', '$b24', '$b23', '$b22', '$b27', '$b26', '$b25', '$b30', '$b29', '$b28', '$b33', '$b32', '$b31', '$b36', '$b35', '$b34', '$b39', '$b38', '$b37', '$b42', '$b41', '$b40', '$b45', '$b44', '$b43')";
       
        if($db->qu->query($select)){

            $form_detail_id = $db->qu->insert_id;
            for($i = 0; $i < count($qty); $i++ ){
                $sql = "INSERT INTO `customer_billing`(`form_detail_id`, `qty`, `desc_r`, `button_type`, `button_num`, `sheling`, `design`, `suit`, `speciaamount`) VALUES ('$form_detail_id','$qty[$i]','$desc[$i]','$button_type[$i]','$button_num[$i]','$sheling[$i]','$design[$i]','$suit[$i]','$speciaamount[$i]')";

                $db->qu->query($sql);
            }
           
            
        
            
                $status = 1;
                $header = "<h3>Successfully Inserted!!</h3>";
                $msg    = "<p>For preview final PDF <a target='v' href='$urls'>Click Me</a></p>";
                // $msg    = '<iframe width="1000" height="500" src="'.$urls.'" frameborder="0"></iframe>';
                $json_data = array("status"=> $status,"id"=> $id,"msg" => $msg , "head"=>$header, "st" => 'success');
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