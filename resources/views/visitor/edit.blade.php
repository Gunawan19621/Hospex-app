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
                      Form Add Stand
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
        <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/visitors/{{$visitor->id}}">
        @method('patch')
          @csrf
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="companyName">Visitor Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('visitor_name') is-invalid @enderror " name="visitor_name" id="visitorName" placeholder="Stand Name Input" value="{{ $visitor->visitor_name }}">
                    @error('visitor_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="companyName">Visitor Email</label>
                    <input type="text" autocomplete="off" class="form-control @error('visitor_email') is-invalid @enderror " name="visitor_email" id="visitorEmail" placeholder="Stand Name Input" value="{{ $visitor->visitor_email }}">
                    @error('visitor_email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Company</label>
                    <select class="form-control @error('company_id') is-invalid @enderror " name="company_id" id="companyID" value="{{ $visitor->company_id }}" >
                      <option value="" > Company </option>
                      @foreach ($companies as $company)
                    <option value=" {{ $company->id }} " @if( $company->id == $visitor->company_id ) {{ 'selected' }} @endif > {{ $company->company_name }} </option>
                      @endforeach
                  </select>
                  @error('company_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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