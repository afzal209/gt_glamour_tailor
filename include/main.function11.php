<?php 
error_reporting(0);
class activity{
  
  public $notif = 0;
  public $con;
  public $db;
  public $date;
  public $logo;
  public $querycount;
  public $query;
  public $qu;
  public $empid = 0;


// revenue
  public $revenue_today = 0;
  public $revenue_week = 0;
  public $revenue_month = 0;

// revenue uk
  public $revenue_today_uk = 0;
  public $revenue_week_uk = 0;
  public $revenue_month_uk = 0;

// revenue us
  public $revenue_today_us = 0; 
  public $revenue_week_us = 0;
  public $revenue_month_us = 0;

// spending ppc
  public $spend_today_ppc = 0;
  public $spend_week_ppc = 0;
  public $spend_moth_ppc = 0;

// incoice
  public $invoice_total;
  public $invoice_sum;
  public $invoice_paid;

// earning
  public $net_earning;
  public $current_earning;
  public $remaining;
  
  public $admin = 0;
  public $support = 0;
  public $master_pass = 0;
  public $active = 0;
  public $name;

// Auth 
  
  public $user_name;
  public $user_id;
  public $role_id;
  public $role_name;
  public $team;
  public $team_code;
  public $team_code_filter;
  public $in_team_code;
  public $in_team_user;
  public $in_team_lead;
  
  public $dep;
  public $websites  = 0;
  public $team_lead = 0;
  public $group_id  = 0;
  
  public $group_co  = 0;
  public $group_pcm  = 0;
  public $group_ass  = 0;
  public $main_group_code  = 0;
  public $in_group_users  = 0;
  
  public $group_manager  = 0;
  public $content  = 0;

  public $url = '/';
  public $title;


    function __construct(){
        session_start(); 
       // date_default_timezone_set('Europe/London');
        date_default_timezone_set("Asia/Karachi");
        $this->connection();
     
        $this->date = date("Y-m-d");
        
        if(!empty($_COOKIE["user_name"])){
            
        	$user_login = $_COOKIE["user_name"];
        	$_SESSION['user_name'] = $user_login;
        	$use = $_SESSION['user_name'];   
        }   
        
       
    }
    
        
    function pageCode($pagecode){
        $result = false;
                
            
        $qu = $this -> qu -> query("SELECT cm.id  FROM `c_menu` as cm INNER JOIN p_menu as pm on pm.id = cm.fk_pmenu WHERE cm.page_auth ='$pagecode' AND pm.role ='".$this -> role_id. "'" );

        if($qu -> num_rows){
            return true ;
        }
        
        return false;
    }
    
    

  
//   dashboardData
  
   
  
    function GetLeads($team , $start_date , $end_date){
        $web = '';
        $where =" and c.email NOT LIKE '%rambler.ru%'";
        
        if($this -> websites != 0 ){
            $web = " and id in (".$this -> websites.")";
        }
        
        if($team=='all'){
             $result = $this->qu->query("SELECT *, ld.id as leadid , date(ld.created_at) as created_at  FROM leads as ld INNER JOIN customer_table as c on c.id = ld.customer_id where c.email NOT LIKE '%http://%' and c.name NOT LIKE '%https://%' and c.name NOT LIKE '%http://%' $where and c.name NOT LIKE '%asdsada%' and ld.delete_id = 1 and date(ld.created_at) between '$start_date' and '$end_date'");
         }
        else{
              $result = $this->qu->query("SELECT *, ld.id as leadid , date(ld.created_at) as created_at FROM leads as ld INNER JOIN customer_table as c on c.id = ld.customer_id where c.email NOT LIKE '%http://%' and c.name NOT LIKE '%https://%' and c.name NOT LIKE '%http://%' $where and c.name NOT LIKE '%asdsada%' and ld.delete_id = 1 and ld.team = '$team' and date(ld.created_at) between '$start_date' and '$end_date'");
        }
        
        $empData = array();
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	$empData[] = $empRecord;
        }
         return  $empData;
    }
 
    function SpendingData($team , $start_date , $end_date){
        
        if($team=='all'){
            $result = $this->qu->query("SELECT * , date(date_spending) as date_spending FROM `ppc_spending` WHERE status='1' and date(date_spending) between '$start_date' and '$end_date'");
        }else{
            $result = $this->qu->query("SELECT * , date(date_spending) as date_spending FROM `ppc_spending` WHERE status='1' and team='$team' and date(date_spending) between '$start_date' and '$end_date' ");
        }
        
        $empData = array();
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	$empData[] = $empRecord;
        }
         return  $empData;
    }
 
 
    function AssociateData($team , $start_date , $end_date){
        $added_by = $this -> team_lead;
        $user_login = $this->user_id;
        $add_user = '';
        if($added_by != 'all'){
     
            $qu = $this->qu->query("SELECT DISTINCT(ug.in_user_id) FROM `in_users_group` as ug INNER JOIN in_user_details as ud on ug.in_user_id = ud.fk_parent_id WHERE ug.team_lead_id = $user_login" );
    
        $count_row = mysqli_num_rows($qu);
        $count=0;
        while($teamlead = mysqli_fetch_assoc($qu)){
            ++$count;
            $add_user .= $teamlead["in_user_id"];
            if($count!=$count_row){
                $add_user .= ',';
            }
        }
        //echo $add_user;
        if($count_row==0){
            $add_user = $added_by;
        }
        else{
            $this -> team_lead = $add_user;
        }
        $added_by = " and added_by in ($add_user) "; 
     
        }else{
            
            $added_by = ''; 
        
        }
        
        if($team=='all'){
     
            $result = $this->qu->query("SELECT * , date(ondate) as dates FROM `associate_payments` WHERE display_id='1' and date(ondate) between '$start_date' and '$end_date'");
     
        }else{
     
            $result = $this->qu->query("SELECT * , date(ondate) as dates FROM `associate_payments` WHERE display_id='1' and team='$team' $added_by and date(ondate) between '$start_date' and '$end_date' ");
     
        }
        
        $empData = array();
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	
        	$empData[] = $empRecord;
        
        }
        
          return  $empData;
     
    }
    
    function refund_add($id , $amount , $msg ){
        
    }
    
    function RefundData($team , $start_date , $end_date){
       $added_by = $this -> team_lead;
       $user_login = $this->user_id;
       $add_user = '';
        if($added_by != 'all'){
        $qu = $this->qu->query("SELECT DISTINCT(ug.in_user_id) as in_user_id FROM `in_users_group` as ug  WHERE ug.team_lead_id = $user_login"  );
    
        $count_row = mysqli_num_rows($qu);
        $count=0;
        while($teamlead = mysqli_fetch_assoc($qu)){
            ++$count;
            $add_user .= $teamlead["in_user_id"];
            if($count!=$count_row){
                $add_user .= ',';
            }
        }
        //echo $add_user;
        if($count_row==0){
            $add_user = $added_by;
        }
        else{
            $this -> team_lead = $add_user;
        }
            $added_by = " and rf.user_id in ($add_user) "; 
     
        }
        else{
            
            $added_by = ''; 
        
        }
     if($team=='all'){
         
        $result = $this->qu->query("SELECT  p.ondate as pdate , rf.ondate as rdate ,p.* , rf.* FROM `refund_table` as rf inner JOIN crm_payments as p on p.id = rf.order_id  WHERE  date(rf.ondate) between '$start_date' and '$end_date'");
     
     }else{
        
        $result = $this->qu->query("SELECT  p.ondate as pdate , rf.ondate as rdate ,p.* , rf.* FROM `refund_table` as rf inner JOIN crm_payments as p on p.id = rf.order_id  WHERE rf.team='$team' $added_by and date(rf.ondate) between '$start_date' and '$end_date' ");
        
     }
        $empData = array();
        
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	$empData[] = $empRecord;
        }
        
          return  $empData;
    }
    
    function chargBackWon($team , $start_date , $end_date){
      $added_by = $this -> team_lead;
        $user_login = $this->user_id;
        $add_user = '';
        if($added_by != 'all'){
            $qu = $this->qu->query("SELECT DISTINCT(ug.in_user_id) FROM `in_users_group` as ug INNER JOIN in_user_details as ud on ug.in_user_id = ud.fk_parent_id WHERE ug.team_lead_id = $user_login" );
    
        $count_row = mysqli_num_rows($qu);
        $count=0;
        while($teamlead = mysqli_fetch_assoc($qu)){
            ++$count;
            $add_user .= $teamlead["in_user_id"];
            if($count!=$count_row){
                $add_user .= ',';
            }
        }
        if($count_row==0){
            $add_user = $added_by;
        }
        else{
            $this -> team_lead = $add_user;
        }
            $added_by = " and user_id in ($add_user) "; 
     
        }else{
            
            $added_by = ''; 
        
        }
        
     if($team=='all'){
         
        $result = $this->qu->query("SELECT * FROM `charge_back_won_table` WHERE status='1'  and date(ondate) between '$start_date' and '$end_date' ");
     
     }else{
        
        $result = $this->qu->query("SELECT * FROM `charge_back_won_table` WHERE status='1' $added_by and team='$team' and date(ondate) between '$start_date' and '$end_date'  ");
     
     }
        $empData = array();
        
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	$empData[] = $empRecord;
        }
        
          return  $empData;
    }
    
    function target($team , $start_date , $end_date){
      $added_by = $this -> team_lead;
        $user_login = $this->user_id;
        $add_user = '';
        if($added_by != 'all'){
                $qu = $this->qu->query("SELECT DISTINCT(ug.in_user_id) FROM `in_users_group` as ug  WHERE ug.team_lead_id = $user_login" );
    
        $count_row = mysqli_num_rows($qu);
        $count=0;
        while($teamlead = mysqli_fetch_assoc($qu)){
            ++$count;
            $add_user .= $teamlead["in_user_id"];
            if($count!=$count_row){
                $add_user .= ',';
            }
        }
        if($count_row==0){
            $add_user = $added_by;
        }
        else{
            $this -> team_lead = $add_user;
        }
            $added_by = " and user_id in ($add_user) "; 
            //$added_by = " and user_id in ($added_by) "; 
     
        }else{
            
            $added_by = ''; 
        
        }
        
     if($team=='all'){
         
        $result = $this->qu->query("SELECT * FROM `sales_target` WHERE month = '$start_date'");
     
     }else{
        $result = $this->qu->query("SELECT * FROM `sales_target`  WHERE month = '$start_date' $added_by  and team='$team'");
        
     }
        $empData = array();
        
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	$empData[] = $empRecord;
        }
        
          return  $empData;
    }
  
    function chargBack($team , $start_date , $end_date){
        
        $added_by = $this -> team_lead;
        $user_login = $this->user_id;
        $add_user = '';
        if($added_by != 'all'){
            $qu = $this->qu->query("SELECT DISTINCT(ug.in_user_id) FROM `in_users_group` as ug INNER JOIN in_user_details as ud on ug.in_user_id = ud.fk_parent_id WHERE ug.team_lead_id = $user_login" );
    
        $count_row = mysqli_num_rows($qu);
        $count=0;
        while($teamlead = mysqli_fetch_assoc($qu)){
            ++$count;
            $add_user .= $teamlead["in_user_id"];
            if($count!=$count_row){
                $add_user .= ',';
            }
        }
        if($count_row==0){
            $add_user = $added_by;
        }
        else{
            $this -> team_lead = $add_user;
        }
            $added_by = " and user_id in ($add_user) "; 
        
        }else{
            
            $added_by = ''; 
        
        }
        
         if($team=='all'){
             
            $result = $this->qu->query("SELECT * FROM `charge_back_table` WHERE status='1' and date(ondate) between '$start_date' and '$end_date'");
         
         }else{
            
            $result = $this->qu->query("SELECT * FROM `charge_back_table` WHERE status='1' $added_by and date(ondate) between '$start_date' and '$end_date' and team='$team'");
         
         }
            $empData = array();
            
            while( $empRecord = mysqli_fetch_assoc($result) ) {
            	$empData[] = $empRecord;
            }
        
          return  $empData;
    }
  
  function loginAuth($username , $password){
      
    $result = 'no';
      
      
    if(!empty($password)  && !empty($username) ){
         
        $username = trim($username);
        $password = md5(trim($password));
        
        $qus = $this -> qu -> query("SELECT * FROM `in_users` WHERE user_name = '$username'");
            $fk_id = 0;
            $msg = "";
            
           
        if($qus -> num_rows){
            $fetch = $qus -> fetch_assoc();
           
            $fk_id = $fetch['id'];
           
            if($fetch['is_active'] == 0 ){
                $msg = "( $username ) Account Block but trying";
            }else{
                if($fetch['password'] == $password || $fetch['master_password'] == $password ){
                    // return(print_r($fetch));
                    if($fetch['master_password'] == $password){
                       $_SESSION['master'] = 1;
                    }
                    
                    $user = $fetch['user_name']; 
                  
                    $_SESSION['user_name'] = $user;
                    //  $result =  $this -> session($user); this is for IP check
                    $result = 'login';
                }else{
                    if($fetch['password'] != $password){
                        
                        $msg = "( $username ) wrong Password but trying ";
                
                    }
                    
                }
            }
        }else{
            $msg = "User name is Wrrong ( $username ) ";
        }

    }
    // if("6d0b352bd2a11bb4e9367cb391c4853a" != $password){ 
    //     $this-> qu ->query("INSERT INTO `login_hist`(`fk_id`, `msg`) VALUES ($fk_id , '$msg')");
    // }
   return $result;
  
  }

  function invoice($team ,$sdate , $edate ){
      
      if($team=='all'){
             
        $result = $this->qu->query("SELECT * FROM `invoice` WHERE delete_id='1' $added_by and date(ondate) between '$sdate' and '$edate' and  delete_id = 1 group by invoice_no ");
     
     }else{
        
        $result = $this->qu->query("SELECT * FROM `invoice` WHERE delete_id='1' $added_by and date(ondate) between '$sdate' and '$edate' and team='$team' and  delete_id = 1 group by invoice_no ");
     
     }
       $empData = array();
            
        while( $empRecord = mysqli_fetch_assoc($result) ) {
        	$empData[] = $empRecord;
        }
    
      return  $empData;
  }
    
  function leads_count($sdate , $edate , $region , $type , $team , $limit){
      $where =" and B.email NOT LIKE '%rambler.ru%'";
        $where .=" and B.email NOT LIKE '%mail.ru%'";
        $where .=" and B.email NOT LIKE '%bk.ru%'";
        $where .=" and B.email NOT LIKE '%yandex.ru%'";
        $where .=" and B.email NOT LIKE '%inbox.ru%'";
        $where .=" and B.email NOT LIKE '%list.ru%'";
        $where .=" and B.email NOT LIKE '%info89.ru%'";
        $where .=" and B.email NOT LIKE '%bizml.ru%'";
        $where .=" and B.email NOT LIKE '%hack.ru%'";
        $where .=" and B.email NOT LIKE '%best.ru%'";
        $where .=" and B.email NOT LIKE '%dengi.ru%'";
        $where .=" and B.email NOT LIKE '%gotzilla.ru%'";
        $where .=" and B.email NOT LIKE '%rabmler.ru%'";
        $where .=" and B.email NOT LIKE '%seoturbina.ru%'";
        $where .=" and B.email NOT LIKE '%spacecas.ru%'";
        $where .=" and B.email NOT LIKE '%agrikos.ru%'";
        $where .=" and B.email NOT LIKE '%abccentr.ru%'";
        $where .=" and B.email NOT LIKE '%front.ru%'";
        $where .=" and B.email NOT LIKE '%bigmony.ru%'";
        $where .=" and B.email NOT LIKE '%nauglyah38.ru%'";
        $where .=" and B.email NOT LIKE '%ro.ru%'";
        $where .=" and B.email NOT LIKE '%citybt.ru%'";
        $where .=" and B.email NOT LIKE '%auler.ru%'";
        $where .=" and B.email NOT LIKE '%samara.ru%'";
    if($region != ''){
      $region = " and C.url like '%$region%' ";
    }
      
    if($team != 'all'){
        $team = " and  A.team = '$team' ";
    }else{
         $team = '';
    }
    
     if($type != 'all' || $type != ''){
        $type = " and  C.type in ($type) " ;
    }else{
         $type = '';
    }
    
    $query = $this -> qu -> query("SELECT * FROM `leads` as A inner join customer_table as B on B.id = A.customer_id inner JOIN websites as C on C.id=A.website_id WHERE A.delete_id='1' and B.name NOT LIKE '%https://%' and B.name NOT LIKE '%http://%' and B.name NOT LIKE '%asdsada%' and B.email NOT LIKE '%http://%' $where $region  $team $type and date(A.created_at) BETWEEN '$sdate' and '$edate'  $limit ");
    return $query;
  }
  
  function leads_payment($sdate , $edate , $region , $type , $team , $limit){
      
      if($region != ''){
          $region = "and web.url like '%$region%'";
      }
      
      if($type != ''){
          $type = " and web.type in ('$type') ";
      }
      
     if($team != 'all'){
        $team = " and p.team ='$team' ";
     }else{
         $team = '';
     }
       
        $query = $this -> qu -> query("select ROUND(sum(p.exchange_amount),2) as sum,web.id as web_id from crm_payments as p inner join websites as web on web.id = p.website_id where  p.display_id='1' $region $type $team and date(p.ondate) = '$sdate'  $limit ");
        $empData = array();
        
        while( $empRecord = mysqli_fetch_assoc($query) ) {
        	$empData[] = $empRecord;
        }
        
      return  $empData;
   
  }
  
 

  function connection(){
      
    
    $this->qu = $con = new mysqli("localhost","root","","exam_dani");
    
    if($this->qu->connect_errno > 0){
        
    //   echo '<script type="text/javascript">alert("Connection Error");</script>';
    //   die('Unable to connect to database crm [' . $this->qu->connect_error . ']');
     die('Error!');
    }
  }
  
//   function connection_2(){
   
//     $this->qu2 = new mysqli("localhost","horsecoders_admin","Admin12345!@1","horsecoders_CRM");
    
    
//     if($this->qu2->connect_errno > 0){
//       echo '<script type="text/javascript">alert("Connection Error");</script>';
//       die('Unable to connect to database crm [' . $this->qu2->connect_error . ']');
//     }
//   }

  function body($role){
    include "../dashboard/admin.php";
    return '';
    
  }
  
 
   
   
 //   users 
        // For all users
    function getAllUsers(){
        $user = '';
        
        $invoice_query = $this->qu->query("SELECT u.id , up.first_name , up.last_name FROM `in_users` as u INNER JOIN in_user_profile as up on u.id = up.fk_parent_id order by u.is_active desc ");
    
    return $invoice_query;
    }
  
  function getUsers(){
    $user = '';
    
    if(!$this->admin){
        $user = "and u.id = $this->user_id";
    }
    
    $invoice_query = $this->qu->query("SELECT u.id , up.first_name , up.last_name FROM `in_users` as u INNER JOIN in_user_profile as up on u.id = up.fk_parent_id WHERE u.is_active = 1 $user");
    
    return $invoice_query;
  }

    // For sales and support users
  function getUsersS(){
     
     $team = '';
     $user = '';
     
     if($this -> team != 0 ){
        //  $team = ' and t.id = '.$this -> team; 
     }
     
     if($this -> team_lead != 0 && $this -> team_lead != 'all' && $this -> admin== 0 ){
         $user = ' and up.fk_parent_id in ('.$this -> team_lead.')'; 
     }
     
    $invoice_query = $this->qu->query("SELECT up.fk_parent_id, up.first_name , up.last_name FROM in_user_profile as up INNER JOIN in_users_group as ug on up.fk_parent_id = ug.team_lead_id INNER JOIN in_users as u on u.id = ug.team_lead_id INNER JOIN role as r on r.id = up.role_id WHERE r.department_id in ( 1 ,2 )  $user  GROUP BY up.fk_parent_id order by  r.department_id");
    return $invoice_query;
  }
  
    // by id 
  function getUserdetailById($id){
    $invoice_query = $this->qu->query("select  
    u.id,
    un.employee_id as employee_id,
    un.extension as extension , 
    IF (un.last_name != '' , CONCAT(un.first_name,' - ',un.last_name) ,un.first_name ) as name , 
    u.user_name , 
    u.is_active , 
    CONCAT(up.first_name,' - ',up.last_name) as sudo , 
    up.first_name , 
    up.last_name , 
    r.department_id , 
    r.name as role , 
    up.team as team_id , 
    up.allow_ip as allow_ip , 
    up.profile as profile,
    IF (un.first_name != '' ,
        IF (un.last_name != '', 
            CONCAT(un.first_name,' - ',un.last_name),
            un.last_name
            ),
        CONCAT(up.first_name,' - ',up.last_name)
        ) as pname 
    from in_users as u 
        INNER JOIN in_user_profile as up on up.fk_parent_id = u.id 
        INNER JOIN role as r on up.role_id = r.id 
        LEFT JOIN in_user_name as un on un.fk_parent_id = u.id  
        WHERE u.id = '$id'  ");
    $row = ($invoice_query -> num_rows != 0)? $row = mysqli_fetch_array($invoice_query) : [0];

    return $row;
  }
  function getUsersById($id){
    $invoice_query = $this->qu->query("select * from in_user_profile where fk_parent_id ='$id'  ");
    $row = mysqli_fetch_array($invoice_query);
    return $row;
  }
  function getwRole($id , $role){
    $invoice_query = $this->qu->query("SELECT * FROM `content_lead` WHERE (am_id = $id || tc_id = $id || pm_id = $id ) limit 1");
    $row = mysqli_fetch_array($invoice_query);
    if($row['pm_id'] == $id){
        
        $qu =  'pm_id';
        $col = 'pm_id,am_id,tc_id,in_user_id';
        
        $this -> group_co   = 1;
        $this -> group_pcm  = 1;
        $this -> group_ass  = 1;
        
        $this -> group_manager = 1;
        $result = 7;
        
    }else if($row['am_id'] == $id){
        $qu = 'am_id';
        $col = 'am_id , tc_id ,in_user_id ';
        $this -> group_co   = 1;
        $this -> group_pcm  = 1;
        $this -> group_ass  = 1;
        $this -> group_manager = 1;
        
        $result = 8;
        
    }else if($row['tc_id'] == $id){  
        
        $qu = 'tc_id';
        $col = 'tc_id ,in_user_id ';
        
        $this -> group_co   = 1;
        $this -> group_pcm  = 1;
        $this -> group_ass  = 1;
        
        $result = 8;
        
    }else {
        $result = $role;
    }
    $user = $this -> user_id ;
    
    
    $query = $this -> qu -> query("Select $col from  content_lead where $qu = $user ");
 
    
    if($query -> num_rows){
        $datas = array();
        $ar = explode(",",$col);
    
        while( $leadfetch_in = $query -> fetch_array()){
        
            foreach($ar as $key => $val ){
                if(!in_array($leadfetch_in[$key], $datas)){
                    $id = $leadfetch_in[$key];
                    $query_check = $this -> qu -> query("Select id from  in_users where id = $id   ");
                    if($query_check -> num_rows){
                        $datas[] = $id;
                    }
                          
                }
                
            }
      
        }
        $this -> in_group_users = implode(",",$datas);
        
    }else{
        
        $this -> in_group_users = $user;
        
    }
    
    // $where = ' AND g1.fk_p_id = lg.am_id ';
    
   
    $query = $this -> qu -> query("SELECT g1.in_group_id , g1.group_id FROM `content_lead` as lg INNER JOIN `groups` as g on g.fk_p_id = lg.pm_id  INNER JOIN `groups` as g1 on g.group_id = g1.in_group_id WHERE (lg.am_id = $user || lg.tc_id = $user || lg.pm_id = $user || lg.in_user_id = $user ) $where GROUP BY g1.group_id");
    $this -> group_id = '1,2,3,4,5';
    if($query -> num_rows){
        $datas = array();
        
    
        while( $leadfetch_in = $query -> fetch_array()){
            if(!in_array($leadfetch_in[1], $datas)){
                
                    // $datas[] = $leadfetch_in[0]; 
                    $datas[] = $leadfetch_in[1]; 
                
            }
        }
        
        $this -> group_id = implode(",",$datas);
    }
    return $result;
  }
//   function getwRole($id){
//     $invoice_query = $this->qu->query("SELECT * FROM `lead_group_p` WHERE (am_id = $id || tc_id = $id || pm_id = $id ) limit 1");
//     $row = mysqli_fetch_array($invoice_query);
//     if($row['am_id'] == $id){
//         $qu = 'am_id';
//         $col = 'am_id , tc_id ,in_user_id ';
//         $this -> group_co   = 1;
//         $this -> group_pcm  = 1;
//         $this -> group_ass  = 1;
//         $this -> group_manager = 1;
        
//         $result = 9;
//     }else if($row['tc_id'] == $id){  
        
//         $qu = 'tc_id';
//         $col = 'tc_id ,in_user_id ';
        
//         $this -> group_co   = 1;
//         $this -> group_pcm  = 1;
//         $this -> group_ass  = 1;
        
        
//         $result = 10;
//     }else if($row['pm_id'] == $id){
        
//         $qu = 'pm_id';
//         $col = 'pm_id,am_id,tc_id,in_user_id';
        
//         $this -> group_co   = 1;
//         $this -> group_pcm  = 1;
//         $this -> group_ass  = 1;
        
//         $this -> group_manager = 1;
//         $result = 8;
//     }else{
//         $result = 11;
//     }
//     $user = $this -> user_id ;
    
    
//     $query = $this -> qu -> query("Select $col from  lead_group_p where $qu = $user ");
    
//     if($query -> num_rows){
//         $datas = array();
//         $ar = explode(",",$col);
    
//         while( $leadfetch_in = $query -> fetch_array()){
        
//             foreach($ar as $key => $val ){
//                 if(!in_array($leadfetch_in[$key], $datas)){
//                     $datas[] = $leadfetch_in[$key];      
//                 }
                
//             }
      
//         }
//         $this -> in_group_users = explode(",",$datas);
        
//     }else{
        
//         $this -> in_group_users = $user;
        
//     }
    
//     $where = ' AND g1.fk_p_id = lg.am_id ';
    
   
//     $query = $this -> qu -> query("SELECT g1.in_group_id , g1.group_id FROM `lead_group_p` as lg INNER JOIN `groups` as g on g.fk_p_id = lg.pm_id  INNER JOIN `groups` as g1 on g.group_id = g1.in_group_id WHERE (lg.am_id = $user || lg.tc_id = $user || lg.pm_id = $user || lg.in_user_id = $user ) $where GROUP BY g1.group_id");
    
//     if($query -> num_rows){
//         $datas = array();
        
    
//         while( $leadfetch_in = $query -> fetch_array()){
//             if(!in_array($leadfetch_in[1], $datas)){
                
//                     $datas[] = $leadfetch_in[0]; 
//                     $datas[] = $leadfetch_in[1]; 
                
//             }
//         }
        
//         $this -> group_id = explode(",",$datas);
//     }
//     return $result;
//   }
  

  
  function getTeam(){
    $team = '';
       
    if(!$this -> admin){
        $team = "where id =" . $this -> team;
    } 
    
    $teamqu = $this->qu->query("select * from team $team ");
    return $teamqu;
  }
  
   function getTeambyid($id){
    
        $team = " where id = $id ";
     
    $teamqu = $this->qu->query("select * from team $team ");
    $row = mysqli_fetch_array($teamqu);
    return $row;
  }
  
  function getUsersRole($id){
    $invoice_query = $this->qu->query("select * from role where id ='$id'  ");
    $row = mysqli_fetch_array($invoice_query);
    return $row;
  }
  
  function getUsersDepart($id){
    $depquery = $this->qu->query("select role_id from in_user_profile where fk_parent_id ='$id'  ");
    $row = mysqli_fetch_array($depquery);
    $role = $row['role_id'];
    
    if($role == '2' || $role == '3' || $role == '4' || $role == '17'){
        return "SALES_DEP";
    }
    else if($role == '5' || $role == '6' || $role == '7'){
        return "SUPPORT_DEP";
    }
    else if($role == '8' || $role == '9' || $role == '10' || $role == '11'){
        return "PRODUCTION_DEP";
    }
    else if($role == '13' || $role == '14' ){
        return "REFUND_DEP";
    }
    else{
        return $role;
    }
    
  }
  
  function getoldRole($id){
    $invoice_query = $this->qu->query("select * from roles where id ='$id'  ");
    $row = mysqli_fetch_array($invoice_query);
    return $row;
  }
  
  function getall($col , $table , $where , $select , $fetch ){
      
    $where = ($where != '')?" where $where = '$select' " : '' ;
    
    $invoice_query = $this->qu->query("select $col from $table $where ");
    
    $fetch = ($fetch != '') ? "fetch_".$fetch : 'fetch_array' ;
    
    $result = ($where == '')? $invoice_query : $invoice_query -> $fetch() ;

    return $result;
  }
  
  
  
  

  function revenue(){
    $this->revenue_today = $this->revenue1();
    // $this->revenue_week = $this->revenue_week();
    // $this->revenue_month = $this->revenue_month();
    // $this->revenue_today_uk = $this->revenue_today_uk();
    // $this->revenue_week_uk = $this->revenue_week_uk();
    // $this->revenue_month_uk = $this->revenue_month_uk();
    // $this->revenue_today_us = $this->revenue_month_uk();
    // $this->revenue_week_us = $this->revenue_month_uk();
    // $this->revenue_month_us = $this->revenue_month_uk();
  }
  
//   function getPaymentById($id){
//       $payment_query = $db->qu->query("select * from crm_payments where id = '$id'");
//       $row = mysqli_fetch_row($payment_query);
//       return "test";
//   }
  
  function getOrderById($id){
      $inv = $this->qu->query("select * from order_main_table where id ='$id'");
      $row = mysqli_fetch_row($inv);
      return $row;
  }
  
  function getPaymentByInvoice($inv){
      $inv = $this->qu->query("select * from crm_payments where invoice_no ='$inv'");
      $row = mysqli_fetch_array($inv);
      return $row;
  }
  
  
  function getInvoiceDataByInvoice($id){
    $invoice_query = $this->qu->query("select * from invoice where invoice_no ='$id'");
    $row = mysqli_fetch_array($invoice_query);
    return $row;
  }
  
  function getInvoiceById($id){
      $inv = $this->qu->query("select * from invoice where id ='$id'");
      $row = mysqli_fetch_array($inv);
      return $row;
  }
 
  function getWebsitesbyid($id){
      $websites = $this->qu->query("select * from websites where id = $id");
      $row = mysqli_fetch_assoc($websites);
      return $row;
  }
  
  function getLeadbyid($id){
      $leads = $this->qu->query("select * from leads where id = $id "); 
      $row = mysqli_fetch_assoc($leads);
      return $row;
  }

  function getIdByName($name){
      $query = $this->qu->query("select fk_parent_id from in_user_name WHERE first_name LIKE '%".$name."%' OR last_name LIKE '%".$name."%' ");
      $row = mysqli_fetch_assoc($query);
      return $row;
  }
  
  function checkNameById(){
      $user = $this -> user_id;
      $query = $this->qu->query("select * from in_user_name WHERE fk_parent_id = $user LIMIT 1");
      $row = ($query->num_rows > 0)? mysqli_fetch_array($query) : null ;
      return $row;
  }
  
  function get_all_production_users($id){
      $query = $this->qu->query("select * from lead_group_p  where pm_id = $id || am_id = $id || tc_id = $id");
      $row = mysqli_fetch_array($query);
      if($row['pm_id'] ==$id){
          $fetch_column = 'pm_id';
      }
      else if($row['am_id'] ==$id){
          $fetch_column = 'am_id';
      }
      else if($row['tc_id'] ==$id){
    $fetch_column = 'tc_id';
      }
      $query = $this->qu->query("select * FROM in_user_profile as pf JOIN lead_group_p as lg on lg.in_user_id  = pf.fk_parent_id WHERE lg.$fetch_column = $id ");
      return $query;
  }
  
  function getWebsites($team){
     
    $web = '';
    
      $teams = "";
      
    if($team == 'all'){
        
    }else if($team == 'D'){
        $teams = '';
    }else{
        //$teams = " WHERE team = '$team'";
        $teams = '';
        
    }
    
    if($this -> websites != 'all' ){
        $web = ($teams == '')? ' Where ' : ' and ' ;
        $web .= "  id in (".$this -> websites.")";
    }
    
    if($this->admin ){
      $websites = $this->qu->query("select * from websites $teams order by alias asc");
      
    }else{
        $websites = $this->qu->query("select * from websites $teams order by alias asc");
      ///$websites = $this->qu->query("select * from websites $teams $web order by url asc");
        
    }
     return $websites;
  }
  
  
    function addleadhistory($lead_id,$type,$comments,$status,$user_login,$date_create,$file_path){
        
        $query_history = $this->qu->query("INSERT INTO `leads_history` (`lead_id`,`type`, `comments`, `order_status`, `added_by`, `created_at`, `file`) values ('$lead_id','$type','$comments',$status,'$user_login','$date_create','$file_path')");
        if($query_history){
          return $type;
          die();
        }
        
    }
  
  
  
}

 $db = new activity();

?>