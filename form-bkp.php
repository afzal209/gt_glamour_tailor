<?php

	// include "include/main.function.php"; 
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>APPLICATION FORM | MRCGP International South Asia - Pakistan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

    <script>
      
    </script>

    <?php 
    $exam_name = 'name';
    $location = 'location';
    ?>
</head>
<body class="" id='body'>
<style>
    @font-face {
        font-family: 'JameelNooriNastaleeq';
        src: url('urdu/JameelNooriNastaleeq.ttf') format('truetype');
    }
    /* 
    body {
        font-family: 'JameelNooriNastaleeq', 'DejaVuSans';
    } */

        .table .form-control{
            border : 0;
            font-size: 12px;
        }

        .table th h3{
            font-size: 25px;
            text-align: right;
            font-family: 'DejaVuSans';
        }

        .form-control {
            padding:  8px;
            /* border-left: 0;
            border-right: 0;
            border-bottom: 0; */
            border-radius: 0;
            font-size: 12px;
            font-family: inherit;

        }

        label h5 {
            font-size: 12px;
            margin: 0;
        }

        label h3 {
            font-size: 12px;
            margin: 0;
            font-family: fantasy;
        }

        label {
            width: 100%;
            margin: 0px 0px 7px 0;
        }

        .sec2 label {
            text-align: right;
        }
        .sec2 label img {
            width: 90%;
            height: 3.1rem;
        }
        .sec2 >div {
            margin: 0;
            padding: 2px;
        }
</style>
    <div class="account-pages pt-sm-5">
        <div class="">
            <div class="row">
                <div class="col-md-12  text-center">
                    <h1><?=$exam_name;?> </h1>      
                    <h3><?=$location;?></h3>
                    <p>Shop NO. 02, Fatima Manzil 8/26, Old Town, Near Alif Musjid Methadar, Karachi.</p>
                    <p>0334-2452626</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body "> 
                            <form class="custom-validation row" id='form-submit' style="justify-content: center;">
                                <div class="row">
                                    <div class="mb-3 col-md-2 row">
                                        <label for=""><h5>Bill .No</h5></label>
                                        <input type="text" name='bill' value='001' disabled class="form-control col-md-6"/>
                                        <!-- <input type="text" tabindex='1' name='breff' value='001' placeholder='Reff' class="form-control col-md-6"/> -->
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for=""><h5>Name Of Customer</h5></label>
                                        <input type="text" tabindex='1' name='nc' class="form-control"/>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for=""><h5>Delivery Date</h5></label>
                                        <input type="date" tabindex='2' name='dd' class="form-control"/>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for=""><h5>Order Date</h5></label>
                                        <input type="date" tabindex='3' name='od' value='<?=date('Y-m-d');?>' class="form-control"/>
                                    </div>
                                </div>

                                <div class="row sec2">
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/1.png"></h3></label><input type="text"  tabindex='17' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/2.png"></h3></label><input type="text"  tabindex='16' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/3.png"></h3></label><input type="text"  tabindex='15' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/4.png"></h3></label><input type="text"  tabindex='14' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/5.png"></h3></label><input type="text"  tabindex='13' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/6.png"></h3></label><input type="text"  tabindex='12' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/7.png"></h3></label><input type="text"  tabindex='11' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/8.png"></h3></label><input type="text"  tabindex='10' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/9.png"></h3></label><input type="text"  tabindex='9' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/10.png"></h3></label><input type="text"  tabindex='8' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/11.png"></h3></label><input type="text"  tabindex='7' class="form-control"></div>
                                    <div class="mb-3 col-md-1"><label for=""><h3><img src="print/12.png"></h3></label><input type="text"  tabindex='6' class="form-control"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="check" tabindex='20' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='19' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="checkbox"  tabindex='18' class="" />
                                                </td>
                                                <th class="col-md-1">
                                                    <h3>کالر</h3>
                                                </th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='23' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='22' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='21' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> <h3>شیروانی</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='26' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='25' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='24' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> <h3>سامنے پاکٹ</h3></th>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='29' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='28' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='27' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>سائیڈ پاکٹ</h3>
                                                </th>
                                                
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='32' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='31' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='30' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> <h3>پٹی</h3></th> 
                                                
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text" tabindex='35' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" tabindex='34' class="form-control bdnon" />
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text" tabindex='33' class="form-control bdnon" />
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>ڈبل سلائی</h3>
                                                </th> 
                                                
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='38' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='37' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='36' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>کماندو دھاگہ</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='41' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='40' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='39' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>دامن چورس</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='44' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='43' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='42' class="form-control bdnon">
                                                </td>
                                                
                                                <th class="col-md-1"> <h3>گول دامن</h3></th> 
                                            
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='47' class="form-control bdnon">        
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='46' class="form-control bdnon">
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='45' class="form-control bdnon">
                                                </td>
                                                    <th class="col-md-1"> <h3>کف</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='50' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='49' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='48' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>گول آستین</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='53' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='52' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='51' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> <h3>کونی</h3></th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='56' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='55' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='54' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>پارٹ بٹن 4 </h3>
                                                </th> 
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='59' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='58' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='57' class="form-control bdnon">
                                                </td>
                                                <th class="col-md-1"> 
                                                    <h3>فینسی بٹن</h3>
                                                </th> 
                                            
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">
                                                    <input type="text"  tabindex='62' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='61' class="form-control bdnon">
                                                    
                                                </td>
                                                <td class="col-md-1">
                                                    <input type="text"  tabindex='60' class="form-control bdnon">
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
                                                    <input type="text" placeholder='Rs.0' class="form-control w-50 float-right sut<?=$i;?>">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder='Rs.0' disabled class="form-control speciaamount amt<?=$i;?>">
                                                </td>
                                            </tr>
                                            <?php }; ?> 
                                            
                                            <tr>
                                                <td rowspan='3' colspan='3'></td>
                                                <th colspan='2'>Total</th>
                                                <td>
                                                    <input type="text" placeholder='Rs.0' disabled class="form-control speciaamount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan='2'>Advance</th>
                                                <td> 
                                                    <input type="text" placeholder='Rs.0' class="form-control speciaamount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan='2'>Balance</th>
                                                <td>
                                                    <input type="text" placeholder='Null' disabled class="form-control speciaamount"> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                        
                                
                            </form>
        
                        </div>
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
<!-- 
    <script >
    $(function(){
        const element = document.getElementById('body');
        const options = {
            margin: 1,
            image: { type: 'png', quality: 1 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        html2pdf().from(element).toPdf().get('pdf').then(function (pdf) {
            const blob = pdf.output('blob'); // Get the PDF as a Blob
            const url = URL.createObjectURL(blob); // Create a Blob URL
            // window.open(url); // Open the Blob URL in a new tab
        });
    });

        
    </script> -->

</body>
</html>