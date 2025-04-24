<?php 
    require_once "../include/load.php";
    $db->title = 'Add Exam';
    $pagecode = 'p_l_m';
?>
<!doctype html>
<html lang="en">
    <style>
        input[switch]:checked+label:after {
            left: 53px !important;
        }
        input[switch]+label{
            width: 75px !important;
        }
        .bg-edit{
            background-color:#082150;
            color:white;
        }
    </style>
    <?php 
        include('../include/head.php');
        include('../include/header.php'); 
        $title = 'Add Exam Form';
        include('../include/top.php');
    ?>
        <div class="row mt-3 ">
            <div class="col-md-12 mx-12 py-2 card">
                <h4 class="pt-3">Add New Exam</h4><hr>
                <form class="row" id='addbatch-submit'>
                    <div class="px-3 py-1 col-md-2">
                        <label class="form-label">Exam Name</label>
                        <input required name="name" id="name" class="form-control" placeholder='Exam Name'>
                    </div>
                    <div class="px-3 py-1 col-md-2">
                        <label class="form-label">Exam Location</label>
                        <input required name="location" id="location" class="form-control" placeholder='Exam Location'>
                    </div>
                    <div class="px-3 py-1 col-md-4">
                        <label class="form-label">Applications Receiving Dates</label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" 
                        data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input required type="text" id='sdate' class="form-control" name="start" placeholder="Start Date" />
                            <input required type="text" id='edate' class="form-control" name="end" placeholder="End Date" />
                        </div>
                    </div>
                    <div class="px-3 py-1 col-md-2">
                        <label class="form-label">Applications Limit</label>
                        <input required name="limit" id='limit' type='number' class="form-control" placeholder='Limit'>
                    </div>
                    <div class="px-3 py-1 col-md-2">
                        <label class="form-label">Waiting Applications Limit</label>
                        <input required name="elimit" id='elimit' type='number' class="form-control" placeholder='Waiting Limit'>
                    </div>
                    <div class="px-3 py-1 col-md-3">
                        <label class="form-label">Exam Slot One</label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" 
                        data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input type="text" id='s1' class="form-control" name="exam1[]" placeholder="Start Date" />
                            <input type="text" id='e1' class="form-control" name="exam1[]" placeholder="End Date" />
                        </div>
                    </div>
                    <div class="px-3 py-1 col-md-3">
                        <label class="form-label">Exam Slot Two <small>(if applicable)</small></label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" 
                        data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input type="text" id='s2' class="form-control" name="exam2[]" placeholder="Start Date" />
                            <input type="text" id='e2' class="form-control" name="exam2[]" placeholder="End Date" />
                        </div>
                    </div>
                    <div class="px-3 py-1 col-md-3">
                        <label class="form-label">Exam Slot Three <small>(if applicable)</small></label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" 
                        data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                            <input type="text" id='s3' class="form-control" name="exam3[]" placeholder="Start Date" />
                            <input type="text" id='e3' class="form-control" name="exam3[]" placeholder="End Date" />
                        </div>
                    </div>
                    <div class="px-3 py-1 col-md-2" style="display: flex; align-items: flex-end;">
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1" id='addbtn'>Submit</button>
                    </div>
                </form>
            </div>
	    <div class="col-md-12 py-2 card">
                <h4 class="pt-3">Exam List</h4><hr>
                <div class='table-responsive' style="height: 30rem;">
                    <table class=' table table-bordered '>
                        <tr>
                            <th>S.No</th>
                            <th>Exam Name</th>
                            <th>Location</th>
                            <th>Applications Opening Date</th>
                            <th>Applications Closing Date</th>
                            <th>Exam Slot 1</th>
                            <th>Exam Slot 2</th>
                            <th>Exam Slot 3</th>
                            <th>Applications Limit</th>
                            <th>Waiting Applications Limit</th>
                            <th>Form Link</th>
                            <th>Form Link</th>
                            <th>Action</th>
                        </tr>
                        <?php $qu = $db->batch();
                        while($row = mysqli_fetch_array($qu)){
                            $block = $row['is_block']? '' : 'checked'; 
                            $i++;
                            $urls = sprintf(
                                "%s://%s%s",
                                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                                $_SERVER['HTTP_HOST'],
                                "/gt_glamour_tailor/form.php?XfsadrtTTSd2=".$row['url']
                            );
                            $id = $row['id'];
                            echo "
                            <tr id='$id'>
                                <td>$i</td>
                                <td data='name'>$row[name]</td>
                                <td data='location'>$row[location]</td>
                                <td data='sdate'>$row[start_date]</td>
                                <td data='edate'>$row[end_date]</td>
                                <td data='s1|e1'>$row[p1]</td>
                                <td data='s2|e2'>$row[p2]</td>
                                <td data='s3|e3'>$row[p3]</td>
                                <td data='limit'>$row[form_limit]</td>
                                <td data='elimit'>$row[extar_form_limit]</td>
                                <td><a target='v' href='$urls'>Form Link</a></td>
                                <td>
                                    <input type='checkbox' id='switch$i' switch='none' onchange='block_sub($id,$row[is_block])' $block/>
                                    <label for='switch$i' data-on-label='Unblock' data-off-label='Block'></label>
                                </td>
                                <td>
                                    <button onclick='batchedit($id)' class='btn btn-info'>Edit</button>
                                </td>
                            </tr>";
                        };?>
                    </table>
                </div>
            </div>
            
            
        </div>
        <!-- end row -->
        <?php include('../include/footer.php');?>
        
        <script>
            $(function(){
                $("body").addClass("noselect");
                $("body").on("contextmenu",function(e){return false;});
            })


            function block_sub(id , action){
                $.ajax({
                    type: "POST",
                    url:  "action.php",
                    data: {'block':action, 'id':id, 'action':'block'},
                    success: function (response) {
                        console.log(response);
                        var ret = JSON.parse(response);
                        if(ret.status == 1){
                            window.location.reload();
                        }else{}
                        Swal.fire({
                            title: 'Block Successfully!',
                            icon: 'success',
                            draggable: true,
                            allowOutsideClick:false
                        });
                    }
                })
            }

            $('#addbatch-submit').submit(function(e){
                e.preventDefault();
                var data = $(this).serializeArray();
                data.push({name: 'action',value: 'batchadd'});
                console.log(data);
                
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        var ret = JSON.parse(response);
                        
                        Swal.fire({
                            title: ret.msg,
                            icon: ret.icon,
                            draggable: true,
                        });
                        if(ret.status == 1){
                            setTimeout(() => {
                                window.location.reload();
                                $('#name').focus();
                            }, 2000);
                        }else{}
                        
                    }
                })
            })

        </script>
        
    <script src="../assets/js/custom.js"></script>
    </body>
</html>