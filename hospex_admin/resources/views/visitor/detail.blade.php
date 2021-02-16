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
                            Visitor Detail
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        {{-- <a href="/visitors/create" class="btn btn-primary my-3">Add</a> --}}
                    </div>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                         <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Visitor Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->users[0]->name }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Event Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->event->event_title }}">
                            
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->company_name }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Email</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->users[0]->email }}">
                                <!--<span class="m-form__help">If you want your invoices addressed to a company. Leave blank to use your full name.</span>-->
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->users[0]->phone }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Address</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->users[0]->address }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Info</label>
                            <div class="col-7">
                                <textarea class="form-control m-input" disabled name="" id="" cols="30" rows="10" >{{ $visitor->company->company_info }}</textarea>
                              
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   

@endsection
