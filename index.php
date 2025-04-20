<?php
	include "include/main.function.php"; 
	if(isset($_SESSION['user_name'])){
 		header('Location:dashboard/');
    	die();
	}
    
	if(isset($_POST['name'])){
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		if( !empty($pass)  && !empty($name) ){
		    echo $db->loginAuth($name , $pass);
		}else{
			echo 'no';
		}
		die();
    };
     $ip = $_SERVER['REMOTE_ADDR'];
     $date = date('Y-m-d H:i:s');
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Login | Pakistan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="SultanMaroof" name="author" />
          
        <link rel="shortcut icon" href="assets/images/favicon.png">
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <style>
    .alert {
        padding: 2px 15px !important;
        font-size: 15px;
        font-family: initial;
        text-align: center;
    }
 

    </style>
    
    <body class="authentication-bg">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

       <div class="home-btn d-none d-sm-block">
            <a href="index.php" class="text-dark"><i class="fas fa-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
               
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-3"> 
                                <div class="text-center mt-2">
                                    <a href="index.php" class="mb-3 d-block auth-logo">
                                            <!--<h3 style="padding-top: 26px;">CRM </h3>-->
                                         <img src="assets/images/logo.png"  style="width: 50%;height: 55px;" alt="" height="20"> 
                                    </a>
                                    <!--<p class="text-muted">Sign in to continue to .</p>-->

                                </div>
                                <div class="p-2">
                                    <div class="alert "></div>
                                    
                                    <div class="m-2 alert_pro ">
                                        <p id='loading' >10%</p>
                                        <div class="progress">
                                            
                                            <div id='progress-bar' class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 10% ;background-color: #000000;"></div>
                                        </div>
                                    </div>
                                    
                                    <form method='POST'>
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>
                
                                        <div class="mb-3">
                                            <div class="float-end">
                                                <!--<a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>-->
                                            </div>
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>
                
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <input class="btn btn-primary w-sm waves-effect waves-light" id='login_btn' onclick='login()' type="button" value='Log In' />
                                        </div>
            
                                        
                                    </form>
                                </div>
            
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> . Crafted with <i class="fas fa-heart text-danger"></i> by </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>
        	<script >
  		$(function(){
  			$('.alert').hide()	
  		    $('.alert_pro').hide()
  		})
  		
  		var input = document.getElementById("username");
  		var input1 = document.getElementById("userpassword");
  		
        input.addEventListener("keyup",onKey);
        input1.addEventListener("keyup",onKey);
  		    

  		function login(){
		  $('#login_btn').val('Processing...')
		  //$('#login_btn').attr('disabled', true);
		  
          $('.alert').hide()

  			var name = $('#username').val();
  			var pass = $('#userpassword').val();
  			
  			$.ajax({
		      type : "POST",
		      url: "index.php",
		      data : {name : name , pass : pass},
		      beforesend : function(){    
		      },
		      success : function(ress){
		       
		        console.log(ress)
		         logalert(ress)
		      }
		    })

  			
  		}
        
            
  		function onKey(event) {
            if (event.keyCode === 13){
             event.preventDefault();
               login()
            }
        }
        
        
  		function logalert(val){

  			var login_btn = $('#login_btn');
			
			if(val == 'login'){
				
				$('.alert').hide();
				
				$('.alert_pro').show()
                var time = setInterval( function(){
          			   var width = $('#progress-bar');
          			   var mainwidth =  parseFloat($('#progress-bar').parent().css('width'));
          			   
          			   var oldw = parseFloat(width.css('width'));
          			   var neww = oldw+<?=rand(80,90);?>;
          			   
          			   width.css('width', neww);
          			   var load = parseFloat((neww/mainwidth)*200).toFixed(0);
                       
          			     window.location.reload();
          			   if(load <= 100){
          			//       $('#loading').html(load+'%') 
          			//    }else{
          			       $('#loading').html('100%')
          			       width.css('width', '100%');
          			   }
          			   if(mainwidth < neww ){
          			        login_btn.val('Login')
				            login_btn.attr('disabled', false);
          			     
          			     window.location.reload();
          			     clearInterval(time)
          			   }
          			   
          		}, 3000);
          			
				// setTimeout(function(){ 
				// 	window.location.reload();
				// }, 2000);
				
			
			}else if(val == 'no'){
				login_btn.val('Login')
				login_btn.attr('disabled', false);
				
				$('.alert').removeClass('alert-success')
				$('.alert').html('<b>Error!</b> User name & password wrong.')
				$('.alert').addClass('alert-danger')
				$('.alert').show()
			}
  		}


  	</script>

    </body>

</html>