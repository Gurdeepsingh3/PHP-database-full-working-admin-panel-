 <div  class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">


    <!--  App Topstrip -->
     

    <!-- Sidebar Start -->
    <?php
    include ('include/sidebar.php')
    ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
      <div class="body-wrapper">
    <?php
    include ('include/header.php')
    ?>


     <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <?php
          include("include/body.php")
          ?>
 
          
          <?php
          include("include/footer.php")
          ?>
        </div>
      </div>
    </div>
      </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
