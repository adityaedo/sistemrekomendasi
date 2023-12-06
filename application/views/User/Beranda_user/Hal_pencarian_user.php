<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Hasil Pencarian Anda..</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (empty($pencarian)) : ?>
                <div class="col-12">
                    <p class="text-center">Hasil Tidak Ditemukan...!</p>
                </div>
            <?php else : ?>
                <?php foreach ($pencarian as $val) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="<?= base_url('assets/images/' . $val->gambar); ?>" alt="">
                            </div>
                            <div class="place_info">
                                <a href="<?php echo site_url('wisata_user/detail/' . $val->id_wisata) ?>">
                                    <h3><?= $val->nama_wisata; ?></h3>
                                </a>
                                <p><span class="fa fa-clock-o mr-2"></span><?php echo format_indo(date($val->Date_created)); ?></p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        <?= star_rating($average_rating); ?> | <?= number_format($average_rating); ?>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="<?php echo site_url('wisata_user') ?>">Lainnya</a>
                </div>
            </div>
        </div>
    </div>
</div>