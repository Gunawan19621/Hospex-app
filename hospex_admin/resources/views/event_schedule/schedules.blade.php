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
                                    @if ($schedule->date < $event->begin || $schedule->date > $event->end )
                                        <div style="width: 88%;background: transparent;color: #ff6341;" class="alert alert-error" role="alert">
                                            <strong>Warning!</strong> The Date isn't match, please change the date accordingly.
                                        </div>
                                    @endif
                                    <h3 class="m-widget1__title">{{ date('l', strtotime($schedule->date) )}}</h3>
                                    <span class="m-widget1__desc">{{ date('F jS, Y', strtotime($schedule->date) )}}</span>
                                    <a href="javascript:void(0);" data-toggle="modal" data-id="{{ $schedule->id }}" data-target="#m_modal_1"><i class="fa fa-edit"></i></a>  
                                    
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
                                            <!--begin:Timeline 1-->
										<div class="m-timeline-1 m-timeline-1--fixed">
											<div class="m-timeline-1__items">
                                                <div class="m-timeline-1__marker"></div>
                                                
                                                @foreach ($schedule->rundowns()->get() as $key => $task)
												<div class="m-timeline-1__item m-timeline-1__item--{{ ($key % 2 ? 'right' : 'left')  }} m-timeline-1__item--first">
													<div class="m-timeline-1__item-circle">
														<div class="m--bg-danger"></div>
													</div>
													<div class="m-timeline-1__item-arrow"></div>
													<span class="m-timeline-1__item-time m--font-brand">{{ $task->time}}</span>
													<div class="m-timeline-1__item-content">
														<div class="m-timeline-1__item-title">
															{{ $task->task }}
														</div>
														<div class="m-timeline-1__item-body">
															<div class="m-list-pics">
                                                                @foreach ($task->performers as $performer)
    																<a href="#"><img src="{{ url('assets11/app/media/img/users/100_13.jpg') }}" title=""></a>{{ $performer->name }}<br>
                                                                @endforeach
															</div>
															<div class="m-timeline-1__item-body m--margin-top-15">
																location : {{ $task->location }}
															</div>
														</div>
													</div>
                                                </div>
                                                @endforeach
												
											</div>
										</div>
										{{-- <div class="row">
											<div class="col m--align-center">
												<button type="button" class="btn btn-sm m-btn--custom m-btn--pill  btn-danger">Load More</button>
											</div>
										</div> --}}

										<!--End:Timeline 1-->
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

<!--begin::Modal-->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form1" class="m-form m-form--fit m-form--label-align-right"  method="post" action="">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group m-form__group">
                        <label for="evenschedule">Event Schedule</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror date-schedule" name="date" autocomplete="off" placeholder="Event Schedule Date" value="{{ old('date') }}">
                        <input readonly type="hidden" name="id" id="idSchedule" autocomplete="off">
                        @error('date') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary simpan">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->
@endsection

@section('require')
    <script>
        //triggered when modal is shown
        $('#m_modal_1').on('shown.bs.modal', function(event) {

            // The reference tag is your anchor tag here
            var reference_tag   = $(event.relatedTarget); 
            var id              = reference_tag.data('id');
            $('#form1').attr('action',`/eventschedules/${id}`)

        })
        var start =  `{!! $event->begin !!}`;
        var end = `{!! $event->end !!}`;
        // set end date to max one year period:
        $(".date-schedule").datepicker( {
            startDate: new Date(start),
            endDate: new Date(end),
            format: 'yyyy-mm-dd',
            orientation: "bottom"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    </script>
@endsection 