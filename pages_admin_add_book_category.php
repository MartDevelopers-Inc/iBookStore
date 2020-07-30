<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();
     if(isset($_POST['add_staff']))
    {
            $error = 0;
            if (isset($_POST['staff_name']) && !empty($_POST['staff_name'])) {
                $staff_name=mysqli_real_escape_string($mysqli,trim($_POST['staff_name']));
            }else{
                $error = 1;
                $err="Name Cannot Be Empty";
            }
            if (isset($_POST['staff_natid']) && !empty($_POST['staff_natid'])) {
                $staff_natid=mysqli_real_escape_string($mysqli,trim($_POST['staff_natid']));
            }else{
                $error = 1;
                $err="National ID Number Cannot Be empty";
            }
            if (isset($_POST['staff_phone']) && !empty($_POST['staff_phone'])) {
                $staff_phone=mysqli_real_escape_string($mysqli,trim($_POST['staff_phone']));
            }else{
                $error = 1;
                $err="Phone Number Cannot Be Empty";
            }
            if (isset($_POST['staff_email']) && !empty($_POST['staff_email'])) {
                $staff_email=mysqli_real_escape_string($mysqli,trim($_POST['staff_email']));
            }else{
                $error = 1;
                $err="Email Cannot Be Empty";
            }
            if (isset($_POST['staff_dob']) && !empty($_POST['staff_dob'])) {
                $staff_dob=mysqli_real_escape_string($mysqli,trim($_POST['staff_dob']));
            }else{
                $error = 1;
                $err="DOB Cannot Be Empty";
            }
                        
            if(!$error)
            {
                $sql="SELECT * FROM  iBookStore_HRM WHERE  staff_email='$staff_email' || staff_natid='$staff_natid' ";
                $res=mysqli_query($mysqli,$sql);
                if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($staff_natid == $row['staff_natid'])
                {
                    $err =  "National ID Number Exists";
                }
                else
                {
                    $err =  "Email Address Already Taken";
                }
            }
            else
            {
                $staff_name = $_POST['staff_name'];
                $staff_number = $_POST['staff_number'];
                $staff_natid = $_POST['staff_natid'];
                $staff_phone = $_POST['staff_phone'];
                $staff_email = $_POST['staff_email'];
                $staff_gender = $_POST['staff_gender'];
                $staff_dob = $_POST['staff_dob'];                
                $staff_passport = $_FILES["staff_passport"]["name"];
                move_uploaded_file($_FILES["staff_passport"]["tmp_name"],"assets/img/".$_FILES["staff_passport"]["name"]);
                $staff_bio = $_POST['staff_bio'];
                $staff_adr = $_POST['staff_adr'];               

                //Insert Captured information to a database table
                $postQuery="INSERT INTO iBookStore_HRM (staff_name, staff_number, staff_natid, staff_phone, staff_email, staff_gender, staff_dob, staff_passport, staff_bio, staff_adr) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $postStmt = $mysqli->prepare($postQuery);
                //bind paramaters
                $rc=$postStmt->bind_param('ssssssssss', $staff_name, $staff_number, $staff_natid, $staff_phone, $staff_email, $staff_gender, $staff_dob, $staff_passport, $staff_bio, $staff_adr);
                $postStmt->execute();
                //declare a varible which will be passed to alert function
                if($postStmt)
                {
                 $success = "Staff Added" && header("refresh:1; url=pages_admin_manage_staff.php");
                }
                else 
                {
                    $err = "Please Try Again Or Try Later";
                } 
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Books</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Books Category</span></li>
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
                                            <label for="inputEmail4">Book Category Name</label>
                                            <input type="name" name="cat_name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Book Category Number</label>
                                            <input type="text" name="cat_number" value="<?php echo $alpha;?>-<?php echo $beta;?>" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-12">
                                            <label for="inputCity">Book Category Description</label>
                                            <textarea type="text" rows="5" name="cat_des" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="add_category" class="btn btn-primary mt-3">Submit</button>
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
    <?php require_once('partials/_scripts.php');?>   
</body>

</html>