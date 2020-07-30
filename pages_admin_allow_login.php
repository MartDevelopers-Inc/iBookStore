<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
     if(isset($_POST['allow_login']))
    {
        if ( empty($_POST["login_user_name"]) || empty($_POST["login_user_email"]) || empty($_POST['login_user_password']) ) 
        {
            $err="Blank Values Not Accepted😬!";
        }
        else
        { 
            
            $login_user_name = $_POST['login_user_name'];
            $login_user_email = $_POST['login_user_email'];
            $login_user_password = sha1(md5($_POST['login_user_password']));
            $allow_login = $_GET['allow_login'];       
            $id = $_GET['id']; 
            $login_user_permission = $_POST['login_user_permission'];

            //Insert Captured information to a database table
            $allowLogin = "UPDATE iBookStore_HRM  SET allow_login =? WHERE staff_id =?";
            $postQuery="INSERT INTO iBookStore_Login (login_user_permission, login_user_name, login_user_email, login_user_password) VALUES (?,?,?,?)";
            $postStmt = $mysqli->prepare($postQuery);
            $allowLoginStmt = $mysqli->prepare($allowLogin);
            //bind paramaters
            $rc=$postStmt->bind_param('ssss', $login_user_permission, $login_user_name, $login_user_email, $login_user_password);
            $rc = $allowLoginStmt->bind_param('si', $allow_login, $id);
            $postStmt->execute();
            $allowLoginStmt->execute();
            //declare a varible which will be passed to alert function
            if($postStmt && $allowLogin)
            {
                $success = "Allow Login" && header("refresh:1; url=pages_admin_login_permissions.php");
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">HRM</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Allow Login</span></li>
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
            $email = $_GET['email'];
            $ret="SELECT * FROM  iBookStore_HRM WHERE staff_email = '$email' "; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->execute();
            $res=$stmt->get_result();
            $cnt=1;
            while($staff=$res->fetch_object())
            {
            require_once('partials/_sidenav.php');
        ?>
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
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Login Username</label>
                                            <input type="name" name="login_user_name" value="<?php echo $staff->staff_name;?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword4">Login Email</label>
                                            <input type="email" name="login_user_email" value="<?php echo $staff->staff_email;?>" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Staff Password</label>
                                            <input type="password" name="login_user_password" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Give Administrative Permissions?</label>
                                            <select name="login_user_permission" class="form-control  basic">
                                                <option value="0" selected="selected">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" name="allow_login" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_footer.php'); }?>
        </div>
        <!--  END CONTENT PART  -->
    </div>
    <?php require_once('partials/_scripts.php');?>   
</body>

</html>