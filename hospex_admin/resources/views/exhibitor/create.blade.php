@extends('layout/base11')

@section('title', $title)

@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
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
                      Form Add Exhibitor (Sponsor)
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="{{ url('exhibitors') }}">
          @csrf
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="eventitel">Event</label>
                    <select class="form-control  @error('event_id') is-invalid @enderror " name="event_id" id="eventID" value="{{ old('event_id') }}" required>
                      <option value="" > Event </option>
                      @foreach ($events as $event)
                      <option value=" {{ $event->id }} " {{ old('event_id') == $event->id ? 'selected' : '' }} > {{ $event->event_title.'('.$event->year.')' }} </option>
                      @endforeach
                  </select>
                  <div class="invalid-feedback d-block"> {{ $errors->first('event_id') }} </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Company Exhibitor</label>
                    <select class="form-control @error('company_id') is-invalid @enderror m-select2" id="m_select2_3" name="company_id[]" multiple="multiple" required>
                      <option value="" > Company Exhibitor</option>
                      @foreach ($companies as $company)
                      <option value=" {{ $company->id }} " @if (!empty(old('company_id'))){{ in_array($company->id, old('company_id'))  ? 'selected' : '' }}@endif  > {{ $company->company_name }} </option>
                      @endforeach
                  </select>
                  @foreach ($errors->get('company_id.*') as $item)
                  <?php 
                      $message = explode('-',$item[0]); 
                      $index = array_search($message[0], array_column($companies->toArray(),'id'));
                  ?>
                  <div class="invalid-feedback d-block"> {{ $companies->toArray()[$index]['company_name'].' '.$message[1]}} </div>
              @endforeach
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
        if (companies.length <= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#m_select2_3').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                        <strong>Warning!</strong> Companies Not Available Yet.  <a href="{{ url('companies/create')}}" target="_blank" >click here</a> to add Company
                                    </div>`);
        }
        if (events.length <= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#eventID').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                        <strong>Warning!</strong> Event Not Available Yet. <a href="{{ url('events/create')}}" target="_blank" >click here</a> to add Event
                                    </div>`);
        }
    })

</script>
@endsection