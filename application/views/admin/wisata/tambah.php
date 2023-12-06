 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>Tambah Data Wisata
       <small>Kab.Bantul</small>
     </h1>
   </section>
   <?php echo $this->session->flashdata('not'); ?>
   <section class="content">
     <div class="row">
       <!-- left column -->
       <div class="col-md-6">
         <!-- general form elements -->
         <div class="box box-primary">
           <div class="box-header with-border">
             <h3 class="box-title">Masukkan Data</h3>
           </div>
         
           <form enctype="multipart/form-data" action="<?php echo site_url('crud/tambah'); ?>" method="post">
             <div class="box-body">
               <div class="form-group">
                 <label for="nama_wisata">Nama Wisata</label>
                 <input type="text" class="form-control" name="nama_wisata" placeholder="Masukkan Nama Wisata">
                 <?= form_error('nama_wisata', '<small class="text-danger pl-1">', '</small>'); ?>
               </div>
               <div class="form-group">
                 <label for="deskripsi">Deskripsi</label>
                 <textarea type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" rows="4"></textarea>
                 <?= form_error('deskripsi', '<small class="text-danger pl-1">', '</small>'); ?>
               </div>
               <div class="form-group">
                 <div class="form-group">
                   <label>Kategori</label>
                   <select class="form-control" name="kategori">
                     <?php
                      foreach ($kategori as $val) : ?>
                       <option value="<?php echo $val->id_kategori ?>">
                         <?php echo $val->Nama_kategori; ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
               </div>
               <div class="form-group">
                 <label for="lokasi">Lokasi</label>
                 <input type="text" class="form-control" name="lokasi" placeholder="Masukkan Lokasi">
                 <?= form_error('lokasi', '<small class="text-danger pl-1">', '</small>'); ?>
               </div>
               <div class="form-group">
                 <label for="lokasi">Harga Tiket</label>
                 <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga">
                 <?= form_error('harga', '<small class="text-danger pl-1">', '</small>'); ?>
               </div>
               <div class="form-group">
                 <label for="gambar">Masukkan gambar</label>
                 <input type="file" name="gambar">
               </div>
             </div>
             <!-- /.box-body -->

             <div class="box-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a class="btn btn-danger" href="<?php echo site_url('datawisata'); ?>" role="button">Kembali</a>
             </div>
           </form>
         </div>
       </div>
     </div>
   </section>
 </div>
  
