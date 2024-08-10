<?php
  include "config/koneksi.php";
  session_start()
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Database Exercises | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style=”backgroud:green;”>
<div class="login-box" style=”backgroud:green;”>
  <div class="login-logo" style=”backgroud:green;”>
    <a href="index2.html"><b>DPW CRUD LOGIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" name = "username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name = "password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-4">
            <button type="submit" name = "login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>

</body>
</html>


<?php
  if (isset($_POST['login']) == 'LOGIN')
  {
      $username = $_POST['username'];
      $password = sha1($_POST['password']);
      // $remember = $_POST['remember'];
      if(empty($username) || empty($password)) {
          echo "<script>alert('Username / Password Tidak Boleh Kosong')</script>";
          echo "<meta http-equiv='refresh' content='0 url = login.php'>";

      } else {
          $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
          $sql = mysqli_query($koneksi, $query);

           if (!$sql) {
            $errMessage = mysqli_error($koneksi);
            echo "<script>alert('Error: $errMessage')</script>";
            echo "<meta http-equiv='refresh' content='0 url=login.php'>";
          } else {
            $user = mysqli_fetch_array($sql);
            if ($user[1]) {
              $level = $user['level'];

              $_SESSION['level'] = $level;
              $_SESSION['username'] = $username;
              echo "<script>window.location='index.php'</script>";
            } else {
              echo "<script>alert('Anda Gagal login! $user')</script>";
              echo "<meta http-equiv='refresh' content='0 url=login.php'>";
            }
        }
      }
  }
?>
