<?php 
    require_once "../include/load.php";
    $db->title = 'Application table';

    $pagecode = 'p_l_m';
?>
<!doctype html>
<html lang="en">
    <style>
        .selected{
            background-color:#082150 !important;
            color:white !important;
        }
        .selected a{
            /*color:white !important;*/
        }

        table td:last-child a:hover{
            box-shadow: 0 0 7px 1px #80808057;
            color: #ffff;
        }
        table th {
            white-space: nowrap; /* Prevent wrapping */
            width: 150px; /* Adjust width as needed */
            text-align: center; /* Optional: Center-align */
        }
    </style>
    <?php 
        include('../include/head.php');
        include('../include/header.php'); 
        // $_GET['sub_t'] = 'SHOW ALL APPLICATION';
        $title = 'SHOW ALL APPLICATIONS';
        include('../include/top.php'); 
    ?>
                        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <input type="hidden" value='all' id='table' /> 
            <form class="mt-3 p-3 shadow-sm table_filtr">
                <div class="row custom-center">
                    <div class="co-xl-2 col-lg-2 col-md-6 col-sm-12">
                        <div class="form-group mb-lg-0">
                            <select class="form-control shadow-sm p-3" id="form_id" onchange="filter()">
                            
                                <?php  $data = $db->getallexamssel('in_form');
                                while($row = mysqli_fetch_array($data)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    echo "<option value='$id'>$name</option>";
                                }
                                ?>
                                <option value="all" >Select All data</option>
                            </select>
                        </div>
                    </div>
                    <div class="co-xl-2 col-lg-2 col-md-6 col-sm-12">
                        <div  class="form-group mb-lg-0" id="exportToExcelDiv"></div>
                    </div>
                </div>
            </form>
        </div> 
        <div class="row ">
            <div class="col-lg-12 card p-2 m-2">
            <div class="card-body table-responsive">
                    <table id="data-table" class="table table-bordered datatable " style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th>S/No</th>
                                <th>Condidate ID#</th>
                                <th>Profile</th>
                                <th>Application Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>WhatsApp</th>
                                <th>Emergency Contact</th>
                                <th>Residential P.O.Box</th>
                                <th>Residential District</th>
                                <th>Residential City/Town/Village</th>
                                <th>Residential Province/Region</th>
                                <th>Residential Country</th>
                                <th>Date of passing Part 1 exam</th>
                                <th>Date of passing Part 2 exam</th>
                                <th>Country of PG clinical</th>
                                <th>Country of ethnic origin</th>
                                <th>Registration Authority </th>
                                <th>Registration Number </th>
                                <th>Registration Date </th>
                                <th>Preference Date 1</th>
                                <th>Preference Date 2</th>
                                <th>Preference Date 3</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->
        <!-- JAVASCRIPT -->
        <?php include('../include/footer.php');?>

        

        <script>
            $(function(){
                $("body").addClass("noselect");
                $("body").on("contextmenu",function(e){
                return false;
                    });
                filter();
                $('#data-table tbody').on( 'click', 'tr', function () {
                    $(this).toggleClass('selected');
                    $(".selected td:nth-child(1)").addClass("selection");
                    $(".selected input[type='checkbox']:checked");
                });
            })
            
    
            function edit(id){
                var data = {action : 'edit' , id : id };
                action('edit' , data );
            }
            
            function accept(id){

                Swal.fire(
                    {
                        title:"Are you sure you want to proceed?",
                        icon:"warning",
                        showCancelButton:!0,
                        confirmButtonText:"Yes, Plese Acceptance!",
                        cancelButtonText:"No, cancel Acceptance!",
                        confirmButtonClass:"btn btn-success mt-2",
                        cancelButtonClass:"btn btn-danger ms-2 mt-2",
                        buttonsStyling:!1,

                    }
                ).then(
                    function(t){
                        if(t.isConfirmed == true){
                            var data = {action : 'acceptreject' , id : id , status : 1 , 'reason' : '' };
                            action('acceptreject' , data );
                        }else{
                            Swal.fire({
                                title:"Cancelled",
                                text:"Thanks :)"})
                        }
                    }
                )
               
            }
            
            function reject(id){
            
                Swal.fire(
                    {
                        title:"Are you sure you want to proceed?",
                        icon:"warning",
                        showCancelButton:!0,
                        confirmButtonText:"Yes, Plese Rejection!",
                        cancelButtonText:"No, cancel Rejection!",
                        confirmButtonClass:"btn btn-success mt-2",
                        cancelButtonClass:"btn btn-danger ms-2 mt-2",
                        buttonsStyling:!1,

                    }
                ).then(
                    function(t){
                        if(t.isConfirmed == true){
                            var data = {action : 'acceptreject' , id : id , status : 2 , 'reason' : '' };
                            action('acceptreject' , data );
                        }else{
                            Swal.fire({
                                title:"Cancelled",
                                text:"Thanks :)"})
                        }
                    }
                )
            
            }
            
            function action(header , data ){
                var data = data;
                $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: data,
                    success: function(res) {
                        if(header == 'edit'){
                            $('.modal-dialog').css('max-width' , '60%'); 
                            header = 'Application Action';
                            mymodal(header , res)
                        }else if(header == 'acceptreject'){
                            Swal.fire({
                                title: 'Updated Successfully!',
                                icon: 'success',
                                draggable: true,
                                allowOutsideClick:false
                            });
                            filter();
                        }
                        console.log(res);
                        
                    },
                    error: function(e) {
                        console.log('Ajax Error' + e)
                    }
                })
                 
            }
            
            
            function filter(){
                
                var form_id = $('#form_id').val();
                var batch = $('#form_id option:selected').html()
                
                var datatable = $('#data-table').DataTable();
                datatable.destroy();   
                 $('#data-table').DataTable({
                    dom: '<"top"lBf>rt<"bottom"ip><"clear">',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: 'Export to Excel',
                            className: 'btn btn-success',
                            title: batch,
                            exportOptions: {
                                columns: ':hidden, :visible',
                            }
                            ,customize: function (xlsx) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                $('col', sheet).each(function () {
                                    if ($(this).attr('min') === '25' && $(this).attr('max') === '25') { 
                                        $(this).attr('hidden', '1');
                                    }
                                });

                                $('row c[r^="A"]', sheet).each(function (index) {
                                    if (index === 0) {
                                        $(this).find('t').text(batch);
                                    }
                                });

                                var workbook = xlsx.xl['workbook.xml'];
                                $('sheet', workbook).attr('name', batch);
                            }
                        }
                    ],
                    "select": {
                        style: 'multi'
                    },
                    "pageLength": 10,
                    "lengthMenu": [[10, 25, 50, 100 ], [10, 25, 50, 100]],
                    "bProcessing": true,
                    "serverSide": true,
                    "select": {
                        style: 'multi'
                    },
                    "order": [ 0, "desc" ],
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {},
                    "drawCallback": function( settings ) {},
                    "columnDefs": [
                        {
                            targets: [2,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22], 
                            visible: false, 
                            exportable: true
                        },
                        {
                            className: 'sorting_1 dtr-control ',
                            orderable: false,
                            targets:   'tr'
                        }
                        
                    ],
                    "ajax":{
                        url :"response.php",
                        type: "post",
                        data : { deleted : '1','form_id':form_id},
                        error: function(){
                            alert('Error! Please try later.')
                        }
                    } 
                })
            }
            function exportButton(){   
                var buttonDiv = $('.dt-buttons');
                $('#exportToExcelDiv').html(buttonDiv);
            }
        
        </script>
    </body>
</html>