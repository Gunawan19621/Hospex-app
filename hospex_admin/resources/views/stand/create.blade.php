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
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/stands">
          @csrf
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="companyName">Stand Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('stand_name') is-invalid @enderror " name="stand_name" id="standName" placeholder="Stand Name Input" value="{{ old('stand_name') }}">
                    @error('stand_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Area</label>
                    <select class="form-control @error('area_id') is-invalid @enderror " name="area_id" id="areaID" value="{{ old('area_id') }}" >
                      <option value="" > Area </option>
                      @foreach ($areas as $area)
                      <option value=" {{ $area->id }} " > {{ $area->area_name }} </option>
                      @endforeach
                  </select>
                  @error('area_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Exhibitor</label>
                    <select class="form-control @error('exhibitor_id') is-invalid @enderror " name="exhibitor_id" id="exhibitorID" value="{{ old('exhibitor_id') }}" >
                      <option value="" > Exhibitor </option>
                      @foreach ($exhibitors as $exhibitor)
                      <option value=" {{ $exhibitor->id }} " > {{ $exhibitor->company->company_name }} </option>
                      @endforeach
                  </select>
                  @error('exhibitor_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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