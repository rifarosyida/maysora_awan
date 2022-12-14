
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  @include('loginPage.header')
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Diza</b>Shop</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> Data Anda Ada Yang Salah!<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
          </div>
      @endif
      <p class="login-box-msg">Masukkan Data Diri Anda</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
          <input type="password" class="form-control" name="password_confirmation" placeholder="Masukkan Ulang password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="no_hp" placeholder="Nomor Handphone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-12">
              <label class="label">Jenis Kelamin</label>
              <div class="p-t-10" id="jenis_kelamin">
                  <label class="radio-container m-r-45">Lelaki
                      <input type="radio" checked="checked" name="jenis_kelamin" value="L" required autocomplete="jenis_kelamin">
                      <span class="checkmark"></span>
                  </label>
                  <label class="radio-container">Perempuan
                      <input type="radio" name="jenis_kelamin" value="P" required autocomplete="jenis_kelamin">
                      <span class="checkmark"></span>
                  </label>
              </div>
        </div> --}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="jenis_kelamin" placeholder="Jenis kelamin (P/L)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-venus-mars"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-house-chimney"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <span class="float-end">Already have an account? <a href="{{ route('LoginPage') }}">Sign In</a></span>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@include('loginPage.script')
</body>
</html>