@extends('layout/base11')

@section('title', $title)

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
                      Form Edit Exhibitor Company
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ url('/companies') }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/companies/{{$company->id}}">
            @method('patch')
            @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                  <label for="companyName">Company Name </label>
                    <input type="text" autocomplete="off" class="form-control @error('company_name') is-invalid @enderror " name="company_name" id="companyName" placeholder="Company Name Input" value="{{ $company->company_name }}">
                    @error('company_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="exhibitorEmail">Email</label>
                      <input type="email" autocomplete="off" class="form-control @error('exhibitor_email') is-invalid @enderror " name="exhibitor_email" id="exhibitorEmail" placeholder="Email Input" value="{{ $company->users[0]->email }}" readonly>
                      @error('exhibitor_email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="exhibitorPassword">Password</label>
                      <input type="password" autocomplete="off" class="form-control @error('exhibitor_password') is-invalid @enderror " name="exhibitor_password" id="exhibitorPassword" placeholder="Password Input">
                      @error('exhibitor_password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                  <label for="companyWeb">Company Web </label>
                      <input type="text" autocomplete="off" class="form-control @error('company_web') is-invalid @enderror" name="company_web" id="companyWeb" placeholder="Company Web Input" value="{{ $company->company_web }}">
                      @error('company_web') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                        <label for="exhibitorAddress">Address</label>
                        <input type="text" autocomplete="off" class="form-control @error('exhibitor_address') is-invalid @enderror" name="exhibitor_address" id="exhibitorAddress" placeholder="Address Input" value="{{ $company->users[0]->address }}">
                        @error('exhibitor_address') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                        <label for="companyInfo">Company Info</label>
                        <input type="text" autocomplete="off" class="form-control @error('company_info') is-invalid @enderror" name="company_info" id="companyInfo" placeholder="Company Info Input" value="{{ $company->company_info }}">
                        @error('company_info') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                    <label for="companyAddress">Categories</label>
                    <select class="form-control m-select2" id="m_select2_3" name="categories[]" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (gettype(array_search($category->id, $array)) == 'integer') selected @endif > {{ $category->category_name }}  </option>
                        @endforeach
                    </select>
                    @error('company_address') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
    @include('company/script')
@endsection