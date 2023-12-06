<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rekomendasi
        </h1>
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
                        <th>#</th>
                        <th>Nama User</th>
                        <th>Nama Wisata</th>
                        <th>Skor</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($rekomendasi as $val) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><i><?= $val->username; ?></i></td>
                            <td><i><?= $val->nama_wisata; ?></i></td>
                            <td><?= $val->skor_rekomendasi; ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </table>
            </div>

        </div>

    </section>
</div>