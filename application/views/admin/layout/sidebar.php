<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/logo1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Rekomendasi Wisata</p>
         
        </div>
      </div>
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">UTAMA</li>
        <li class="active treeview">
          <a href="<?php echo site_url('admin/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          <li class="treeview">
          <a href="<?php echo site_url('kategori')?>">
            <i class="fa fa-plus-square"></i>
            <span>Kategori Wisata</span>
            <span class="pull-right-container">
            </span>
          </a>
        <li>
        <li class="treeview">
          <a href="<?php echo site_url('datawisata/index')?>">
            <i class="fa fa-files-o"></i>
            <span>Data Wisata</span>
            <span class="pull-right-container">
            </span>
          </a>
        <li>
        <li class="treeview">
          <a href="<?php echo site_url('image')?>">
            <i class="fa fa-files-o"></i>
            <span>Foto</span>
            <span class="pull-right-container">
            </span>
          </a>
        <li>
        <li class="treeview">
          <a href="<?php echo site_url('rating')?>">
            <i class="fa fa-star"></i>
            <span>Rating User</span>
            <span class="pull-right-container">
            </span>
          </a>
        <li>
          <a href="<?php echo site_url('rekomendasi')?>">
            <i class="fa fa-th"></i> <span>Hasil Rating</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('User');?>">
            <i class="fa fa-user"></i>
            <span>User</span>
          </a>
        <li><a href="<?php echo site_url('admin/logout')?>"><i class="fa fa-sign-out "></i> <span>Keluar</span></a></li>
    </section>
    <!-- /.sidebar -->
  </aside>