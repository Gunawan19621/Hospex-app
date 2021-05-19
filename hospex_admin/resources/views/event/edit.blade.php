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
          <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{ url('events').'/'.$event->id }}">
            @method('patch')
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="eventitel">Event Title</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('event_title') is-invalid @enderror " name="event_title" id="eventTitle" placeholder="Event Title Input" value="{{ $event->event_title }}" required>
                    @error('event_title') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Event Subtitle</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('event_subtitle') is-invalid @enderror " name="event_subtitle" id="eventSubtitle" placeholder="Event Subtitle Input" value="{{ $event->event_subtitle }}" required>
                    @error('event_subtitle') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="begindate">Begin Date</label>
                    <input type="text" autocomplete="off" class="form-control @error('begin') is-invalid @enderror input-date" name="begin" id="beginDate" placeholder="Begin Date Input" value="{{ $event->begin }}" required readonly>
                    @error('begin') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="enddate">End Date</label>
                    <input type="text" autocomplete="off" class="form-control @error('end') is-invalid @enderror input-date" name="end" id="endDate" placeholder="End Date Input" value="{{ $event->end }}" required readonly>
                    @error('end') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Event Location</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('event_location') is-invalid @enderror" name="event_location" id="eventLocation" placeholder="Event Location Input" value="{{ $event->event_location }}" required>
                    @error('event_location') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Link Buy Event</label>
                    <input type="text" autocomplete="off" class="form-control m-input @error('link_buy_event') is-invalid @enderror" name="link_buy_event" id="linkBuyEvent" placeholder="Link Buy Event Input" value="{{ $event->link_buy_event }}" required>
                    @error('link_buy_event') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
@section('require')
    <script>
        $('#beginDate, #endDate').datepicker({
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
            orientation: "bottom",
            yearRange: "-100:+0"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });
    </script>
@endsection 
