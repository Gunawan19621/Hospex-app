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
                      Form Add Company
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/companies">
          @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label for="companyName">Company Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('company_name') is-invalid @enderror " name="company_name" id="companyName" placeholder="Company Name Input" value="{{ old('company_name') }}">
                    @error('company_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="companyEmail">company_email</label>
                      <input type="text" autocomplete="off" class="form-control @error('company_email') is-invalid @enderror" name="company_email" id="companyEmail" placeholder="Company Email Input" value="{{ old('company_email') }}">
                      @error('company_email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                      <label for="companyWeb">Company Web</label>
                      <input type="text" autocomplete="off" class="form-control @error('company_web') is-invalid @enderror" name="company_web" id="companyWeb" placeholder="Company Web Input" value="{{ old('company_web') }}">
                      @error('company_web') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                        <label for="companyAddress">Company Address</label>
                        <input type="text" autocomplete="off" class="form-control @error('company_address') is-invalid @enderror" name="company_address" id="companyAddress" placeholder="Company Address" value="{{ old('company_address') }}">
                        @error('company_address') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                    <label for="companyAddress">Categories</label>
                    <select class="form-control m-select2" id="m_select2_3" name="categories[]" multiple="multiple">
                        @foreach ($categories as $category)
                        <option value=" {{ $category->id }} " > {{ $category->category_name }} </option>
                        @endforeach
                    </select>
                    {{-- <input type="text" autocomplete="off" class="form-control @error('company_address') is-invalid @enderror" name="company_address" id="companyAddress" placeholder="Company Address" value="{{ old('company_address') }}"> --}}
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