<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">
      <div class="box-header with-border">
        <h3 class="box-title">Rekomendasi User </i></h3>
      </div>
      <?php echo $this->session->flashdata('not'); ?>
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 15px">No</th>
            <th>Usernama</th>
            <th>Password</th>
            <th>Email</th>
            <th>Terdaftar</th>
          </tr>
          <?php $no = 1;
          foreach ($user as $val) { ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $val->username; ?></td>
              <td><?php echo $val->password; ?></td>
              <td><?php echo $val->email; ?></td>
              <td><?php echo $val->Date_created; ?></td>
              <td>
                <div class="btn-group">
                  <!-- tambah button edit -->
                  <a href="<?php echo site_url('user/delete/' . $val->id_user); ?>" onclick="return confirm('Yakin akan hapus data ini?')" class="btn btn-danger">Hapus</a>
                </div>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </table>
      </div>
    </div>
  </section>
</div>