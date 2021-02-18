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
                      Form Add Available Schedule
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ url('available-schedule') }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/available-schedule">
          @csrf
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="eventitel">Event</label>
                    <select class="form-control  @error('event_id') is-invalid @enderror " name="event_id" id="eventID" value="{{ old('event_id') }}" >
                      <option value="" > Event </option>
                      @foreach ($events as $event)
                      <option value=" {{ $event->id }} " {{ old('event_id') == $event->id ? 'selected' : '' }} > {{ $event->event_title.'('.$event->year.')' }} </option>
                      @endforeach
                  </select>
                  <div class="invalid-feedback d-block"> {{ $errors->first('event_id') }} </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control @error('date') is-invalid @enderror date-schedule" name="date" autocomplete="off" placeholder="Available Schedule Date" value="{{ old('date') }}">
                    @error('date') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                  <label for="time">Time</label>
                    <div class="input-group-append">
                    <input type="text" autocomplete="off" class="form-control input-time @error('time') is-invalid @enderror " name="time" id="m_timepicker_1_validate" placeholder="Available Schedule Time" value="{{ old('time') }}">
                      <span class="input-group-text"><i class="la la-clock-o"></i></span>
                    </div>
                    <div class="invalid-feedback"> {{ $errors->first('time') }} </div>
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
        // set end date to max one year period:
        $(".date-schedule").datepicker( {
            format: 'yyyy-mm-dd',
            orientation: "bottom",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    </script>
@endsection