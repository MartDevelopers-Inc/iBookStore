<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/authentication/form-2.js"></script>
<script src="assets/js/scrollspyNav.js"></script>
<script src="plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="plugins/sweetalerts/custom-sweetalert.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="assets/js/custom.js"></script>
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_1.js"></script>
<script type = "text/javascript" >
    //Prevent use of back arrow after locking screen
    var path = 'pages_admin_lock_screen.php'; 
    history.pushState(null, null, path + window.location.search);
    window.addEventListener('popstate', function (event) {
        history.pushState(null, null, path + window.location.search);
    });
</script>
