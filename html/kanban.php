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
                <a href="listViewOpenEmployee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Open Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="listViewAllEmployee.php" class="nav-link">
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

      <!-- card section -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper kanban">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1>Kanban Board</h1>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="dashboardemployee.php">Home</a></li>
                  <li class="breadcrumb-item active">Kanban Board</li>
                </ol>
              </div>
            </div>
          </div>
        </section>
    
        <form method="post" action="Employee/ViewSpecificTicket.php">
        <section class="content pb-3">
          <div class="container-fluid h-100">

            <div class="card card-row card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Open
                </h3>
                 </div>
                
              <?php
                           if($_SESSION['open_ticket']!=0){
                            $count=Count($_SESSION['open_ticket']);
                            $i=0;

                           while($i<$count){
                            ?>

              
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">
                      <?php

                        echo  $_SESSION['open_ticket'][$i];
                       ?> 
                       </h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">
                      <?php

                        echo  $_SESSION['open_ticket'][$i+1];
                        ?>

                      </a>
                      <button class="btn btn-tool" name="ticket_title" value= "<?php echo $_SESSION['open_ticket'][$i+1] ; ?>">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                </div>
              
              <?php
                                       $i=$i+2;}}
                                    ?>
            </div>
            <div class="card card-row card-default">
              <div class="card-header bg-success">
                <h3 class="card-title">
                  Closed
                </h3>
                </div>
             
              <?php          if($_SESSION['close_ticket']!=0){
                            $count=Count($_SESSION['close_ticket']);
                            $i=0;

                           while($i<$count){
                            ?>
            
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">
                    <?php

                      echo  $_SESSION['close_ticket'][$i];
                      ?>  
                    </h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">
                        <?php

                        echo  $_SESSION['close_ticket'][$i+1];
                        ?> 

                      </a>
                      <button class="btn btn-tool" name="ticket_title" value= "<?php echo $_SESSION['close_ticket'][$i+1] ; ?>">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                </div>
            
              <?php
                                       $i=$i+2;}}
                                    ?>
            </div>
            <div class="card card-row card-danger">
              <div class="card-header">
                <h3 class="card-title">
                  Blocked
                </h3>
              </div>
            
                
              <?php
                             if($_SESSION['block_ticket']!=0){
                            $count=Count($_SESSION['block_ticket']);
                            $i=0;

                           while($i<$count){
                            ?>
              
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title">
                    <?php

                        echo  $_SESSION['block_ticket'][$i];
                        ?> 
                    </h5>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-link">
                      <?php

                          echo  $_SESSION['block_ticket'][$i+1];
                          ?> 
                      </a>
                      <button class="btn btn-tool" name="ticket_title" value= "<?php echo $_SESSION['block_ticket'][$i+1] ; ?>">
                        <i class="fas fa-pen"></i>
                      </a>
                    </div>
                  </div>
                </div>
             
              <?php
                                       $i=$i+2;}}
                                    ?>
            </div>
          </div>
        </section>
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