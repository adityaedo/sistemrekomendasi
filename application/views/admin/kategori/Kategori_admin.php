<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2 class="page-header">Kategori</h2>
        <?php echo $this->session->flashdata('not'); ?>
        <div class="row">
            <div class="col-md-6">
              
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kategori</h3>
                    </div>
                    <div class="box-body">
                        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('Kategori'); ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input type="text" name="kategori" class="form-control" placeholder="Masukan Kategori">
                                </div>
                                <?= form_error('ketegori', '<small class="text-danger pl-1">', '</small>'); ?>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Kategori</label>
                                    <input type="file" name="gambar" id="exampleInputFile">
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori Tersedia</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Kategori</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                            <?php $no =1;foreach($kategori as $val) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $val->Nama_kategori;?></td>
                                <td><img src="<?php echo base_url('assets/images/'.$val->Gambar);?>" width="100" height="80" alt=""></td>
                                <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('kategori/hapus/'.$val->id_kategori) ?>">Hapus</a></td>
                            </tr>
                            <?php $no++; }?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
</section>