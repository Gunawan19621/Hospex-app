@extends('layout/base11')

@section('title', 'Add Task')

@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
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
                        Form Edit Task
                      </h3>
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form action="" method="post">
            <input type="hidden" name="_token">
          </form>
            <form class="m-form m-form--fit m-form--label-align-right" id="form1" method="post" action="{{ url('eventrundown').'/'.$eventRundown->id.'/update/'.$eventSchedule->id }}">
                @csrf
                <input type="hidden" name="event_schedule_id" value="{{ $eventSchedule->id }}">
                <input type="hidden" name="event_rundown_id" value="{{ $eventRundown->id }}">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="eventitel">Task Name</label>
                        <input type="text" autocomplete="off" class="form-control @error('task') is-invalid @enderror " name="task" id="task" placeholder="Task Name" value="{{ old('task', $eventRundown->task) }}" required>
                        <div class="invalid-feedback feedback-task"> {{ $errors->first('task') }} </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label for="eventitel">Time</label>
                        <div class="input-group-append">
                        <input type="text" autocomplete="off" class="form-control input-time @error('time') is-invalid @enderror " name="time" id="m_timepicker_1_validate" placeholder="Time Schedule" value="{{ old('time', $eventRundown->time) }}" required readonly>
													<span class="input-group-text"><i class="la la-clock-o"></i></span>
												</div>
                        <div class="invalid-feedback"> {{ $errors->first('time') }} </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="eventitel">Task Duration (Minutes)</label>
                        <input type="number" autocomplete="off" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('taskduration') is-invalid @enderror " name="taskduration" id="taskdurationschedule" placeholder="Event Schedule task duration" value="{{ old('taskduration', $eventRundown->duration) }}" required>
                        <div class="invalid-feedback"> {{ $errors->first('taskduration') }} </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="location">Location</label>
                        <input type="text" autocomplete="off" class="form-control @error('location') is-invalid @enderror " name="location" id="location" placeholder="Location" value="{{ old('location', $eventRundown->location) }}" required>
                        <div class="invalid-feedback"> {{ $errors->first('location') }} </div>
                    </div>
                </div>
                <div class="m-portlet__body body-dynamic">
                  <?php $count = 0; $totalCount = $eventRundown->performers->count(); ?>
                  @forelse($eventRundown->performers as $performerEach)
                  <?php $count = $count + 1; ?>
                  <div class="dynamic-row row">
                    <div class="col-lg-10">
                      <div class="form-group m-form__group">
                          <label for="nametitle">Name</label>
                          <input type="text" autocomplete="off" class="form-control @error('name.*') is-invalid @enderror " name="name[]" placeholder="Name" value="{{ old('name.*', $performerEach->name) }}">
                          <div class="invalid-feedback feedback-name"> {{ $errors->first('name.*') }} </div>
                      </div>
                      <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                          <label for="email">Email</label>
                          <input type="email" autocomplete="off" class="form-control @error('email.*') is-invalid @enderror " name="email[]" placeholder="Email" value="{{ old('email.*', $performerEach->email) }}">
                          @error('time.*') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        <div class="col-lg-6">
                          <label for="phone">Phone</label>
                          <input type="text" autocomplete="off" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('phone.*', $performerEach->phone) is-invalid @enderror " name="phone[]" placeholder="Phone" value="{{ old('phone.*', $performerEach->phone) }}">
                          @error('phone.*') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                          <label for="info">Info</label>
                          <input type="text" autocomplete="off" class="form-control @error('info.*') is-invalid @enderror " name="info[]" placeholder="Info" value="{{ old('info.*', $performerEach->info) }}">
                          @error('info.*') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                      </div>
                    </div>
                    @if($count < $totalCount)
                    <div class="col-lg-2 tombol">
                      <a href="javascript:void(0);"  onclick="dynamicRow(this,`kurang`)" class="btn-sm btn btn-danger m-btn m-btn--icon remove-field"><span class="hidden-xs"> <i class="la la-trash-o"></i> </span></a>'
                    </div>
                    <br>
                    @else
                    <div class="col-lg-2 tombol">
                      <a href="javascript:void(0);" onclick="dynamicRow(this,`tambah`)" class="btn-sm btn btn-primary m-btn m-btn--icon create-field"><span><i class="la la-plus"></i></span></a>'
                    </div>
                    <br>
                    @endif
                </div>
                @empty
                <div class="dynamic-row row">
                    <div class="col-lg-10">
                      <div class="form-group m-form__group">
                          <label for="nametitle">Name</label>
                          <input type="text" autocomplete="off" class="form-control @error('name.*') is-invalid @enderror " name="name[]" placeholder="Name" value="{{ old('name.*') }}">
                          <div class="invalid-feedback feedback-name"> {{ $errors->first('name.*') }} </div>
                      </div>
                      <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                          <label for="email">Email</label>
                          <input type="email" autocomplete="off" class="form-control @error('email.*') is-invalid @enderror " name="email[]" placeholder="Email" value="{{ old('email.*') }}">
                          @error('time.*') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                        <div class="col-lg-6">
                          <label for="phone">Phone</label>
                          <input type="text" autocomplete="off" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control @error('phone.*') is-invalid @enderror " name="phone[]" placeholder="Phone" value="{{ old('phone.*') }}">
                          @error('info') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                          <label for="info">Info</label>
                          <input type="text" autocomplete="off" class="form-control @error('info.*') is-invalid @enderror " name="info[]" placeholder="Info" value="{{ old('info.*') }}">
                          @error('info.*') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                      </div>
                    </div>
                    <div class="col-lg-2 tombol">
                      <a href="javascript:void(0);" onclick="dynamicRow(this,`tambah`)" class="btn-sm btn btn-primary m-btn m-btn--icon create-field"><span><i class="la la-plus"></i></span></a>'
                    </div>
                    <br>
                </div>
                @endforelse
              </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions">
                      <button type="submit" class="btn btn-primary btn-submit">Save</button>
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
@include('event_rundown/script')
@endsection
