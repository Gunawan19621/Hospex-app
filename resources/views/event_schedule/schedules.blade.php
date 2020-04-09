@extends('layout/base11')
{{-- @section('title', 'Schedules') --}}
    
@section('container')
<!--Begin::Section-->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <!--begin:: Finance Stats-->
        <div class="m-portlet  m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Schedules Event {{ $event->event_title.', '. $event->year.' '. $event->city }}
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="/eventschedules/create/{{ $event->id }}" class="btn btn-primary my-3">Add</a>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget1 m-widget1--paddingless">
                    <div class="accordion accordion-solid accordion-panel accordion-toggle-svg" id="accordionExample8">
                    @foreach ($schedules->get() as $schedule)
                        <div class="m-widget1__item " id="heading{{ $schedule->id }}8">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">{{ date('l', strtotime($schedule->date) )}}</h3>
                                    <span class="m-widget1__desc">{{ date('F jS, Y', strtotime($schedule->date) )}}</span>
                                </div>
                                <div class="col m--align-right collapsed" data-toggle="collapse" data-target="#collapse{{ $schedule->id }}8" aria-expanded="false" aria-controls="collapse{{ $schedule->id }}8">
                                    <i class="fa fa-angle-double-right"><span class="m-widget1__number m--font-accent"></span></i>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $schedule->id }}8" class="collapse" aria-labelledby="headingOne8" data-parent="#accordionExample8" style="">
                            <div class="card-body">
                                {{-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. --}}
                                <!--Begin::Portlet-->
                                <div class="m-portlet  m-portlet--full-height ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    Rundown Schedule 
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                        <a href="/eventrundown/create/{{ $schedule->id }}" class="btn btn-primary my-3">Add Task</a>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-scrollable" data-scrollable="true">
                                            
                                            <!--Begin::Timeline 2 -->
                                            @foreach ($schedule->rundowns()->get() as $task)
                                            <div class="m-timeline-2">
                                                <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                                    
                                                    <div class="m-timeline-2__item m--margin-top-30">
                                                        <span class="m-timeline-2__item-time">{{ $task->time}}</span>
                                                        <div class="m-timeline-2__item-cricle">
                                                            <i class="fa fa-genderless m--font-danger"></i>
                                                        </div>
                                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                                            {{ $task->task}} 
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                                
                                            @endforeach
                    
                                            <!--End::Timeline 2 -->
                                        </div>
                                    </div>
                                </div>
                    
                                <!--End::Portlet-->
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12">
    
                                    </div>
                                </div>
                            </div>
                            </div>
                    @endforeach
                    </div>
                </div>
                {{-- <div class="accordion accordion-solid accordion-panel accordion-toggle-svg" id="accordionExample8">
                    <div class="card">
                        <div class="card-header" id="headingOne8">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne8" aria-expanded="false" aria-controls="collapseOne8">
                                Product Inventory 	
                            </div>
                        </div>
                        <div id="collapseOne8" class="collapse" aria-labelledby="headingOne8" data-parent="#accordionExample8" style="">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                   
                </div> --}}
            </div>
        </div>

        <!--end:: Finance Stats-->
    </div>
    <div class="col-12">

    </div>
</div>
@endsection


