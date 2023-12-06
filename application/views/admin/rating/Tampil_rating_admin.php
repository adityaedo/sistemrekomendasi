<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Rating
    </h1>
  </section>

  <section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">
      <div class="box-header with-border">
        <h3 class="box-title">Rating Tempat </i></h3>
      </div>
      <?php echo $this->session->flashdata('not'); ?>
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th>#</th>
            <th>Nama User</th>
            <th>Nama Wisata</th>
            <th>Rating</th>
            <th>ulasan</th>
            <th>Waktu</th>
            <th>action</th>
          </tr>
          <?php $no = 1;
          foreach ($rating as $val) { ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $val->username; ?></td>
              <td><i><?= $val->nama_wisata; ?></i></td>
              <td><?= $val->rating; ?></td>
              <td><?= $val->ulasan; ?></td>
              <td><?= $val->waktu_rating; ?></td>
              <td>
                <a href="<?php echo site_url('rating/hapus/'.$val->id_rating)?>" 
                onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </table>
      </div>
     
    </div>

  </section>
</div>


