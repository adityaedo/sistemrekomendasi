<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Wisata
        </h1>
    </section>


    <section class="content">
        <!-- COLOR PALETTE -->
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Wisata</i></h3>
                <div class="action-buttons">
                    <?php echo $this->session->flashdata('not'); ?>
                </div>
                <div class="action-buttons">
                    <form role="form" method="post" action="<?php echo site_url('image/upload_gambar') ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Nama Wisata</label>
                                    <select class="form-control" name="id_wisata">
                                        <?php
                                        foreach ($wisata as $val) : ?>
                                            <option value="<?php echo $val->id_wisata ?>">
                                                <?php echo $val->nama_wisata; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="gambar[]" multiple id="exampleInputFile">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Wisata</i></h3>
                <div class="action-buttons">

                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Nama Wisata</th>
                        <th>foto</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($image as $val) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $val->nama_wisata; ?></td>
                            <td><img width="10%" src="<?= base_url('assets/images/' . $val->image); ?>"></td>
                            <td>
                                <a href="<?php echo site_url('image/delete/' . $val->id_image); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                        </tr>
                    <?php $no++;
                    } ?>
                </table>
            </div>
    </section>
</div>