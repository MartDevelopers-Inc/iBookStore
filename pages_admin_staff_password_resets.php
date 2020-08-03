<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

     if(isset($_POST['reset_password']))
    {
        if ( empty($_POST["reset_code"])) 
        {
            $err="Blank Values Not Accepted😬!";
        }
        else
        {     
                $email = $_POST['email'];
                $reset_code = sha1(md5($_POST['reset_code']));

                $reset_status = $_GET['reset_status'];
                $id = $_GET['id'];
                
                //Insert Captured information to a database table
                $postQuery="UPDATE iBookStore_Login SET login_user_password =? WHERE  login_user_email =?";
                $updateQry="UPDATE iBookStore_Password_Resets SET reset_status =? WHERE reset_id = ?";
                $postStmt = $mysqli->prepare($postQuery);
                $updateStmt = $mysqli->prepare($updateQry);
                //bind paramaters
                $rc=$postStmt->bind_param('ss', $reset_code, $email);
                $rc=$updateStmt->bind_param('si', $reset_status, $id);
                $postStmt->execute();
                $updateStmt->execute();
                //declare a varible which will be passed to alert function
                if($postStmt && $updateStmt)
                {
                    $success = "Password Changed" && header("refresh:1; url=pages_admin_password_resets.php");
                }
                else 
                {
                    $err = "Please Try Again Or Try Later";
                } 
            }
        }
            
    require_once('partials/_head.php');
    require_once('partials/_codeGen.php');
?>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->


    <!--  BEGIN NAVBAR  -->
    <?php
        require_once('partials/_nav.php');
        $id = $_GET['id'];
        $ret="SELECT * FROM  iBookStore_Password_Resets WHERE reset_id ='$id' "; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute();
        $res=$stmt->get_result();
        while($resets=$res->fetch_object())
        {
    ?>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Password Resets</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span><?php echo $resets->reset_email;?></span></li>
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
        <?php require_once('partials/_sidenav.php');?>
        <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class=" widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Fill All Required Fields</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <form method="post" enctype="multipart/form-data" >
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email</label>
                                            <input type="name" name="email" value="<?php echo $resets->reset_email;?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">New Password</label>
                                            <input type="text" name="reset_code" value="<?php echo $resets->reset_code;?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" name="reset_password" class="btn btn-primary mt-3">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_footer.php');?>
        </div>
        <!--  END CONTENT PART  -->
    </div>
    <?php require_once('partials/_scripts.php'); }?>   

</body>

</html>