<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <title>Generate Account</title>
</head>
<body class = "layout-fixed layout-navbar-fixed" style="background-color:#F4F6F9;">

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
                <a href="\Helpdesk\html\Employee\ViewOpenTickets.php"class="nav-link">
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
  <div class="content-wrapper mt-5 ">
    
    <h1 class="ml-4">Generate Account</h1>

      <!-- form start -->
      <form action="Employee/GenerateAccount.php" method="post">

      <div class="card card-primary ml-5 mr-5">
        <div class="card-header">
          <h3 class="card-title">Generate Account Form</h3>
        </div>
        <!-- /.card-header -->

        
          
          <div class="card-body">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" id="name" name = "client_name" placeholder="Enter full name here">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name = "client_email" placeholder="Enter email">
              
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name = "client_password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" name = "client_phone_number" placeholder="Enter number">
            </div>
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company" name = "client_company_name" placeholder="Enter company name">
            </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
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