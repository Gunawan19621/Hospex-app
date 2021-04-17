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
                      Form Edit Event Sponsor
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/sponsors/{{$sponsor->id}}">
            @method('patch')
          @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                      <label for="eventitel">Event</label>
                      <select class="form-control @error('event_id') is-invalid @enderror " name="event_id" id="eventID" value="{{ $sponsor->event_id }}" required>
                        <option value=" {{ $sponsor->event_id}}" selected > {{ $sponsor->event->event_title }} </option>
                    </select>
                    @error('event_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Company</label>
                    <select class="form-control " name="company_id" id="companyID" placeholder="Select Sponsor Company" required>
                      <option value=" {{ $sponsor->company_id}}" selected > {{ $sponsor->company->company_name }} </option>
                  </select>
                </div>
                <div class="form-group m-form__group">
                    <label for="sponsorName">Sponsor Name</label>
                    <input type="text" autocomplete="off" class="form-control @error('sponsor_name') is-invalid @enderror " name="sponsor_name" id="SponsorName" placeholder="Sponsor Name Input" value="{{ $sponsor->sponsor_name }}" required>
                    @error('sponsor_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
@push('css')
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2-bootstrap.css')}}">
@endpush
@push('scripts')
    <script src="{{url('plugins/select2/js/select2.full.js')}}"></script>
    
    <script type="text/javascript">
        $('#companyID').select2({
            theme: "bootstrap",
            placeholder: "Select",
            width: '100%',
            containerCssClass: ':all:',
            ajax: {
                url: '{{route('exhibitor_sponsor.ajax.select2')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term,
                        page: params.page,
                        event_id: $('#eventID').val()
                    };
                },
                processResults: function (data, params) {

                    params.page = params.page || 1;

                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * data.per_page) < data.total
                        }
                    };
                },
                cache: true,
            }
        });
    </script>
@endpush