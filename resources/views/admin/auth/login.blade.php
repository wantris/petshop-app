
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin._partials.admin_header')
    @include('admin._partials.admin_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .pdfobject-container {
        height: 30rem;
        border: 1rem solid rgba(0, 0, 0, .1);
      }
    </style>
    @stack('style')
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <h4 class="font-weight-bold">SIPETCARE</h4>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{route('admin.auth.login.post')}}" class="needs-validation" >
                    @csrf
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input id="email" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                          Please fill in your email
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                          <div class="float-right">
                            <a href="auth-forgot-password.html" class="text-small">
                              Forgot Password?
                            </a>
                          </div>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        <div class="invalid-feedback">
                          please fill in your password
                        </div>
                      </div>
    
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                          <label class="custom-control-label" for="remember-me">Remember Me</label>
                        </div>
                      </div>
    
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Login
                        </button>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

    <!-- Page Specific JS File -->
    @include('admin._partials.admin_js')
</body>
</html>