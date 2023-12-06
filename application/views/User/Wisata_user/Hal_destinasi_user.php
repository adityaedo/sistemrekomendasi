    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destinasi</h3>
                        <p>Lihat Informasi Destinasi Pilihan Mu!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3>Kemana Kamu Mau Pergi DiBantul?</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" method="get" action="<?php echo site_url('beranda_user/pencarian')?>">
                        <div class="input_field col-10">
                            <input type="text" name="keyword" placeholder="Ketik Tempat Tujuanmu...">
                        </div>
                        <div class="search_btn">
                            <button class="boxed-btn4 " type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="popular_places_area">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-12">
                    <div class="row">
                        <?php foreach ($wisata as $val) : ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_place">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/images/' . $val->gambar); ?>" alt="">
                                        <a href="#" class="prise">Tiket :<?= number_format($val->Harga) ?> K</a>
                                    </div>
                                    <div class="place_info">
                                        <a href="<?php echo site_url('wisata_user/detail/' . $val->id_wisata) ?>">
                                            <h3><?= $val->nama_wisata; ?></h3>
                                        </a>
                                        <p><span class="fa fa-clock-o mr-2"></span><?php echo format_indo(date($val->Date_created)); ?></p>
                                        <div class="rating_days d-flex justify-content-between">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <i class="">
                                              <?= star_rating($average_rating); ?> | <?= number_format($average_rating); ?>
                                              </i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>

   

