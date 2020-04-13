@extends('layouts.app')

@section('title', 'Lara API | Home')
@section('body', 'bg-light')    
@section('content')
  <div class="container" style="height:400px">

    <h1 class="display-5 mt-4">Your Profile</h1>
    <p class="lead">Get Your Token By Clicking Following Button</p>
    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#tokenModal">Generate Token</button>
    
    <div class="row mt-4">
      <div class="col-lg-4 col-sm-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="row py-1">
              <div class="col-lg-4 col-sm-3">Name</div>
              <div class="col-lg col-sm">: {{ $data->name }}</div>
            </div>
            <div class="row py-1">
              <div class="col-lg-4 col-sm-3">Email</div>
              <div class="col-lg col-sm">: {{ $data->email }}</div>
            </div>
            <div class="row py-1">
              <div class="col-lg-4 col-sm-3">Access</div>
              <div class="col-lg col-sm">: Standard API</div>
            </div>
          </div>
          <div class="card-footer bg-white border-white">
            <a href="{{ route('AuthController.logout') }}" class="btn btn-sm btn-link font-weight-bold">Log out</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tokenModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Access Token</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <textarea name="token" id="token" cols="30" rows="10" class="form-control"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection