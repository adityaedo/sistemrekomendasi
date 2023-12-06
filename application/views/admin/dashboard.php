 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Dashboard
       <small>Control panel</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="nav-item">
         <a href="<?php echo site_url('admin/logout'); ?>" class="nav-link">
           <p>
             Logout
           </p>
         </a>
       </li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <?php echo $this->session->flashdata('not'); ?>
     <div class="row">
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
           <div class="inner">
             <h3><?= $jmlwisata?></h3>
             <p><b>Data Wisata</b></p>
           </div>
           <div class="icon">
             <i class="fa fa-file"></i>
           </div>
           <a href="<?php echo site_url('datawisata')?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
           <div class="inner">
             <h3><?= $jmlrating;?><sup style="font-size: 20px">%</sup></h3>

             <p>Data Rating</p>
           </div>
           <div class="icon">
             <i class="fa fa-star"></i>
           </div>
           <a href="<?php echo site_url('rating')?>" class="small-box-footer">Rating<i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-yellow">
           <div class="inner">
             <h3><?= $jmlrek;?></h3>

             <p>Hasil Rating User</p>
           </div>
           <div class="icon">
             <i class="fa fa-user"></i>
           </div>
           <a href="<?php echo site_url('user'); ?>" class="small-box-footer">Lihar Data <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-red">
           <div class="inner">
             <h3><?= $jmluser;?></h3>

             <p>User</p>
           </div>
           <div class="icon">
             <i class="ion ion-pie-graph"></i>
           </div>
           <a href="<?php echo site_url('user')?>" class="small-box-footer">Lihat User Terdaftra<i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
     </div>



   </section>
   <!-- right col -->
 </div>
 <!-- /.row (main row) -->

 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->