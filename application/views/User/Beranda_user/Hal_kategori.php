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
                    <form class="search_form" action="#">
                        <div class="input_field col-10">
                            <input type="text" placeholder="Ketik Tempat Tujuanmu...">
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
                    <?php if (empty($kategori_wisata)) : ?>
                        <div class="col-12">
                            <h2 class="text-center">Tidak Ada Hasil Ditemukan...</h2>
                        </div>
                    <?php else : ?>
                        <?php foreach ($kategori_wisata as $val) : ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_place">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/images/' . $val->gambar); ?>" alt="">
                                    </div>
                                    <div class="place_info">
                                        <a href="<?php echo site_url('wisata_user/detail/' . $val->id_wisata) ?>">
                                            <h3><?= $val->nama_wisata; ?></h3>
                                            <p><?= $val->Nama_kategori; ?></p>
                                        </a>
                                        <p><span class="fa fa-map-marker mr-2"></span><?= $val->lokasi; ?></p>
                                        <div class="rating_days d-flex justify-content-between">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <?= star_rating($average_rating); ?> | <?= number_format($average_rating); ?>
                                            </span>

                                            <div class="days">
                                                <i class="fa fa-clock-o"></i>
                                                <a href="#"><?php echo format_indo(date($val->Date_created)); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>