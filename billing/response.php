<?php 
    include "../include/main.function.php";
        $deleted = $_POST['deleted'];
        $form_id = $_POST['form_id'];
        
        $status_arr = array(
            "0" => "Pending",
            "1" => "Approved",
            "2" => "Rejected",
        );    
        $class_arr = array(
            "0" => "warning",
            "1" => "success",
            "2" => "danger"
        );
        $columns = array( 
        	0 => 'fd.id'
        );
        $sqlTot = $sql = "SELECT 
                fd.id, 
                nic.customer_name ,
                fd.img_passport ,
                fd.created_date , 
                fd.full_name ,
                fd.email,
                fd.work_telephone ,
                fd.home_telephone, 
                fd.po_box,
                fd.district, 
                fd.city_town_village,
                fd.province_region, 
                fd.country, 
                fd.DOF_part1_exam, 
                fd.DOF_part2_exam,
                fd.COE_origin, 
                fd.COPC_exp, 
                fd.registration_auth, 
                fd.registration_num , 
                fd.registration_date , 
                fd.preference_date1, 
                fd.preference_date2, 
                fd.preference_date3, 
                fd.work_telephone, 
                fd.status, 
                fd.form_pdf, 
                fd.reason 
            FROM `in_form` as f 
                INNER JOIN form_nic as nic on f.id = nic.form_id 
                INNER JOIN form_detail as fd on fd.form_id = nic.id WHERE f.is_block = $deleted ";
        
        $where = " ";
        $where = ($form_id == 'all')?'': " and f.id = $form_id ";
        if( !empty($_POST['search']['value']) ) {
        	$where .=" and ";
        	$where .=" ( fd.full_name LIKE '%".$_POST['search']['value']."%' ";    
        	$where .=" OR nic.nic LIKE '%".$_POST['search']['value']."%' ";
            $where .=" OR fd.email LIKE '%".$_POST['search']['value']."%' ";
            $where .=" OR fd.reason LIKE '%".$_POST['search']['value']."%' )";
        }
        
        $dir = $columns[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']; 
        $sql .= " $where ORDER BY $dir ";
        if($_POST['length'] != -1){
            $sql .= " LIMIT ".$_POST['start']." ,".$_POST['length']." ";
        }

        $totalRecords =$totalRecords1 = '';

        
        $queryTot = $db->qu->query($sqlTot.$where);
        $totalRecords = mysqli_num_rows($queryTot);
        
        $queryTot = $db->qu->query($sql);
        $totaldraw = mysqli_num_rows($queryTot);
        $data = array();
        $i = $_POST['start'];

    while ($row = mysqli_fetch_row($queryTot)) {
        $url = sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST'],
            $row[25]
        );
        $profile = sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST'],
            '/'.$row[2]
        );
        $id = base64_encode($row[0]);
        $url = $url;
        $idurl = $id.'#'.$url;
        
        $status = $row[24];
        // $btn = "<a href='javascript:void(0);' id='$idurl' onclick='edit(this.id);' class='mx-1 py-1 px-2 badge bg-info'>PDF</a>";
        $btn = "<a href='$url' target='a' class='mx-1 py-1 px-2 badge bg-info'>PDF</a>";
        if($status == '0'){
            $btn .= "<a href='javascript:void(0);'  id='$id' onclick='accept(this.id);' class='mx-1 py-1 px-2 badge bg-success'>Approve</a>
            <a href='javascript:void(0);'  id='$id' onclick='reject(this.id);' class='mx-1 py-1 px-2 badge bg-danger'>Reject</a>";
        }
        $status = "<div class='badge bg-$class_arr[$status] font-size-12'>$status_arr[$status]</div>";
        
        $ip = $row[9];
        $added = 'No Own';
        $data_array = array();
        
        $chk_box = '<input type="hidden" style="display:none;" data-leadcode="'.$row['name'].'" value="'.$id.'">';
        
        $email          = $row[5];
        $phonenumber    = "$row[6] - $row[7]";
        $address        = "$row[8] $row[9] $row[10] $row[11], $row[12]";
        $passing        = "P1 - $row[13] , P2 - $row[14]";
        $pg             = $row[15];
        $ethnic         = $row[16];
        $reg            = "Auth - $row[17] , Number - $row[18] & Date: ".date( 'd-M-Y' , strtotime($row[19]));
        $pref           = "$row[20] $row[21] $row[22]";

        $data_array[] = $chk_box.$i=$i+1;
        $data_array[] = $row[1];
        $data_array[] = $profile;
        $data_array[] = date( 'd-M-Y' , strtotime($row[3]));
        $data_array[] = $row[4];
        $data_array[] = "<a href='mailto:$email'>$email</a>";
        $data_array[] = $phonenumber;
        $data_array[] = $address;
        $data_array[] = $passing;
        $data_array[] = $pg;
        $data_array[] = $ethnic;
        $data_array[] = $reg;
        $data_array[] = $pref;
        $data_array[] = $row[26]==''?'-':$row[26];
        $data_array[] = $status;
        $data_array[] = $btn;
      
        $data[] = $data_array; // SET DATA

    }
    $json_dat='';
    
    $json_data = array(
    	"draw"            => intval( $_POST['draw'] ),   
    	"recordsTotal"    => intval( $totaldraw ),  
    	"recordsFiltered" => intval($totalRecords),
    	"data"            => $data   // total data array
    	);
    echo json_encode($json_data);
?>