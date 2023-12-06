<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('assets_user/img/destination/gunung.jpg'); /* Ganti dengan path atau URL gambar Anda */
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .login-button, .register-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-button {
            background-color: #007bff;
            color: #ffffff;
        }

        .register-button {
            background-color: #28a745;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php echo form_open('login_user/masuk'); ?>
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
            </div>
            <?php echo form_error('username'); ?>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <?php echo form_error('password'); ?>
            <button type="submit" class="login-button">Login</button>
        <?php echo form_close(); ?>

        <p class="mt-3">Belum punya akun? <a href="<?php echo base_url('Register/index'); ?>" class="register-button">Daftar sekarang</a></p>
    </div>
</body>
</html>
