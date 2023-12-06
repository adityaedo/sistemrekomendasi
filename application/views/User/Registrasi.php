<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-8/assets/css/login-8.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title;?></title>
</head>

<body>
    <!-- Login 8 - Bootstrap Brain Component -->
    <section class="bg-light p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="<?php echo base_url('asset/img/bantul.jpg')?>" alt="">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="#!">
                                                            <img src="<?php echo base_url('assets/images/logosepuh.png') ?>" alt="" width="150" height="100">
                                                        </a>
                                                    </div>
                                                    <h4 class="text-center">Selamat Datang di <b class="text-danger">Fae</b></h4>
                                                    <p class="text-center">Registrasi</b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <form enctype="multipart/form-data" action="<?php echo site_url('beranda_user/registrasi');?>" method="post">
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="form-floating mb-1">
                                                        <input type="text" name="username" class="form-control" name="email" placeholder="Masukan Usename Anda..." >
                                                        <label for="email" class="form-label">Username</label>
                                                        <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-1">
                                                        <input type="email" name="email" class="form-control" id="password" placeholder="Masukan Email Anda..." >
                                                        <label for="password" class="form-label">Email</label>
                                                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating mb-1">
                                                        <input type="password" name="password" class="form-control"  placeholder="Masukan Password Anda..." >
                                                        <label for="password" class="form-label">Password</label>
                                                        <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class=" mb-1">
                                                    <label for="password" class="form-label"><b>Foto Profil</b></label>
                                                        <input type="file" name="gambar" class="form-control"   >
                                                     
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-danger btn-sm mb-1" type="submit">Daftar Sekarang!</button>
                                                        <a href="<?php echo site_url('beranda_user/login') ?>" class="btn btn-primary btn-sm" type="submit">Kembali</a>
                                                    </div>
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
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>