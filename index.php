<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Pengajuan Cuti Karyawan</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width: 480px">

  
  <div class="card">
    <div class="card-body login-card-body row">
      <div class="login-card-image col-m display-flex align-content-center justify-content-center ">
        <img src="logo_delta.png" alt="logo" style= "height: 200px;">
      </div>
<div class="col-m">
      <p class="login-box-msg">Aplikasi cuti</p>

      <form action="index_act.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="level" required>
            <option value="">--Pilih--</option>
            <option value="Admin">Admin</option>
            <option value="Manajer">Manajer</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Karyawan">Karyawan</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
</div>

   
    </div>    
  </div>
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
