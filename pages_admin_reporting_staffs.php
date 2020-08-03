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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Advanced Reporting</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Staffs </span></li>
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

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>ID No</th>
                                            <th>DOB</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>Allowed Login</th>
                                            <th>Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //Fetch all Staff In created_at.Desc
                                            $ret="SELECT * FROM  iBookStore_HRM"; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute();
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($staff=$res->fetch_object())
                                            {
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="pages_admin_view_staff.php?view=<?php echo $staff->staff_id;?>">
                                                        <span class="badge outline-badge-success">
                                                            <?php echo $staff->staff_number;?>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td><?php echo $staff->staff_name;?></td>
                                                <td><?php echo $staff->staff_natid;?></td>
                                                <td><?php echo $staff->staff_dob;?></td>
                                                <td><?php echo $staff->staff_email;?></td>
                                                <td><?php echo $staff->staff_phone;?></td>
                                                <td><?php echo $staff->staff_gender;?></td>
                                                <td>
                                                    <?php
                                                        //Echo .success or .danger if user is allowed login
                                                        if($staff->allow_login == '1')
                                                        {
                                                            echo 
                                                            "
                                                                <span class='badge outline-badge-success'>
                                                                    Yes
                                                                </span>
                                                            ";
                                                        }
                                                        else
                                                        {
                                                            echo 
                                                            "
                                                                <span class='badge outline-badge-danger'>
                                                                    No
                                                                </span>
                                                            ";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo date('d M Y', strtotime($staff->created_at));?></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php require_once('partials/_footer.php');?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <?php require_once('partials/_scripts.php');?>


</html>