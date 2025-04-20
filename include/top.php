<!-- start page title -->
<?php $bolin = isset($_GET['sub_t'])? $_GET['sub_t']: '';?>

<div class="row">
    
        <div class="card-header border-0  pt-3 pb-3  col-md-12">
            <div class="text-uppercase col-md-3" style="
                padding: 6px;
                margin: 0px;
                background-color: white;
                text-align: center;
                font-family: none;
                letter-spacing: 3px;
                border-radius: 6px;
                color: #495057;">
        Account | Admin
            </div>
            
            <div class="page-title-right col-md-2" style="
                float: right;
                padding: 6px;
                margin: 0px;
                text-align: center;
                text-transform: uppercase;">
                <ol class="breadcrumb m-0" >
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active"><?=$db->title; ?></li>
                </ol>
            </div>
            <div 
        class="col-md-2 m-2" style="
                float: left;">
                <h5 class="text-uppercase font-weight-bold" id='tabhead'><?=$title;?></h5>
        </div>
        </div>
  
</div>

<!-- end page title -->