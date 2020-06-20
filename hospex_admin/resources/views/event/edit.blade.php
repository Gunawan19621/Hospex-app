@extends('layout/base11')

@section('title', 'Edit Event')

@section('container')

<div class="m-content">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                    Form Edit Event
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
            </div>

          <!--begin::Form-->
          <form class="m-form m-form--fit m-form--label-align-right" method="post" action="/events/{{$event->id}}">
            @method('patch')
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="eventitel">Event Title</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('event_title') is-invalid @enderror " name="event_title" id="eventTitle" placeholder="Event Title Input" value="{{ $event->event_title }}">
                    @error('event_title') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Year</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('year') is-invalid @enderror year" name="year" id="eventyear" placeholder="Event Year Input" value="{{ $event->year }}">
                    @error('year') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">City</label>
                    <input type="text" onkeyup="this.value=this.value.replace(/[^a-z]/g,'');" autocomplete="off" class="form-control m-input @error('city') is-invalid @enderror" name="city" id="eventCity" placeholder="Event City Input" value="{{ $event->city }}">
                    @error('city') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Event Location</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('event_location') is-invalid @enderror" name="event_location" id="eventLocation" placeholder="Event Location Input" value="{{ $event->event_location }}">
                    @error('event_location') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Site Plan</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('site_plan') is-invalid @enderror" name="site_plan" id="eventSitePlan" placeholder="Event Site Plan Input" value="{{ $event->site_plan }}">
                    @error('site_plan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
          </form>

          <!--end::Form-->
        </div>

        <!--end::Portlet-->
    </div>
  </div>
</div>
@endsection

