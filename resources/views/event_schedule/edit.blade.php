@extends('layout/base11')

@section('title', 'Add Schedule')

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
                      <h3>
                        Form Edit Schedule
                      </h3>
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ url('eventschedules').'/'.$eventSchedule->id.'/update/'.$events->id }}">
                @csrf
                <input type="hidden" readonly class="form-control" name="event_id" id="event_id" value="{{ $events->id }}">
                <input type="hidden" readonly class="form-control" name="event_schedule_id" id="event_id" value="{{ $eventSchedule->id }}">
                        @error('date') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="evenschedule">Event Schedule</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror date-schedule" name="date" autocomplete="off" placeholder="Event Schedule Date" value="{{ old('date', $eventSchedule->date) }}" required readonly>
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
        var start =  `{!! $events->begin !!}`;
        var end = `{!! $events->end !!}`;
        // set end date to max one year period:
        $(".date-schedule").datepicker( {
            startDate: new Date(start),
            endDate: new Date(end),
            format: 'yyyy-mm-dd',
            orientation: "bottom",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    </script>
@endsection 