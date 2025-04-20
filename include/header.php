<?php 
$id = $db->user_id;
$user = $db-> getUserdetailById($id);
?>
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="<?=$url;?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/assets/images/favicon.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="<?=$url;?>assets/images/favicon.png" alt="" height="20">
                    </span>
                </a>
                <a href="<?=$url;?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/assets/images/favicon.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/favicon.png" alt="" height="30">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="">
                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?=$user['pname']?></span>
                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a>
                <a class="dropdown-item" href="?logout"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
            </div>
        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                <?php $profile= $user['profile'] == '' ? '/brands/mail_chimp.png':'/brands/mail_chimp.png' ;?>
                <img class="rounded-circle header-profile-user" src="<?=$url;?>assets/images<?=$profile;?>" />
            </button>
        </div>
    </div>
</header>
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?=$url;?>assets/images/favicon.jpg" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?=$url;?>assets/images/logo.png" alt="" height="20"> 
            </span>
        </a>
    </div>
    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div data-simplebar class="sidebar-menu-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                            <li><a href="../dashboard/" >Dashboard </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-user-circle"></i>
                        <span>Bills</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="../billing/">Show all Bills</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
    <!-- Left Sidebar End -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">