@extends('layout/base11')

@section('title', $title)

@section('container')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Event Sponsor Detail
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                            <div class="alert m-alert m-alert--default" role="alert">
                            </div>
                        </div>
                         <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Sponsor Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $sponsor->sponsor_name }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Event Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $sponsor->event->event_title }}">
                            
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Company Exhibitor Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $sponsor->company->company_name }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Email</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $sponsor->company->company_email }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Categories</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $sponsor->company->categories()->get()->map(function($item) {
                                    return $item->category_name;
                                })->implode(', ') }}">
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   

@endsection
