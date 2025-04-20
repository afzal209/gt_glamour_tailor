                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                </script> 
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                © <script>document.write(new Date().getFullYear())</script> All Rights Reserved. 
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>          
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!-- Right Sidebar -->
        <div class="right-bar w-20">
            <div data-simplebar class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Profile</h5>
                    
                    <a href="?logout" class="right-bar-toggle ms-auto" style="border-radius: 24%;width: 25px;height: 25px;">
                        <i class="fas fa-sign-out-alt"></i>  
                    </a>
                </div>
                <!-- Settings -->
                <hr class="mt-0" />
                <div class="card-body">
                    <div class="text-center">
                        <div class="dropdown float-end">
                            <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="uil uil-ellipsis-v"></i>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <?php $profile= $user['profile'] == '' ? '/brands/mail_chimp.png':'/brands/mail_chimp.png' ;?>
                            <img src="<?=$url;?>assets/images<?=$profile;?>" alt="Profile pic" class="avatar-lg rounded-circle img-thumbnail">
                        </div>
                        <h5 class="mt-3 mb-1"><?=$user['pname']; ?></h5>
                        <p class="text-muted"><?=$db->role_name; ?></p>

                        <!--<div class="mt-4">-->
                        <!--    <button type="button" class="btn btn-light btn-sm"><i class="uil uil-envelope-alt me-2"></i> Message</button>-->
                        <!--</div>-->
                    </div>

                    <hr class="my-4">

                    <div class="text-muted">
                        <!--<h5 class="font-size-16">About</h5>-->
                        <!--<p>Hi I'm Marcus,has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>-->
                        <div class="table-responsive mt-4">
                            <div>
                                <p class="mb-1">Name :</p>
                                <h5 class="font-size-16">daniyal</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Mobile :</p>
                                <h5 class="font-size-16">+000000</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">E-mail :</p>
                                <h5 class="font-size-16">email@email.com</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Location :</p>
                                <h5 class="font-size-16">Pakistan</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
       <div class="rightbar-overlay"></div>


        <!-- JAVASCRIPT -->
        
        <script src="<?=$url;?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?=$url;?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=$url;?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?=$url;?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?=$url;?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?=$url;?>assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?=$url;?>assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- plugins -->
        <script src="<?=$url;?>assets/libs/select2/js/select2.min.js"></script>
        
        
        <script src="<?=$url;?>assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="<?=$url;?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?=$url;?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?=$url;?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <!-- init js -->
        <script src="<?=$url;?>assets/js/pages/form-advanced.init.js"></script>
        <!-- Required datatable js -->
        <script src="<?=$url;?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=$url;?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="<?=$url;?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=$url;?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
      
        <script src="<?=$url;?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=$url;?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?=$url;?>assets/libs/jszip/jszip.min.js"></script>
        <!-- apexcharts assets\libs\jszip-->
        <script src="<?=$url;?>assets/libs/apexcharts/apexcharts.min.js"></script>
        
        <script src="<?=$url;?>assets/js/pages/ecommerce-datatables.init.js"></script>
        <script src="<?=$url;?>assets/js/pages/fontawesome.init.js"></script>
        <script src="<?=$url;?>assets/libs/parsleyjs/parsley.min.js"></script>
        
        <script src="<?=$url;?>assets/js/app.js"></script>

        <!-- staticBackdrop Modal -->
         <button type="button" style="display: none;" id='modalbuttonforshow' class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Static backdrop modal
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mtitle">CRM Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body  table-responsive" id='modal-body'>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
     
         function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(element).select();
        
            if (document.execCommand("copy")) {
                $temp.remove()
                swal("Successfully!", "Your selected value Copy Now!", "success");
            };

        }
     
            function mymodal(head , body){
                if(head != ''){
                    $('#mtitle').html(head);
                }
                
                if(body == ''){body='There is some Error!'}
                $('#modal-body').html(body);
                $('#modalbuttonforshow').click();
                if(head == 'Customer Info'  ){
                <?php if($db->admin != 1){ ?>
                    $('body').addClass("noselect");
                <?php }else{ ?>
                    $("#staticBackdrop").removeClass("noselect");
                    $('body').removeClass("noselect");
                <?php }; ?>
                }
            }
            
            function time_cal(){
                $.ajax({
                  url:'../time.php',
                  type:'POST',
                  success: function(response){
                    //   console.log(response['check_in'])
                      var obj = JSON.parse(response);
                    //   console.log(obj.check_in);
                      $('#checkin .in_time').html(obj.check_in)
                       $('#checkin .hours').html(obj.hours)
                   
                      
                    //   $('#time_bar').css('width' , response+'%' )
                  }
                })
            }
       
        
        // function checkin(date , time , inout ){
        //     var userid = $('#userid').val(); 
        //     $.ajax({
        //         type : "POST",
        //         url: "dashboard/response.php",
        //         data : {'action':'checkinaction' , 'date' : date , 'time' : time , 'inout' : inout , 'userid' : userid},
        //         beforesend : function(){
        //              $('#loader').show();
        //         },
        //         success : function(res){ 
        //           console.log(res)
        //         //   alert()
                   
        //         }    
        //     })
                 
        // }
        
    function pdf(inv){
        console.log(inv)
        
        $.ajax({
            url:'../../pdf/',
            type:'GET',
            data : {inv: inv},
            success: function(response){
                swal('PDF Created !!')
            },
            error : function(err){
                console.log(err)
            }
        });    

    }
            function check_in( btn ){
                // var btn = $('#'+btn);
                // btn.html('Please wait...');
                // btn.attr('disabled', true);
                
                // var action = 'checkinaction';
                // var user = <?=$db->user_id?>;
                // var date = $('#checkin_date').val();
                // var time = $('.in_time').html();
                // var id   = $('#checkin_id').val();
                
                // $.ajax({
                //   url:'../dashboard/response.php',
                //   type:'POST',
                //   date : {'action' : action , 'id' : id , 'time' : time , 'date' : date , 'user' : user},
                //   success: function(response){
                //     // btn.attr("onclick","alert('test')")
                //     btn.attr('disabled', false);
                //     btn.html('Check Out');
                //     btn.addClass('btn-success');
                //     btn.removeClass('btn-danger');
                   
                    
                //     // let dateOne = new Date('9/14/2021 03:30 AM');
                //     // let dateTwo = new Date();
                //     // let oneTime = dateOne.getTime()
                //     // let twoTime = dateTwo.getTime()
                    
                //     // let timeDiff = Math.abs(dateTwo - dateOne);
                    
                //     // let day = Math.floor(timeDiff/(1000*60*60*24));
                    
                //     // let hours = Math.floor(timeDiff/(1000*60*60))-(day * 24);
                    
                //     // let minutes = (timeDiff/(1000*60))-(hours*60);
                    
                //     // hours= (hours<10)? "0"+ hours : hours; 
                //     // minutes= (minutes<10)? "0"+ minutes : minutes; 
                   
                //     // console.log(day); 
                //     // console.log(hours);
                //     // console.log(dateTwo)
                    
                //     //   $('#time_bar').css('width' , response+'%' )
                //   }
                // })
            }
        </script>