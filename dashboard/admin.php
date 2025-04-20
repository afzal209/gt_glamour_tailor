<?php   
    $date = date('Y-m');
    $icon = "";
?>   
<style>
    tr td {
        font-size: 18px;
        font-family: 'Open Sans';
    }
    tfoot tr th{
        font-size: 18px !important;
    
    }
    
    thead tr th{
        font-size: 18px !important;
    
    }
    div#detail {
        width: 100%;
        height: 500px;
    }

    .see_more{
        display:none;
    }

    tr.child ul li span {
        
        font-size:12px;
    }
    td.child ul li span:nth-child(2) {
        width: 50% !important;
        float: right;
    }
    td.child ul li span:nth-child(1) {
        width: 50% !important;
    }
    td.child ul li {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    span.dtr-data button {
        color: #fff;
        border: 1px solid;
    }
    .calcu{
        display:flex;
        justify-content: center;
    }

</style>
 
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="allteam" role="tabpanel" aria-labelledby="allteam-tab">
        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card">
                <div class="earning_heading">
                    <h4 style="
    font-family: revert;
    text-decoration: underline;
    text-underline-position: under;
">Month of <span ><?=date('F')?></span></h4>
                </div>
            </div>
            <div class="row">
                <h2>Todays Status</h2>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-3">
                    <div class="earning_box  p-3 mb-4">
                        <div class="row">
                            <div class="col-xs-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <div class="earning_text">
                                    <h3 class="font-weight-bold"> <?=$icon?>  <span id='rev_t1'>0.00</span></h3>
                                    <p class="text-muted">Total Bills</p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 calcu">
                                <div class="calculate_icon text-right">
                                    <span class="icon2 text-center rounded-circle"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-4">
                    <div class="earning_box  p-3 mb-4">
                        <div class="row">
                            <div class="col-xs-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <div class="earning_text">
                                    <h3 class="font-weight-bold"> <?=$icon?>  <span id='rev_p1'>0.00</span></h3>
                                    <p class="text-muted">Pending Bills</p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                <div class="calculate_icon text-right">
                                    <span class="icon2 text-center rounded-circle"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-12 col-sm-4">
                    <div class="earning_box  p-3 mb-4">
                        <div class="row">
                            <div class="col-xs-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <div class="earning_text">
                                    <h3 class="font-weight-bold"> <?=$icon?>  <span id='rev_a1'>0.00</span></h3>
                                    <p class="text-muted">Deliverd</p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                <div class="calculate_icon text-right">
                                    <span class="icon2 text-center rounded-circle"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h2>Monthly Status</h2>
                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                    <div class="earning_box  p-3 mb-4">
                        <div class="row">
                            <div class="col-xs-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <div class="earning_text">
                                    <h3 class="font-weight-bold "> <?=$icon?>  <span  id='rev_t'>0.00</span></h3>
                                    <p class="text-muted">Total Bills</p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 calcu">
                                <div class="calculate_icon text-right">
                                    <span class="icon1 text-center rounded-circle"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                    <div class="earning_box  p-3 mb-4">
                        <div class="row">
                            <div class="col-xs-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <div class="earning_text">
                                    <h3 class="font-weight-bold "> <?=$icon?>  <span  id='rev_p'>0.00</span></h3>
                                    <p class="text-muted">Pending Delivery</p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 calcu">
                                <div class="calculate_icon text-right">
                                    <span class="icon1 text-center rounded-circle"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                    <div class="earning_box  p-3 mb-4">
                        <div class="row">
                            <div class="col-xs-10 col-lg-10 col-md-10 col-sm-10 col-10">
                                <div class="earning_text">
                                    <h3 class="font-weight-bold"> <?=$icon?>  <span id='rev_a'>0.00</span></h3>
                                    <p class="text-muted">Deliverd</p>
                                </div>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 calcu">
                                <div class="calculate_icon text-right">
                                    <span class="icon2 text-center rounded-circle"><i class="fas fa-calculator"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>  
    </div>
</div>

<script src="../assets/libs/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: "response.php",
            data: {'action': '1'},
            success: function (response) {
                var obj = JSON.parse(response);
                $('#rev_t').html(obj.total)
                $('#rev_a').html(obj.accept)
                $('#rev_r').html(obj.reject)
                $('#rev_p').html(obj.pending)
                $('#rev_t1').html(obj.totalc)
                $('#rev_a1').html(obj.acceptc)
                $('#rev_r1').html(obj.rejectc)
                $('#rev_p1').html(obj.pendingc)
            }
        })
    });
</script>