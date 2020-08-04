<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

    require_once('partials/_head.php');
?>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <?php require_once('partials/_staffNav.php');?>
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
                                <li class="breadcrumb-item"><a href="pages_staff_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Inventory</span></li>
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
        <?php require_once('partials/_staffSideNav.php');?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <h2>Book Records</h2>
                            <div class="table-responsive mb-4 mt-4">
                                <table class="multi-table table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>ISBN</th>
                                            <th>Book Category</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Copies Available</th>
                                            <th>Price</th>
                                            <th>Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ret="SELECT * FROM  iBookStore_books"; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute();
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($books=$res->fetch_object())
                                            {
                                        ?>
                                            <tr>
                                                <td><?php echo $books->b_title;?></td>
                                                <td><?php echo $books->b_isbn;?></td>
                                                <td><?php echo $books->cat_name;?></td>
                                                <td><?php echo $books->b_author;?></td>
                                                <td><?php echo $books->b_publisher;?></td>
                                                <td><?php echo $books->b_count;?> Copies</td>
                                                <td>Ksh <?php echo $books->b_price;?></td>
                                                <td><span class="badge outline-badge-primary"><?php echo date("d M Y",strtotime($books->created_at));?></span></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <hr>
                                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                                    <thead>
                                    <h2>Book Sales Records</h2>
                                        <tr>
                                            <th>Receipt Number</th>
                                            <th>Book ISBN</th>
                                            <th>Book Title</th>
                                            <th>Sell Price</th>
                                            <th>Copies Sold</th>
                                            <th>Date Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ret="SELECT * FROM  iBookStore_Sales"; 
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute();
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($sales=$res->fetch_object())
                                            {
                                        ?>
                                            <tr>
                                                <td><?php echo $sales->s_code;?></td>
                                                <td><?php echo $sales->b_isbn;?></td>
                                                <td><?php echo $sales->b_title;?></td>
                                                <td>Ksh <?php echo $sales->s_amt;?></td>
                                                <td><?php echo $sales->s_copies;?> Copies</td>
                                                <td><span class="badge outline-badge-primary"><?php echo date("d M Y g:i",strtotime($sales->created_at));?></span></td>
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
    <!-- END MAIN CONTAINER -->
    <?php require_once('partials/_scripts.php');?>
</body>
</html>