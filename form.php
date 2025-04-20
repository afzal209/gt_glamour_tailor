<?php
    include "include/main.function.php"; 
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <style>
      body {font-family: 'DejaVu Sans', sans-serif;}
    </style>
    <?php $form_id = $db->formlimit($_GET);
      if(!is_int($form_id)){?>
        <div class="container " >
            <div class="mt-4 p-5 col-md-6 bg-light rounded" style="margin:auto">
                <img src="<?=$url;?>assets/images/logo.png" alt=""  width="50%">
                <br><br><br><br>
                <h1>Note!</h1> 
                <h5><?=$form_id;?></h5> 
            </div>
        </div>
        <?php die();}
            $qu = $db->getall("in_form WHERE id = '$form_id' ", '');
            $form_d = mysqli_fetch_assoc($qu);
            $exam_name = $form_d['name'];
            $location = $form_d['location'];
        ?>
    <title><?=$exam_name;?> | <?=$location;?> Pakistan</title>
</head>

<body class="">
    <style>
        .logo-form {
            width: 7%;
            position: absolute;
            top: 2rem;
        }
        .iti.iti--allow-dropdown {
            width: 100%;
        }
        .hide{
            display:none;
        }
        .txt-danger{
            font-size: 12px;
            list-style: none;
            color: #f46a6a;
            margin-top: 5px;
        }
        .txt-success{
            font-size: 12px;
            list-style: none;
            color: #34c38f;
            margin-top: 5px;
        }

        #parsley-id-27{
            display:none;
        }

        #form-submit > div > label{
            text-align: center;
            width: 100%;
            /* border: 1px solid #ced4da; */
            padding : .47rem .75rem;
        }

        .table>:not(caption)>*>* {
            border-color: #0000003d;
            border-bottom: 1px solid #0000003d;
        }

        .table>:not(caption)>*>*>input {
            border: 0;
            border-bottom: 1px solid #d3d8de;
        }

        .sec3 label {
            text-align:center;
            width:100%;
        }
        .form-control:focus{
            box-shadow:0px 0 4px #397dd0;
        }
        .float-left{
            float:left;
            /* margin:0.1px; */
        }
        .float-right{
            float:right;
            /* margin:0.1px; */
        }
        .speciaamount , .total , .adv , .dis, .bal{
            font-size : 20px;
            font-weight:bold;
            border:0;
        }
        input{
            cursor: default;
        }
    </style>
    <div class="account-pages pt-sm-5">
        <div class="">
          <div class="row">
                <div class="col-md-12  text-center">
                    <h1><?=$exam_name;?> </h1>      
                    <h3>Billing Book</h3>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body "> 
                            <form class="custom-validation row" method='POST' action='testhtml.php' target="_blank" >
                                <input type="text" hidden name='form_id' id="form_id" value='<?=$form_id;?>'>
                                <input type="text" hidden name='form_action' id='form_action' value='view'>
                                <input type="text" hidden name='bill_num' id='title' value='<?=$exam_name.' - '.$location;?>'>

                                <div class="row">
                                    <div class="mb-3 col-md-2 row">
                                        <label for=""><h5>Bill .No</h5></label>
                                        <input type="text" name='bill' value='001' disabled class="form-control col-md-6"/>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for=""><h5>Name Of Customer</h5></label>
                                        <input type="text" name='cu' class="form-control"/>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for=""><h5>Delivery Date</h5></label>
                                        <input type="date"  name='dd' class="form-control"/>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for=""><h5>Order Date</h5></label>
                                        <input type="date" name='od' value='<?=date('Y-m-d');?>' class="form-control"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-1"><label for=""><h3>لامبائی</h3></label><input type="text"  name='a1' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>شولڈر</h3></label><input type="text"  name='a2' class="form-control"></div>
                                    
                                    <div class="mb-3 col-md-1">
                                        <label for="">
                                            <h3>آستین</h3>
                                        </label>
                                        <input type="text"  name='a3' class="form-control"/>
                                        <input type="text"  name='a3b' class="form-control"/>
                                    </div>
                                    
                                    <div class="mb-3 col-md-1"><label for=""><h3>سینه</h3></label><input type="text"  name='a4' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>چوڑائی</h3></label><input type="text"  name='a5' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>کمر</h3></label><input type="text"  name='a6' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>دامن</h3></label><input type="text"  name='a7' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>کالر</h3></label><input type="text"  name='a8' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>گیر</h3></label><input type="text"  name='a9' class="form-control"><input type="text"  name='a9b' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>پاکٹ</h3></label><input type="text"  name='a10' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>شلوار</h3></label><input type="text"  name='a11' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3>باٹم</h3></label><input type="text"  name='a12' class="form-control"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="check" name='b3' value='20' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b2' value='19' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="checkbox" name='b1' value='18' class="" />
                                                </td>
                                                <th class="col-md-1">
                                                    <h3>کالر</h3>
                                                </th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b6' value='23' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b5' value='22' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b4' value='21' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> <h3>شیروانی</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b9' value='26' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b8' value='25' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b7' value='24' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> <h3>سامنے پاکٹ</h3></th>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b12' value='29' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b11' value='28' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b10' value='27' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>سائیڈ پاکٹ</h3>
                                                </th>
                                                
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b15' value='32' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b14' value='31' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b13' value='30' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> <h3>پٹی</h3></th> 
                                                
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b18' value='35' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b17' value='34' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b16' value='33' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>ڈبل سلائی</h3>
                                                </th> 
                                                
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b21' value='38' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b20' value='37' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b19' value='36' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>کماندو دھاگہ</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b24' value='41' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b23' value='40' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b22' value='39' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>دامن چورس</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b27' value='44' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b26' value='43' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b25' value='42' class="form-control bdnon">
                                                </td>
                                                
                                                <th class="col-md-1"> <h3>گول دامن</h3></th> 
                                            
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b30' value='47' class="form-control bdnon">        
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b29' value='46' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b28' value='45' class="form-control bdnon">
                                                </td>
                                                    <th class="col-md-1"> <h3>کف</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b33' value='50' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b32' value='49' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b31' value='48' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>گول آستین</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b36' value='53' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b35' value='52' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b34' value='51' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>کونی</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b39' value='56' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b38' value='55' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b37' value='54' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>پارٹ بٹن 4 </h3>
                                                </th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b42' value='59' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b41' value='58' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b40' value='57' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>فینسی بٹن</h3>
                                                </th> 
                                            
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" name='b45' value='62' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b44' value='61' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" name='b43' value='60' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>سادے بٹن</h3>
                                                </th> 
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">    
                                    <h2 style='text-align: center;'>Customer Billing</h2>
                                    
                                    <div class="col-md-12">
                                        <table class='table table-bordered billing'>
                                            <tr>
                                                <th class='col-md-1'>Qty</th>
                                                <th class='col-md-4' >Description</th>
                                                <th class='col-md-2'>Button</th>
                                                <th class='col-md-1'>Sheling</th>
                                                <th class='col-md-2'>Suit Type - Rate</th>
                                                <th class='col-md-4'>Amount</th>
                                            </tr>
                                            <?php for ($i=0; $i < 3 ; $i++) { ?> 
                                            <tr id='tr#<?=$i;?>'>
                                                <td><input type="text" class="form-control qty<?=$i;?>" placeholder='0'></td>
                                                <td><input type="text" class="form-control desc<?=$i;?>"></td>
                                                <td>
                                                    <select class='form-control w-50 float-left'>
                                                        <option value="">Normal</option>
                                                        <option value="">Fancy</option>
                                                        <option value="">tuch</option>
                                                    </select>
                                                    <input type="text" placeholder='Rs.0' class="form-control w-50 float-right but<?=$i;?>">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder='Rs.0' class="form-control sheling<?=$i;?>">
                                                </td>
                                                <td>
                                                    <select class='form-control w-50 float-left'>
                                                        <option value="">Sada</option>
                                                        <option value="">Design</option>
                                                    </select>
                                                    <input type="text" placeholder='Rs.0' value='1500' class="form-control w-50 float-right sut<?=$i;?>">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder='Rs.0' disabled class="form-control speciaamount amt<?=$i;?>">
                                                </td>
                                            </tr>
                                            <?php }; ?> 
                                            
                                            <tr id='t1#'>
                                                <td rowspan='4' colspan='3'></td>
                                                <th colspan='2'>Total</th>
                                                <td>
                                                    <input type="text" placeholder='Rs.0' disabled class="form-control total ">
                                                </td>
                                            </tr>
                                            <tr id='t2#'>
                                                <th colspan='2'>Discount</th>
                                                <td> 
                                                    <input type="text" placeholder='Rs.0' class="form-control dis">
                                                </td>
                                            </tr>
                                            <tr id='t3#'>
                                                <th colspan='2'>Advance</th>
                                                <td> 
                                                    <input type="text" placeholder='Rs.0' class="form-control adv">
                                                </td>
                                            </tr>
                                            <tr id='t2#'>
                                                <th colspan='2'>Balance</th>
                                                <td>
                                                    <input type="text" placeholder='Null' disabled class="form-control bal"> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1 col-md-12" >
                                        Submit Form
                                    </button>
                                
                                    <button type='button' class="btn btn-info waves-effect waves-light me-1" id='pre' onclick="preview()">
                                        Preview
                                    </button>
                                </div>
                                
                            </form>
        
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
    <script src="assets/js/pages/form-validation.init.js"></script>
    <script src="assets/libs/parsleyjs/parsley.min.js"></script>
    <!-- form mask -->
    <script src="assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- form mask init -->
    <script src="assets/js/pages/form-mask.init.js"></script>
    <script src="assets/js/app.js"></script>
    
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="assets/js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    
    <button type="button" style="display: none;" id='modalbuttonforshow' class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Static backdrop modal
        </button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" value="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mtitle"></h5>
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
    <script >
    $(function(){
    
        jQuery('.billing tr input').on('change keyup', onchangecalculate);
        
        function onchangecalculate(e) {
            var id = jQuery(e.target).closest('tr').attr('id').split("#")[1];
            var qty = Number(jQuery('.qty'+id).val())
            var but = Number(jQuery('.but'+id).val())
            var sut = Number(jQuery('.sut'+id).val());
            var sheling = Number(jQuery('.sheling'+id).val());
            // var sut = jQuery('.rate'+id).val();
            var total = qty * (but+sut+sheling);
            var sut = jQuery('.amt'+id).val(total);

            var total = 0;
            jQuery('.speciaamount').each((k , v)=>{
                total = total+Number(jQuery(v).val())
            })
            $('.total').val(total)

            console.log(total)
            
            var dis = Number($('.dis').val())   
            var adv = Number($('.adv').val())
            var bal = Number(total) - (dis + adv);
            $('.bal').val(bal)
        }
    })
        
        function mymodal(head , body){
            if(head == ''){
                head = $('.form-title').html();
            }
            $('#mtitle').html(head);
            if(body == ''){body='There is some Error!'}
            $('#modal-body').html(body);
            $('#modalbuttonforshow').click();
            
        }

        function preview(){
            
            $.ajax({
                url: 'testhtml.php',
                method: 'POST',
                data:{'url': 'test'},
                success: function (resp) {
                    console.log(resp);
                    // const element = document.createElement('div');
                    // element.innerHTML = $('html').html(); // Inject the HTML content
                    // document.body.appendChild(element);

                    html2pdf().from(resp).set({
                        margin: 1,
                        filename: 'output.pdf',
                        html2canvas: { scale: window.devicePixelRatio || 2 },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                    }).save();
                },
                error: function (err) {
                    console.error('Error fetching HTML:', err);
                }
            });
        
        }
    </script>

</body>
</html>