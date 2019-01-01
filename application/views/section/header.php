<?php $_SESSION["user_id"] || beefSecurity(); ?>
<?php $data = $this->db->where('id',$this->session->user_id)->get('users')->row(); ?>

<!DOCTYPE html>
<html>
<head> <?php $this->load->view('section/parts/meta')?> </head>
<body class="hold-transition skin-green-light sidebar-mini sidebar-collapse">

<!-- Site wrapper -->
<div class="wrapper">
<?php $this->load->view('section/parts/navbar',['data'=>$data])?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image')?>">
        </div>
        <div class="pull-left info">
          <p><?=ucwords($data->first_name.' '.$data->last_name)?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?=base_url('/')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <!-- <ul class="treeview-menu">
            <li><a href="<?=base_url('assets/index.html')?>i>
            <li><a href="<?=base_url('assets/index2.html')?>i>
          </ul> -->
        </li>
        <li class="treeview">
          <a href="<?=base_url('patient/admission')?>">
            <i class="fa fa-files-o"></i>
            <span>Admission</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('patient/admission/list')?>"><i class="fa fa-circle-o"></i> Admission List</a></li>
            <li><a href="<?=base_url('patient/discharged')?>"><i class="fa fa-circle-o"></i> Discharged</a></li>
            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li> -->
            <!-- <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li> -->
          </ul>
        </li>
        <!-- <li>
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Donate</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">New</small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Appointments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('booking/consultation')?>"><i class="fa fa-circle-o"></i> Consultation</a></li>
            <li><a href="<?=base_url('booking/theatre')?>"><i class="fa fa-circle-o"></i> Theatre</a></li>
            <!-- <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Pharmacy</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('pharmacy/products')?>"><i class="fa fa-circle-o"></i> Products</a></li>
            <li><a href="<?=base_url('pharmacy/reorderlist')?>"><i class="fa fa-circle-o"></i> ReOrder List</a></li>
            <!-- <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Doctor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('doctor/diagnosis')?>"><i class="fa fa-circle-o"></i> Diagnosis</a></li>
            <li><a href="<?=base_url('doctor/prescription')?>"><i class="fa fa-circle-o"></i> Prescription</a></li>
            <li><a href="<?=base_url('doctor/referal')?>"><i class="fa fa-circle-o"></i> Referal</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Laboratory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('lab/tests')?>"><i class="fa fa-circle-o"></i> Tests</a></li>
            <li><a href="<?=base_url('lab/results')?>"><i class="fa fa-circle-o"></i> Results</a></li>
          </ul>
        </li>
        <!-- <li>
          <a href="../calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li> -->
        <!-- <li>
          <a href="../mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li> -->
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>Facility</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('facility/rooms')?>"><i class="fa fa-circle-o"></i> Rooms</a></li>
            <li><a href="<?=base_url('facility/beds')?>"><i class="fa fa-circle-o"></i> Beds</a></li>
            <!-- <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li> -->
            <!-- <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar text-green"><span class="fa fa-dollar"></span></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Invoices</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Cashier
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> POS</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Receipts
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Reprint</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Void</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Patient Account</a></li>
          </ul>
        </li>
        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
        <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
  
  <!-- jQuery 3 -->
  <script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Select 2 -->
<script src="<?=base_url('assets/bower_components/select2/dist/js/select2.full.js')?>"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding:15px;">
  <?php //$this->load->view('section/parts/breadcrumbs')?>
  
<!-- ./wrapper -->
