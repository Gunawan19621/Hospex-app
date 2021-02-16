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
                      Form Add Stand
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ url('/stands') }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
        <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/stands/{{$stand->id}}">
            @method('patch')
          @csrf
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="companyName">Stand Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('stand_name') is-invalid @enderror " name="stand_name" id="standName" placeholder="Stand Name Input" value="{{ $stand->stand_name }}">
                    @error('stand_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Area</label>
                    <select class="form-control @error('area_id') is-invalid @enderror " name="area_id" id="areaID" value="{{ $stand->area_id }}" >
                      <option value="" > Area </option>
                      @foreach ($areas as $area)
                      <option value=" {{ $area->id }} " @if($area->id == $stand->area_id ) {{'selected'}} @endif > {{ $area->area_name }} </option>
                      @endforeach
                  </select>
                  @error('area_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Exhibitor</label>
                    <select class="form-control @error('exhibitor_id') is-invalid @enderror " name="exhibitor_id" id="exhibitorID" value="{{ $stand->exhibitor_id }}" >
                      <option value="" > Exhibitor </option>
                      @foreach ($exhibitors as $exhibitor)
                      <option value=" {{ $exhibitor->id }} " @if($exhibitor->id == $stand->event_exhibitor_id ) {{'selected'}} @endif > {{ $exhibitor->company->company_name }} </option>
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
@section('require')
     <script>
         $(document).ready(function(){

          let  areas      =  {!! $areas !!},
            exhibitors =  {!! $exhibitors !!};
            if (areas.length >= 0) {
                    $('button[type=submit]').prop('disabled', true);
                    $('#areaID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Areas Not Available Yet.
                                            </div>`);
                }
                if (exhibitors.length >= 0) {
                    $('button[type=submit]').prop('disabled', true);
                    $('#exhibitorID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Exhibitors Not Available Yet.
                                            </div>`);
                }

         })

     </script>
 @endsection