<?php 
include "../include/main.function.php";
    
    $query = "SELECT COUNT(*) as co , f.status as status FROM `form_detail` as f 
    INNER JOIN  form_nic as nic on nic.id = f.form_id and nic.is_delete = 1
    INNER JOIN  in_form as in_f on nic.form_id = in_f.id and in_f.is_block = 1";

    $qu = $db->qu->query($query . " GROUP by f.status");
    
    $total = 0;
    $accept = 0;
    $rej = 0;
    $totalc = 0;
    $acceptc = 0;
    $rejc = 0;
    $pending = 0;
    $pendingc = 0;

    while( $row = mysqli_fetch_array($qu)){
        $total = $total + $row['co'];
        $accept = $row['status'] == 1 ? $accept + $row['co'] : $accept;
        $rej = $row['status'] == 2 ? $rej + $row['co'] : $rej;
    };
    
    $query = $query ." where in_f.id = (select id from in_form order by id desc LIMIT 1)";
    $qu = $db->qu->query($query . " GROUP by f.status");

    while( $row = mysqli_fetch_array($qu)){
        $totalc = $totalc + $row['co'];
        $acceptc = $row['status'] == 1 ? $acceptc + $row['co'] : $acceptc;
        $rejc = $row['status'] == 2 ? $rejc + $row['co'] : $rejc;
    };

    $pending = $total - ( $accept + $rej);
    $pendingc = $totalc - ( $acceptc + $rejc);

    $json_data = array("total"=> $total,"pending" => $pending ,"accept" => $accept,"reject" => $rej,"totalc"=> $totalc,"pendingc" => $pendingc, "acceptc" => $acceptc,"rejectc" => $rejc);
    echo json_encode($json_data);
?>