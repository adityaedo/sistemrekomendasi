<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Wisata
    </h1>
  </section>
  <?php echo $this->session->flashdata('not'); ?>

  <section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Wisata</i></h3>
        <div class="action-buttons">
          <a href="<?php echo site_url('crud/tambah'); ?>" class="btn btn-success btn-sm">Tambah Wisata</a>
        </div>
        <div class="action-buttons">

        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th>#</th>
            <th>Nama Wisata</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Lokasi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Action</th>
          </tr>
          <?php $no = 1;
          foreach ($data_wisata as $wisata) { ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $wisata->nama_wisata; ?></td>
              <td><i><?= $wisata->Nama_kategori; ?></i></td>
              <td><?= $wisata->deskripsi; ?></td>
              <td><?= $wisata->lokasi; ?></td>
              <td><?= $wisata->Harga; ?></td>
              <td><img width="50" src="<?= base_url('assets/images/' . $wisata->gambar); ?>"></td>
              <td>
               
                <a href="<?php echo site_url('crud/edit/' . $wisata->id_wisata); ?>" class="btn btn-sm  btn-primary">Edit</a>
                <a href="<?php echo site_url('datawisata/delete/' . $wisata->id_wisata); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                </div>

            </tr>
          <?php $no++;
          } ?>
        </table>
      </div>

    </div>

  </section>
</div>