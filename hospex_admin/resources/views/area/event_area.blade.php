@extends('layout/base11')
{{-- @section('title', 'Schedules') --}}
    
@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
<!--Begin::Section-->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <!--begin:: Finance Stats-->
        <div class="m-portlet  m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Schedules Event 
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="/eventschedules/create/" class="btn btn-primary my-3">Add</a>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget1 m-widget1--paddingless">
                    <div class="accordion accordion-solid accordion-panel accordion-toggle-svg" id="accordionExample8">
                        <div class="m-widget1__item " id="heading8">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title"> Hall A </h3>
                                    <span class="m-widget1__desc">span</span>
                                </div>
                                <div class="col m--align-right collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                    <i class="fa fa-angle-double-right"><span class="m-widget1__number m--font-accent"></span></i>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>

        <!--end:: Finance Stats-->
    </div>
    <div class="col-12">

    </div>
</div>
@endsection


