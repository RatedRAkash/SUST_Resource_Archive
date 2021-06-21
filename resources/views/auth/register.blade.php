@extends('layouts.mainLayout')

@section('content')
<style>
  input[type="email"],
  select.form-control {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 0;
  }

  input[type="email"]:focus,
  select.form-control:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
  }

  input[type="text"],
  select.form-control {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 0;
  }

  input[type="text"]:focus,
  select.form-control:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
  }

  input[type="password"],
  select.form-control {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 0;
  }

  input[type="password"]:focus,
  select.form-control:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
  }
</style>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://kit.fontawesome.com/f449cca809.js" crossorigin="anonymous"></script>

<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

<script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script>-->


<main id="main">

  <script type="text/javascript">
    document.getElementById('register').className = "active";

  </script>

  <!-- ======= About Us Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Register</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Register</li>
        </ol>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Register Section ======= -->
  <section class="register" data-aos="fade-up">

    <div class="container col-lg-4 offset-lg-4">
      <div class="card ">
        <img src="{{ asset('assets/img/login.jpg') }}" class="card-img-top" alt="..." style="height: 200px;">
        <!--<div class="bottom-left"><h3><b>Login</b></h3></div>-->
        <div class="p-3 mb-2 bg-dark text-white">
          <h3><b>Register</b></h3>
        </div>
        <div class="card-body">
          <form class="container" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label text-md-left"><i><b>Name :</b></i></label>

              <div class="col-md-8">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-left"><i><b>Email :</b></i></label>

              <div class="col-sm-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" placeholder="Enter your email address" required unique autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="username" class="col-sm-4 col-form-label text-md-left"><i><b>Username :</b></i></label>

              <div class="col-sm-8">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                  value="{{ old('username') }}" placeholder="Enter a unique username" required unique autocomplete="username">

                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="registration_no" class="col-sm-4 col-form-label text-md-left"><i><b>Phone Number :</b></i></label>

              <div class="col-sm-8">
                <input id="registration_no" type="text" class="form-control @error('registration_no') is-invalid @enderror" name="registration_no"
                  value="{{ old('registration_no') }}" placeholder="Enter your registration number" required unique autocomplete="registration_no">

                @error('registration_no')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <!--<div class="form-group row">
              <label for="birthdate" class="col-sm-4 col-form-label text-md-left"><i><b>Birthdate :</b></i></label>

              <div class="col dates input-group mb-3">
                <input id="birthdate" type="text" class="form-control js-datepicker"  name="birthdate"
                  value="{{ old('birthdate') }}" placeholder="Enter your birthdate" required autocomplete="birthdate">
                  <div class="input-group-append">
                    <span class="border-bottom border-dark"><i class="fas fa-calendar-alt" id="basic-addon2"></i></span>
                  </div>

                @error('birthdate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>-->

            <div class="form-group row">
              <label for="password" class="col-sm-4 col-form-label text-md-left"><i><b>Password :</b></i></label>

              <div class="col-sm-8">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" placeholder="Enter Password(min: 8 digits)" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-sm-4 col-form-label text-md-left"><i><b>Confirm Password
                    :</b></i></label></label>

              <div class="col-sm-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                  placeholder="Confirm your password" required autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-1">
                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <small id="g-recaptcha-text" class="">Please,complete the recaptcha.</small>
                @if($errors->has('g-recaptha-response'))
                <span class="invalid-feedback" style="display:block">
                  <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer text-muted">
          Do you have an account?<a class="btn btn-link" href="{{ route('login') }}">Sign In</a>
        </div>
      </div>
    </div>
  </section><!-- End Register Section -->
</main>

@endsection
