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
                </div>
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                         <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Name</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->name }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Event</label>
                            <div class="col-7">
                                @if($visitor->company->visitors)
                                    <?php $event_all = ''; ?>
                                    @foreach($visitor->company->visitors as $event_visitor)
                                    <?php
                                        if($event_all == ''){
                                            $event_all = $event_visitor->event->event_title. ' - '. $event_visitor->event->year;
                                        }
                                        else{
                                            $event_all = $event_all. ', ' . $event_visitor->event->event_title. ' - '. $event_visitor->event->year;
                                        }
                                    ?>
                                    @endforeach
                                    <input class="form-control m-input" disabled type="text" value="{{ $event_all }}">
                                @else
                                    <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->visitors->event->event_title }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Company</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->company->company_name }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Email</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->email }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->phone }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Verified At</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->email_verified_at }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Register At</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->created_at }}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Address</label>
                            <div class="col-7">
                                <input class="form-control m-input" disabled type="text" value="{{ $visitor->address }}">
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
