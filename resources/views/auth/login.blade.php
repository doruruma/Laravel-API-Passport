@extends('layouts.app')

@section('title', 'Lara API | Sign In')
@section('body', 'bg-light')    
@section('content')
  <div class="container">

    <div class="h3 text-center mt-3 text-muted" style="margin-bottom:120px">API Laravel With Passport</div>
    <div class="row justify-content-center">
      <div class="col-12 col-lg-5">
        <div class="card shadow-sm">
          <div class="card-header border-white">
            Sign In
          </div>
          <div class="card-body">
            <form action="{{ route('AuthController.postLogin') }}" method="POST">

              @csrf

              <div class="form-row py-2">
                <label for="email" class="col-form-label col-3">Email</label>
                <div class="col-8 offset-1">
                  <input type="text" name="email" id="email" class="form-control form-control-sm" autocomplete="off" value="{{ old('email') }}">
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
              </div>

              <div class="form-row py-2">
                <label for="password" class="col-form-label col-3">Password</label>
                <div class="col-8 offset-1">
                  <input type="password" name="password" id="password" class="form-control form-control-sm">
                  <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
              </div>

              <div class="form-row py-2">
                <div class="col offset-4">
                  <button class="btn btn-sm btn-primary">Sign In</button>
                </div>
              </div>

            </form>
          </div>
          <div class="card-footer border-white">
            <small><a href="{{ route('AuthController.register') }}" class="btn-link">Register Account</a></small>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection