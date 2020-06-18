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
                      Form Edit Exhibitor
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
        <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/exhibitors/{{$exhibitor->id}}">
            @method('patch')
          @csrf
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="eventitel">Event</label>
                    <select class="form-control @error('event_id') is-invalid @enderror " name="event_id" id="eventID" value="{{ old('event_id') }}" >
                      <option value="" > Event </option>
                      @foreach ($events as $event)
                      <option value=" {{ $event->id }} " @if ( $event->id == $exhibitor->event_id) {{'selected'}} @endif > {{ $event->event_title.'('.$event->year.')' }} </option>
                      @endforeach
                  </select>
                  @error('event_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Company</label>
                    <select class="form-control @error('company_id') is-invalid @enderror " name="company_id" id="companyID" value="{{ old('company_id') }}" >
                      <option value="" > Company </option>
                      @foreach ($companies as $company)
                      <option value=" {{ $company->id }} " @if ( $company->id == $exhibitor->company_id) {{'selected'}} @endif > {{ $company->company_name }} </option>
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
@section('require')
<script>
    $(document).ready(function () {
    let companies =  {!! $companies !!},
        events =  {!! $events !!};
        if (companies.length >= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#m_select2_3').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                      <strong>Warning!</strong> Companies Not Available Yet.  
											            </div>`);
        }
        if (events.length >= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#eventID').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                      <strong>Warning!</strong> Events Not Available Yet.
											        </div>`);
        }
    })

</script>
@endsection