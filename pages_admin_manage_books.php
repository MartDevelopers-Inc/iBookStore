<?php
    session_start();
    include('config/config.php');
    include('config/checklogin.php');
    check_login();

    if(isset($_GET['delete']))
    {
          $id=intval($_GET['delete']);
          $adn="DELETE FROM  iBookStore_books  WHERE  b_id = ?";
          $stmt= $mysqli->prepare($adn);
          $stmt->bind_param('i',$id);
          $stmt->execute();
          $stmt->close();	 
         if($stmt)
         {
             $success = "Deleted" && header("refresh:1; url=pages_admin_manage_books.php");
         }
         else
         {
             $err = "Try Again Later";
         }
      }
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Books</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Manage Books</span></li>
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
                                            <th>Title</th>
                                            <th>ISBN</th>
                                            <th>Book Category</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Copies Available</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
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
                                                <td><?php echo $books->b_count;?></td>
                                                <td><?php echo date("d M Y - g:i",strtotime($books->created_at));?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-dark btn-sm">Manage Book</button>
                                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                        <a class="text-warning dropdown-item" href="pages_admin_update_book.php?update=<?php echo $books->b_id;?> ">Update Book</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="text-danger dropdown-item" href="pages_admin_manage_books.php?delete=<?php echo $books->b_id;?>">Delete Book</a>
                                                        </div>
                                                    </div>
                                                </td>
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