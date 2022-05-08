<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <title>Document</title>
</head>

<body class="layout-fixed layout-navbar-fixed" style="background-color:#F4F6F9;">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboardemployee.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 mr-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../images/chip.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CHIP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="\Helpdesk\html\Employee\ViewOpenTickets.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Open Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\Helpdesk\html\Employee\ViewAllTickets.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tickets</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="approveAccount.php" class="nav-link">
              <i class="nav-icon fas fa-thumbs-up"></i>
              <p>Approve Accounts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="generateAccount.php" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>Generate Account</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Section -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboardemployee.php">Home</a></li>
              <li class="breadcrumb-item active">All Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tickets</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 10%">
                  Name
                </th>
                <th style="width: 10%">
                  Email
                </th>

                <th style="width: 12%" class="text-center">
                  Company
                </th>
                <th style="width: 20%">
                </th>
              </tr>
            </thead>
            <tbody>


                         <?php
                            $count=Count($_SESSION['client_info']);
                            $i=0;

                           while($i<$count){
                            ?>
              <tr>
                <td>
                  <?php

                          echo  $_SESSION['client_info'][$i];
                           ?>
                </td>
                <td>
                  <a>
                    <?php

                          echo  $_SESSION['client_info'][$i+1];
                           ?>
                  </a>
                  <br />
                </td>
                <td class="project-state">
                  <?php

                          echo  $_SESSION['client_info'][$i+2];
                           ?>
                </td>

                <td class="project-actions text-center">
                  <form action="Employee/Approve.php" method="post">
                  <button type="submit" class="btn btn-success btn-sm mr-1" value = echo <?php echo  $_SESSION['client_info'][$i]; ?>>
                    <i class="fas fa-thumbs-up">
                    </i>
                    Approve
                  </button>
                  </form>
                  <form action="Employee/Deny.php" method="post">
                  <button type="submit" class="btn btn-danger btn-sm"  value= echo <?php echo  $_SESSION['client_info'][$i]; ?>>
                    <i class="fas fa-thumbs-down">
                    </i>
                    Disapprove
                  </button>
                  </form>


                  <?php
                                       $i=$i+3;}
                                    ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
  </div>
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>