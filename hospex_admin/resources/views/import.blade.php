@extends('layout/base11')

@section('title', 'Import Exhibitor')

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
                            Form Import Exhibitor
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
                    </div>
                </div>
                
                <form class="m-form m-form--fit m-form--label-align-right" action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <input type="file" name="file" class="form-control">
                            @if ($errors->any())
                                    @foreach ($errors->all() as $item)
                                    <div class="invalid-feedback d-block"> {{ $item }} </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button class="btn btn-primary btn-sm">Import Data</button>
                            <a class="btn btn-warning btn-sm" href="{{ url('export').'/'.$event }}">Export Data</a>
                        </div>
                    </div>
                </form>
            </div>   
      </div>
  </div>
</div>
@endsection
@section('require')

   
