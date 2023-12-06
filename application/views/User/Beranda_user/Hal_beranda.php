<!-- slider_area_start -->
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Bantul</h3>
                            <p>" Nikmati Pesona Dan Keindahan Dunia Versi Mu "</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
<!-- where_togo_area_end  -->

<!-- popular_destination_area_start  -->
<div class="popular_destination_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Popular Destinasi</h3>
                    <p>Kabupaten Bantul Memiliki Banyak Destinasi Wisata Untuk Kamu,
                        <b>yukk Kepoin Wisata - Wisatanya</b>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
    <?php foreach($categories as $val):?>
            <div class="col-lg-4 col-md-6">
                <div class="single_destination">
                    <div class="thumb">
                        <img src="<?= base_url('assets/images/' . $val['Gambar']); ?>" alt="">
                    </div>
                    <div class="content">
                        <p class="d-flex align-items-center"><?= $val['Nama_kategori']?> 
                        <a href="<?php echo site_url('beranda_user/kategori/'.$val['id_kategori'])?>">
                            <?php echo $val['jumlah_wisata']; ?></a> </p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
<!-- popular_destination_area_end  -->

<!-- newletter_area_start  -->

<div class="newletter_area overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="newsletter_text">
                        <?php echo $this->session->flashdata('not'); ?>
                            <h4>Ikuti Kami Untuk Informasi Menarik Lainya</h4>
                            <p>Ikuti Kami,Anda Akan Mendapatkan Informasi Lengkap Dan Terbaru Seputar Wisata Bantul !</p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="mail_form">
                        <form method="post" action="<?php echo site_url('beranda_user/update_email')?>">
                            <div class="row no-gutters">

                                <div class="col-lg-9 col-md-8">
                                    <div class="newsletter_field">
                                        <input type="email" name="email" placeholder="Masukan Email Anda...">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="newsletter_btn">
                                        <button class="boxed-btn4 " type="submit">Ikuti</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- newletter_area_end  -->

<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Rekomendasi Wisata</h3>
                    <p>Tempat Destinasi Wisata Kabupaten Bantu Banyak Banget lho! Penasaran Ngak Ni.. <b>Yuk Kepoin Apa Aja</b></p>
                </div>
            </div>
        </div>
        <div class="row">
        <?php foreach($wisata as $val):?>
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="<?= base_url('assets/images/' . $val->gambar); ?>" alt="">
                    </div>
                    <div class="place_info">
                        <a href="<?php echo site_url('wisata_user/detail/'.$val->id_wisata)?>">
                            <h3><?= $val->nama_wisata;?></h3>
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
            <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="more_place_btn text-center">
                    <a class="boxed-btn4" href="<?php echo site_url('wisata_user')?>">Lainnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- testimonial_area  -->
<div class="bordered_1px"></div>

<div class="testimonial_area travel_variation_area">
    <div class="container">
        <div class="row">
       
                <div class="testmonial_active owl-carousel">
                <?php foreach($rating as $val): ?>
                    <div class="single_carousel">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="single_testmonial text-center">
                                    <div class="author_thumb">
                                        <img src="<?= base_url('assets/images/' . $val->foto_profil); ?>" alt="" >
                                    </div>
                                    <p>" <?= $val->ulasan;?>"</p>
                                    <div class="testmonial_author">
                                        <h3>- <?= $val->username?> - </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
               
            </div>
           
        </div>
    </div>
</div>
<!-- /testimonial_area  -->
