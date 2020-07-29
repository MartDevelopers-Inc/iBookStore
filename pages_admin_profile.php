<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
    require_once('partials/_head.php');
?>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php require_once('partials/_nav.php');?>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="pages_admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php
            require_once('partials/_sidenav.php');
            
            $login_id = $_SESSION['login_id'];
            $ret="SELECT * FROM `iBookStore_Login` WHERE login_id =? "; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i', $login_id);
            $stmt->execute();
            $res=$stmt->get_result();
            while($logged_user = $res->fetch_object())
            {
        ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-spacing">

                    <!-- Content -->
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="text-center user-info">
                                    <img src="assets/img/admin.jpg" alt="avatar">
                                    <p class=""><?php echo $logged_user->login_user_name;?></p>
                                    <p><?php echo $logged_user->login_user_email;?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                        <div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Update Profile</h3>
                                <form method="post">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Email" value="<?php echo $logged_user->login_user_email;?>">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Username" value="<?php echo $logged_user->login_user_name;?>">
                                        </div>
                                    </div>
                                    <input type="submit" name="updateProfile" value="Update Profile" class="btn btn-primary">
                                </form>
                                <hr> 
                            </div>
                        </div>
                        <div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Change Password</h3>
                                <form method="post">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                                        </div>
                                        <div class="col">
                                            <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="col">
                                            <input type="password"  name="confirm_password" class="form-control" placeholder="COnfirm New Password">
                                        </div>
                                    </div>
                                    <input type="submit" name="changePassword" value="Change Password" class="btn btn-danger">
                                </form>
                                <hr> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_footer.php');?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <?php require_once('partials/_scripts.php'); }?>
</body>

</html>