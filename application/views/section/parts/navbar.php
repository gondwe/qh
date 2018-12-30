<?php $_SESSION["user_id"] || beefSecurity(); ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('assets/index2.html" class="logo')?>">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">QH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
        <?php $this->load->view('section/parts/messages')?>
        <!-- Notifications: style can be found in dropdown.less -->
        
        <?php $this->load->view('section/parts/notifications')?>
        
          <!-- Tasks: style can be found in dropdown.less -->

          <?php $this->load->view('section/parts/tasks')?>
          
          <!-- User Account: style can be found in dropdown.less -->
            <?php $this->load->view('section/parts/profile')?>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>