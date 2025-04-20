<?php 
  require_once "../include/load.php";
  $db->title = 'Dashboard';
  $pagecode = 'p_l_m';
  $_id = $db->user_id;
  $role = $db->role_id;
  
?>
<!doctype html>
<html lang="en">
<?php 
  include('../include/head.php');
  
?> 
  <style>
      .table-bordered {
          border: 1px solid #bdbdbd !important;
      }
      
      .stats tbody td span{
          font-size: 20px;
          font-weight: 800 !important;
      }
      .right-b {
          border-right: 1px solid rgba(0,0,0,0);
      }
      
  </style>
   <?php include('../include/header.php'); ?>
            
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
          <?php 
          
            include('../include/top.php'); ?>
          
          <div class="time">
            <!-- <h4></h4> -->
          </div>
          
          <?php 
                  
          $db->body();              
          include('../include/footer.php'); ?>
    </body>
</html>