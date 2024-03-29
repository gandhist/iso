<?php if(!Auth::user()): ?>
<!-- jika belum ada session login -->
<script type="text/javascript">
    window.location.replace("<?php echo e(route('login')); ?>");
</script>
<?php else: ?>
<!-- jika sudah login -->
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo e(url('/dashboard')); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">P<sub>3</sub>SM</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>P<sub>3</sub>SM</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo e(asset('AdminLTE-2.3.11/dist/img/avatar.png')); ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo e(\Auth::user()->name); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- Menu Body -->
            <!-- Menu Footer-->
            <li class="user-footer">
              <div>
                <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                <form method="post" action="<?php echo e(url('logout')); ?>" style="display: inline">
                  <?php echo e(csrf_field()); ?>

                  <button class="btn btn-default" type="submit">Sign Out</button>
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo e(asset('AdminLTE-2.3.11/dist/img/avatar.png')); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo e(\Auth::user()->name); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      

      <li class="treeview">
        <a href="<?php echo e(url('/dashboard')); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <?php if(Auth::user()->role_id==1 || Auth::user()->role_id==5 ): ?>

      
      <?php endif; ?>
      <?php if(Auth::user()->role_id==1 ): ?>

      <li class="treeview">
        <a href="<?php echo e(url('isos')); ?>">
          <i class="fa fa-certificate"></i> <span>ISO</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo e(url('laporan')); ?>">
          <i class="fa fa-bookmark-o"></i> <span>Laporan</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo e(url('master/scope')); ?>">
          <i class="fa fa-database"></i> <span>Scopes</span>
        </a>
      </li>
      <?php endif; ?>

      <?php if(Auth::user()->role_id==1): ?>

      <li class="treeview <?php echo e(Request::is('user*') ? 'active' : ''); ?>">
        <a href="#">
          <i class="fa fa-users"></i> <span>Kelola Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo e(Request::is('users') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('users')); ?>">
              <i class="fa fa-user"></i> <span>Admin</span>
            </a>
          </li>
          <li class="<?php echo e(Request::is('user_role') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('user_role')); ?>">
              <i class="fa fa-user"></i> <span>Role</span>
            </a>
          </li>
        </ul>
      </li>
      <?php endif; ?>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php endif; ?>
