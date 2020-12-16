<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E-Kanban</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- jquery ui -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.css">
  <?php
  if ($menu == "kanban_board") {
    echo '<link rel="stylesheet" href="' . base_url() . 'assets/css/kanban-board.css">';
  }
  ?>
  <style>
    .no-js #loader {
      display: none;
    }

    .js #loader {
      display: block;
      position: absolute;
      left: 100px;
      top: 0;
    }

    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(<?php echo base_url() ?>assets/img/loading.svg?1) center no-repeat #80808080
    }
  </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="se-pre-con"></div>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>


      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url() ?>home/logout" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url() ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Kanban</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url() ?>assets/img/plane.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo ($this->session->user->nama) ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url() ?>?page=dashboard" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php
            if ($this->session->user->role == "assembly") {
            ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-inbox"></i>
                  <p>
                    Product
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url() ?>?page=create_product" class="nav-link">
                      <i class="far fa-plus-square nav-icon"></i>
                      <p>Order Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url() ?>?page=product_list" class="nav-link">
                      <i class="far fa-eye nav-icon"></i>
                      <p>Product List</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            } else if ($this->session->user->role == "store") {
            ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>?page=component_list" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Component List
                  </p>
                </a>
              </li>
            <?php
            }
            ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>?page=kanban_board" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Kanban Board
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>?page=report" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Report
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li> -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          require_once("v_$menu.php");
          ?>
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 Assembly Store</strong>
      All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/js/adminlte.js"></script>
  <?php
  if ($footer) {
    require_once("footer/$footer");
  }
  ?>

  <script>
    $(".se-pre-con").fadeOut("slow");
  </script>

</body>

</html>