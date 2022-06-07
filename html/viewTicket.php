<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 mr-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="../images/chip.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CHIP</span>
  </a>

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
            </li
             
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside> 

  <!-- /.sidebar -->
</aside> 
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ticket Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Ticket Detail</li>
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
          <h3 class="card-title">
            

                         <?php
                          echo  $_SESSION['ticket_title'][0];
                           ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Id Number</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php
                          echo  $_SESSION['ticket_id'];
                           ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div >
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"></span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Status</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php
                          echo  $_SESSION['ticket_status'][0];
                           ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Activity</h4>

                            <?php
                            $count=Count($_SESSION['users']);
                            $i=0;

                           while($i<$count){
                            ?>

                    <div class="post">
                      <div class="user-block">
                        <span class="username">

                       

                          <a href="#"><?php

                          echo  $_SESSION['users'][$i];
                           ?></a>
                        </span>
                        <span class="description"></span>
                      </div>
                      <!-- /.user-block -->



                      <p>
                        <?php

                          echo  $_SESSION['replies'][$i];
                           ?>
                      </p>

                      
                    </div>
                                <?php
                                       $i=$i+1;}
                                    ?>
                            

                    <!-- reply form -->
                    <form action="Client/ReplyTicket.php" method="post">
                        <div class="form-group ">
                          <label for="reply">Reply:</label>
                          <textarea id="reply" name="ticket_reply" class="form-control" placeholder="Enter ..."></textarea>  
                          <button type="submit" class="btn btn-primary mt-2 float-right ">Submit</button>
                        </div>
                      </form>
                  <!-- end of reply form -->
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> <?php
                          echo  $_SESSION['client_name'];
                           ?></h3>
                             <form method="post" action="Client/pdf.php">      
              <button  type="submit" class="btn btn-primary mt-2 float-right "> Export</button>
            </form>
              <p class="text-muted"></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block"><?php
                          echo  $_SESSION['client_company_name'];
                           ?></b>
                </p>
                <p class="text-sm">Client
                  <b class="d-block"><?php
                          echo  $_SESSION['client_name'];
                           ?></b>
                </p>
                <form method="post" action="Client/CancelTicket.php">
                  <button type="submit" name= "ticket_title" value="Canceled"
                  class="btn btn-success mt-2 float-right "> Cancel</button>
                           </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <script>



function cancel(){
document.getElementById("form").action = "Client/CancelTicket.php";
}
</script> -->
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