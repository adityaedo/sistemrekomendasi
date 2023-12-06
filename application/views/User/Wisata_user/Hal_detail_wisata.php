  <!-- header-end -->
  <div class="destination_banner_wrap overlay">
      <div class="destination_text text-center">
          <h3><?= $detail->nama_wisata ?></h3>
          <p><?= star_rating($average_rating); ?> | <?= number_format($average_rating, 1); ?></p>
      </div>
  </div>


  <div class="destination_details_info">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8 col-md-9">
                  <div class="destination_info">
                      <h3>Deskripsi</h3>
                      <p>
                          <?= $detail->deskripsi; ?>
                      </p>
                  </div>
                  <div class="bordered_1px"></div>
                  <h5><b>Informasi</b></h5>
                  <table class="table">
                      <thead class="table">

                          <tr>
                              <th>Lokasi</th>
                              <th><span class="fa fa-map-marker mr-2"></span> <?= $detail->lokasi; ?> </th>
                          </tr>
                          <tr>
                              <th>Tingkat Rekomendasi</th>
                              <th>5.0</th>
                          </tr>
                          <tr>
                              <th>Harga Tiket</th>
                              <th>Rp.<?= number_format($detail->Harga) ?></th>
                          </tr>
                      </thead>

                  </table>
                  <?php echo $this->session->flashdata('not'); ?>
                  <div class="mt-5">
                      <h5><b>Berikan Bintang Untuk Tempat Ini ?</b></h5>
                      <div class="contact_join">
                          <form action="<?php echo site_url('wisata_user/rating') ?>" method="post">
                              <div class="mb-3">
                                  <input type="text" hidden name="id_wisata" value="<?php echo $detail->id_wisata; ?>">
                                  <input type="text" hidden name="id_wisata" value="<?php echo $detail->id_wisata; ?>">
                                  <div id="rating"></div>
                                  <input type="hidden" name="rating_value" id="rating_value" value="0">
                              </div>
                              <div class="col-lg-12">
                                  <div class="single_input">
                                      <textarea name="ulasan"  cols="30" rows="10" placeholder="Tulisankan Ulasan Anda.."></textarea>
                                  </div>
                              </div>
                              <button type="submit" class="col-12 btn btn-danger">Kirimkan</button>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Button trigger modal -->



  <div class="recent_trip_area">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-6">
                  <div class="section_title text-center mb_70">
                      <h3>- Foto Wisata - </h3>
                  </div>
              </div>
          </div>
          <div class="row">
              <?php foreach ($gambar as $val) : ?>
                  <div class="col-lg-4 col-md-6">
                      <div class="single_trip">
                          <div class="thumb">
                              <img src="<?php echo base_url('assets/images/' . $val->image); ?>" alt="">
                          </div>
                          <div class="info">
                              <div class="date">
                                  <span><?php echo format_indo(date($val->date_created)); ?></span>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>
  </div>


  <div class="popular_places_area">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-9">
                  <div class="section_title text-center mb_70">
                      <h3>Rekomendasi Wisata Yang Sesuai...</h3>
                  </div>
              </div>
          </div>
          <div class="row">
              <?php foreach ($wisata as $val) : ?>
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
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>
  </div>