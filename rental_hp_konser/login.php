<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        if(password_verify($password, $user['password'])){

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){

                header("Location: admin/dashboard.php");

            }else{

                header("Location: customer/dashboard.php");

            }

            exit;

        }else{

            echo "
            <script>
            alert('Password salah!');
            </script>
            ";

        }

    }else{

        echo "
        <script>
        alert('Email tidak ditemukan!');
        </script>
        ";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow mx-auto" style="max-width:500px">

<div class="card-header text-center">
<h1>Login</h1>
</div>

<div class="card-body">

<form method="POST" autocomplete="off">

<div class="mb-3">

<label>Email</label>

<input type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

</div>

<button
type="submit"
name="login"
class="btn btn-primary w-100">

Login

</button>

<div class="text-center mt-3">Belum punya akun?
    <a href="register.php">Daftar di sini</a>
</div>

<br>
<a href="index.php" class="btn btn-secondary">← Kembali ke Home</a>

</form>

</div>

</div>

</div>

</body>
</html>