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
                      Form Add Sponsor
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ url('sponsors') }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/sponsors">
          @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                      <label for="eventitel">Event</label>
                      <select class="form-control @error('event_id') is-invalid @enderror " name="event_id" id="eventID" value="{{ old('event_id') }}" >
                        <option value="" > Event </option>
                        @foreach ($events as $event)
                        <option value=" {{ $event->id }} " > {{ $event->event_title }} </option>
                        @endforeach
                    </select>
                    @error('event_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="sponsorName">Sponsor Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('sponsor_name') is-invalid @enderror " name="sponsor_name" id="SponsorName" placeholder="Sponsor Name Input" value="{{ old('sponsor_name') }}">
                    @error('sponsor_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                  <div class="form-group m-form__group">
                      <label for="eventitel">Companies</label>
                      <select class="form-control " name="company_id[]" placeholder="Select Sponsor Companies">
                        @foreach ($companies as $company)
                        <option value=" {{ $company->id }} " > {{ $company->company_name }} </option>
                        @endforeach
                    </select>
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