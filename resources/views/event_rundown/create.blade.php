@extends('layout/base11')

@section('title', 'Add Task')

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
                        Form Add Task
                      </h3>
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
            <form class="m-form m-form--fit m-form--label-align-right" method="post" action="/eventrundown">
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="eventitel">Task Name</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror " name="task" id="task" placeholder="Task Name" value="{{ old('task') }}">
                        @error('task') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="form-group m-form__group">
                        <label for="eventitel">Time</label>
                        <input type="time" class="form-control @error('time') is-invalid @enderror " name="time" id="timeschedule" placeholder="Time Schedule" value="{{ old('time') }}">
                        @error('time') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="form-group m-form__group">
                        <label for="eventitel">Task Duration</label>
                        <input type="text" class="form-control @error('taskduration') is-invalid @enderror " name="taskduration" id="taskdurationschedule" placeholder="Event Schedule taskduration" value="{{ old('taskduration') }}">
                        <input type="hidden" name="event_schedule_id" value="{{ $schedule->id }}">
                        @error('taskduration') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
