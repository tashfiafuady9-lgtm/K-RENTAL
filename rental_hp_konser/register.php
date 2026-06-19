<?php
include 'koneksi.php';

if (isset($_POST['register'])) {

    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password_input = $_POST['password'];
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $role = "customer";

    // Buat cek panjang password harus 8 karakter
    if (strlen($password_input) != 8) {
        echo "
        <script>
            alert('Password harus tepat 8 karakter!');
        </script>
        ";

    } else {
        // Buat cek email sudah terdaftar atau belum
        $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($cek_email) > 0) {
            echo "
            <script>
                alert('Email sudah terdaftar!');
            </script>
            ";
        } else {
            $password = password_hash($password_input, PASSWORD_DEFAULT);

            $query = mysqli_query($conn, "INSERT INTO users(nama,email,password,no_hp,role)
                    VALUES('$nama','$email','$password','$no_hp','$role')");
            if ($query) {
                echo "
                <script>
                    alert('Registrasi berhasil!');
                    window.location='login.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Registrasi gagal!');
                </script>
                ";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width:500px">
        <div class="card-header text-center">
            <h1>Register Customer</h1>
        </div>

        <div class="card-body">
            <form method="POST" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password (harus 8 karakter)</label>
                    <input type="password" name="password" class="form-control" minlength="8" maxlength="8" autocomplete="new-password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <button type="submit" name="register" class="btn btn-primary w-100">Register</button>

                <div class="text-center mt-3"> Sudah punya akun?
                    <a href="login.php"> Login di sini</a>
                </div>

                <br><a href="index.php" class="btn btn-secondary">← Kembali ke Home</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>