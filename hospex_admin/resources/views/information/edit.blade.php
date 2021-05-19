@extends('layout/base11')

@section('title', 'Edit Information')

@section('container')

<div class="m-content">
  <div class="row">
      <div class="col-10">
        <div class="m-portlet m-portlet--tab">
          <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                      Form Edit Information
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="{{ url('information').'/'.$information->id }}">
          @method('patch')
          @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name" autocomplete="off" placeholder="Name Input" value="{{ $information->name }}" required>
                      @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror " name="email" id="email" autocomplete="off" placeholder="Email Input" value="{{ $information->email }}" required>
                      @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror " name="phone" id="phone" autocomplete="off" placeholder="Phone Input" value="{{ $information->phone }}" required>
                      @error('phone') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="web">Web</label>
                      <input type="text" class="form-control @error('web') is-invalid @enderror " name="web" id="web" autocomplete="off" placeholder="Web Input" value="{{ $information->web }}" required>
                      @error('web') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="address">Address</label>
                      <textarea class="form-control @error('address') is-invalid @enderror " name="address" id="address" autocomplete="off" placeholder="Address Input" required>{{ $information->address }}</textarea>
                      @error('address') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="about">About</label>
                      <textarea class="form-control @error('about') is-invalid @enderror " name="about" id="about" autocomplete="off" placeholder="About Input" required>{{ $information->about }}</textarea>
                      @error('about') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
              </div>
              <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
              </div>
            </form>
        </div>   
    </div>
  </div>
</div>
@endsection