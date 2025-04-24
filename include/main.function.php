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
  
  public $admin = 0;
  public $support = 0;
  public $master_pass = 0;
  public $active = 0;
  public $name;

// Auth 
  
  public $user_name;
  public $user_id;
  public $url = '/gt_glamour_tailor/';
  public $title;


    function __construct(){
      session_start(); 
      date_default_timezone_set("Asia/Karachi");
      $this->connection();
    }

    function connection(){    
      $this->qu = $con = new mysqli("localhost","root","","oeccompk_maroof");
      // $this->qu = $con = new mysqli("localhost","oeccompk_mrch","M@r00f@123","oeccompk_mrch");
      if($this->qu->connect_errno > 0){
        die('Error!');
      }
    }

    function niccheck($nic, $form_id){
        $nic_insert = "SELECT * FROM `form_nic` WHERE customer_name = '$nic' and customer_num = $form_id";
        $qus = $this->qu->query($nic_insert);
        return ($qus->num_rows > 0)? 1 : 0 ;
    }

    function body(){
      include "../dashboard/admin.php";
      return '';    
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
     return $result;
    }

    function getUserdetailById($id){
      $query = $this->qu->query("select *
      from in_users as u 
          INNER JOIN in_user_details as up on up.user_id = u.id 
          WHERE u.id = '$id'  ");
      $row = ($query -> num_rows != 0)? mysqli_fetch_array($query) : [0];
      return $row;
    }

    function getallexamssel($tablename , $fields=null){
      $fields = $fields == null ? '*' : $fields ;
      $query = $this->qu->query("select $fields from $tablename order by id desc");
      return $query;
    }

    function getall($tablename , $fields=null){
      $fields = $fields == null ? '*' : $fields ;
      $query = $this->qu->query("select $fields from $tablename");
      return $query;
    }

    function formlimit($id){
      if(!isset($id['XfsadrtTTSd2'])){
        return 'File not found!';
      }
      
      $formid = $id['XfsadrtTTSd2'];
      $query = $this->qu->query("SELECT COUNT(nic.id) as fnum, inf.* FROM `in_form` as inf 
      LEFT JOIN form_nic as nic on nic.nic = inf.id WHERE inf.url = '$formid' And inf.is_block = 1");
    
      if(mysqli_num_rows($query) <= 0){
          return 'Exam form submission date has expired. Please wait for the next enrollment period.';
      }

      $row = mysqli_fetch_assoc($query);
      
      $start_date=$row['start_date'];
      $end_date=$row['end_date'];
      $date = strtotime(date('Y-m-d'));
      if($date >= strtotime($start_date) && $date <= strtotime($end_date)){
        $cout = $row['form_limit']+$row['extar_form_limit'];
        if($cout <= $row['fnum']){
            return 'Enrollment limit has been reached. Further submissions are not allowed!';
        }else{
          return (int) $row['id'];
        }
      }else{
          return 'Exam form submission date has expired. Please wait for the next enrollment period.';
      }

    }

    function get_f_option($id){
      $query = $this->qu->query("select p1,p2,p3 from in_form WHERE id = '$id'");
      $row = ($query -> num_rows != 0)? $query : [0];
      return $row;      
    }

    function batch(){
      return $this->qu->query("SELECT id,name,location,start_date, end_date,form_limit,extar_form_limit,url,p1,p2,p3,is_block  FROM in_form ");
    }

}

$db = new activity();

?>