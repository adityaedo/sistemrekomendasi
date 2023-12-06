<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('path/to/your/image.jpg'); /* Ganti dengan path atau URL gambar Anda */
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }

        .register-container h2 {
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

        .register-button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php echo validation_errors('<p style="color: red;">', '</p>'); ?>
        <?php echo form_open('register/process'); ?>
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
            </div>
            <div class="form-group">
                <textarea id="address" name="address" class="form-control" placeholder="Address" required><?php echo set_value('address'); ?></textarea>
            </div>
            <button type="submit" class="register-button">Register</button>
        <?php echo form_close(); ?>
    </div>
</body>
</html>
