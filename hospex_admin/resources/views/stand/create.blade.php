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
<!--begin::Modal-->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form1" class="m-form m-form--fit m-form--label-align-right"  method="post" action="/areas">
                @csrf
                    <div class="modal-body">
                        <div class="form-group m-form__group">
                            <label for="eventitel">Area Name</label>
                            <input type="text" class="form-control @error('area_name') is-invalid @enderror " name="area_name" id="categoryName" autocomplete="off" placeholder="Category Name Input" value="{{ old('area_name') }}">
                            @error('area_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        <div class="form-group m-form__group eventSelect">
                            <label for="eventitel">Event</label>
                            <select class="form-control @error('event_id') is-invalid @enderror " name="event_id" id="eventID" value="{{ old('event_id') }}" >
                                <option value="" > Event </option>
                                @foreach ($events as $event)
                                    <option value=" {{ $event->id }} " > {{ $event->event_title.'('.$event->year.')' }} </option>
                                @endforeach
                            </select>
                        
                        </div>
                </div>
            </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary simpan">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<!--end::Modal-->

@endsection

 @section('require')
     <script>
         $(document).ready(function(){
            let  areas      =  {!! $areas !!},
            exhibitors =  {!! $exhibitors !!};
            if (areas.length <= 0) {

                var link = `{{ url('areas/create').'/'.$event }}`;
                    $('button[type=submit]').prop('disabled', true);
                    $('#areaID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Areas Not Available Yet, <a href="javascript:void(0);" data-toggle="modal" data-target="#m_modal_1">click here</a> to add area
                                            </div>`);
                }
                if (exhibitors.length <= 0) {
                    $('button[type=submit]').prop('disabled', true);
                    $('#exhibitorID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Exhibitors Not Available Yet.
                                            </div>`);
                }

         })
         $('.simpan').on('click',function(){
             
             let eventSelect = $('#eventID option:selected').val()
             if (!jQuery.isEmptyObject(eventSelect)) {
                 $('#form1').submit();
             }else{
                 $(this).closest('.modal').find('#form1 .eventSelect').append('<div class="invalid-feedback d-block"> Please set Event </div>');
             }
         })

            
     </script>
 @endsection