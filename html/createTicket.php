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

  <title>Document</title>
</head>
<body class = "layout-fixed layout-navbar-fixed" style="background-color:#F4F6F9;">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
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
                <a href="\Helpdesk\html\Client\ViewOpenTickets.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Open Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\Helpdesk\html\Client\ViewAllTickets.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tickets</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="\Helpdesk\html\Client\CreateTicket.php" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>Create Ticket</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside> 
    <!-- Content Section -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2 text-center">
            <h1>Create Ticket</h1>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Create Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <form action="Client/CreateTicket.php" method="post">
    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Enter Required information</h3>

            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="ticket_title" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="description">description</label>
                <textarea id="description" class="form-control" name="ticket_description" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <label for="hardware">Hardware Type</label>
                <input type="text" id="hardware" name="hardware_type" class="form-control" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
          <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
              <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Create new Project" class="btn btn-success float-right">
            </div>
          </div>
    </section>
   </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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