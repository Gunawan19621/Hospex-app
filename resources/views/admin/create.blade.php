@extends('layout/base11')

@section('title', $title)

@section('container')

<div class="m-content">
	<div class="row">
		  <div class="col-10">
            <div class="alertform"></div>
        <div class="m-portlet m-portlet--tab">
          <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                      Form Add Admin
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ url('/admin') }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="{{ url('admin') }}">
          @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label for="name">Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('name') is-invalid @enderror " name="name" id="name" placeholder="Company Name Input" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="email">Email</label>
                      <input type="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror " name="email" id="email" placeholder="Email Input" value="{{ old('email') }}" required>
                      @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="exhibitorPassword">Password</label>
                      <input type="password" autocomplete="off" class="form-control @error('password') is-invalid @enderror " name="password" id="password" placeholder="Password Input" required>
                      @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="password_confirmation">Password Confirmation</label>
                      <input type="password" autocomplete="off" class="form-control @error('password_confirmation') is-invalid @enderror " name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation Input" required>
                      @error('password_confirmation') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
@section('require')
<script>

</script>
@endsection