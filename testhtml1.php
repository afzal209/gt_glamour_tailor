<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        
    </style>
    
<?php 
    $logo = 'GT';
    $logo = "";

    $exam_name = 'Glamour Tailor';
    $location = 'Karachi';


    $cust_name = 'Maroof';
    $num = '03328207573';
    $cust_add = 'Noor musdjid kagzi bazar.';
    $s= '1';
?>
</head>

<body>
    <div class="container">
        <div class="account-pages pt-sm-5">
            <div class="">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body "> 
                                <form class="custom-validation row" id='form-submit'>
                              
                                    <div class="row sec1">
                                        <div class="mb-3 col-md-2 row">
                                            <label for=""><h5>Bill .No</h5></label>
                                            <input type="text" name='bill' value='001' disabled class="form-control col-md-6"/>
                                        </div>
    
                                        <div class="mb-3 col-md-2">
                                            <label for=""><h5>Order Date</h5></label>
                                            <input type="date" value='3' name='od' value='<?=date('Y-m-d');?>' class="form-control"/>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label for=""><h5>Delivery Date</h5></label>
                                            <input type="date" value='2' name='dd' class="form-control"/>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="mb-3 col-md-1"><label for=""><h3>لامبائی</h3></label><input type="text"  value='17' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>شولڈر</h3></label><input type="text"  value='16' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>آستین</h3></label><input type="text"  value='15' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>سینه</h3></label><input type="text"  value='14' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>چوڑائی</h3></label><input type="text"  value='13' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>کمر</h3></label><input type="text"  value='12' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>دامن</h3></label><input type="text"  value='11' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>کالر</h3></label><input type="text"  value='10' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>گیر</h3></label><input type="text"  value='9' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>پاکٹ</h3></label><input type="text"  value='8' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>شلوار</h3></label><input type="text"  value='7' class="form-control"></div>
                                        <div class="mb-3 col-md-1"><label for=""><h3>باٹم</h3></label><input type="text"  value='6' class="form-control"></div>
                                    </div>
                                    <br>
                                   
                                    <div class="row sec3">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="col-md-9">
                                                        <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                        <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    </td>
                                                    <th class="col-md-1">
                                                        <h3>کالر</h3>
                                                    </th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                        <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                        <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                        <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>شیروانی</h3></th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                        <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                        <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>سامنے پاکٹ</h3></th>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> 
                                                        <h3>سائیڈ پاکٹ</h3>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>پٹی</h3></th> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> 
                                                        <h3>ڈبل سلائی</h3>
                                                    </th> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>کماندو دھاگہ</h3></th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>دامن چورس</h3></th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    
                                                    <th class="col-md-1"> <h3>گول دامن</h3></th> 
                                                
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>کف</h3></th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>گول آستین</h3></th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> <h3>کونی</h3></th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> 
                                                        <h3>پارٹ بٹن 4 </h3>
                                                    </th> 
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> 
                                                        <h3>فینسی بٹن</h3>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="col-md-9">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <td class="col-md-1">
                                                    <?=$s;?>
                                                    </td>
                                                    <th class="col-md-1"> 
                                                        <h3>سادے بٹن</h3>
                                                    </th> 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <table class='table table-borderd'>
                                            <tr>
                                                <td class="col-md-9 pejama">
                                                    <p class="p1">Gutna</p>
                                                    <p class="p2">Center</p>
                                                    <p class="p3">Gheer</p>
                                                    <p class="p4">Haseen</p>
                                                    <p class="p5">Pajama : </p>
                                                    <p class="p6">Zinpp</p>
                                                    <img src="print/dig.png" alt="" style="width: 80%; background-color: #ffff;">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr><br>
    <div><span class='logo'><?=$logo;?> <img src='print/Logo-gt.png' alt=''></span></div> 
                                    <div class="row cust">
                                        <div class="col-md-12  text-center">
                                            <h1> <?=$exam_name;?> </h1>      
                                            <h3><?=$location;?></h3>
                                            <p>Shop NO. 02, Fatima Manzil 8/26, Old Town, Near Alif Musjid Methadar, Karachi.</p><br>
                                            <p>0334-2452626</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h1><?=$cust_name;?> </h1>      
                                            <h3><?=$num;?></h3>
                                            <p><?=$cust_add;?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="row bill">    
                                        
                                        <h2 style='text-align: center;'>Customer Billing</h2>
                                        
                                        <div class="col-md-12">
                                            <table class='table table-bordered billing'>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Description</th>
                                                    <th>Button</th>
                                                    <th>Sheeling</th>
                                                    <th>Suit Type - Rate</th>
                                                    <th>Amount</th>
                                                </tr>
                                                <?php for ($i=0; $i < 3 ; $i++) { ?> 
                                                <tr id='tr#<?=$i;?>'>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                    <?=$s;?>
                                                     </td>
                                                    <td>
                                                    <?=$s;?>
                                                    </td>
                                                    <td>
                                                    <?=$s;?>
                                                    </td>
                                                    <td>
                                                    <?=$s;?>
                                                    </td>
                                                </tr>
                                                <?php }; ?> 
                                                
                                                <tr>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <th>Total</th>
                                                    <td>
                                                    <?=$s;?>
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>    
                                                    <th >Advance</th>
                                                    <td> 
                                                    <?=$s;?>
                                                    </td>
                                                </tr>
                                                <tr><td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <th >Balance</th>
                                                    <td>
                                                    <?=$s;?>
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
</body>
</html>