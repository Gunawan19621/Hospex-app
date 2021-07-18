    
<?php $__env->startSection('container'); ?>
<div class="flash" data-flash="<?php echo e(session('status')); ?>"></div>
<!--Begin::Section-->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

        <!--begin:: Finance Stats-->
        <div class="m-portlet  m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Schedules Event <?php echo e($event->event_title.', '. $event->year.' '. $event->city); ?>

                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="<?php echo e(url('eventschedules/create').'/'.$event->id); ?>" class="btn btn-primary my-3">Add</a>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget1 m-widget1--paddingless">
                    <div class="accordion accordion-solid accordion-panel accordion-toggle-svg" id="accordionExample8">
                    <?php $__currentLoopData = $schedules->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="m-widget1__item " id="heading<?php echo e($schedule->id); ?>8">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <?php if($schedule->date < $event->begin || $schedule->date > $event->end ): ?>
                                        <div style="width: 88%;background: transparent;color: #ff6341;" class="alert alert-error" role="alert">
                                            <strong>Warning!</strong> The Date isn't match, please change the date accordingly.
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="m-widget1__title"><?php echo e(date('l', strtotime($schedule->date) )); ?></h3>
                                    <span class="m-widget1__desc"><?php echo e(date('F jS, Y', strtotime($schedule->date) )); ?></span>
                                    <a href="javascript:void(0);" data-toggle="modal" data-id="<?php echo e($schedule->id); ?>" data-target="#m_modal_1"><i class="fa fa-edit"></i></a>  
                                    
                                </div>
                                <div class="col m--align-right collapsed" data-toggle="collapse" data-target="#collapse<?php echo e($schedule->id); ?>8" aria-expanded="false" aria-controls="collapse<?php echo e($schedule->id); ?>8">
                                    <i class="fa fa-angle-double-right"><span class="m-widget1__number m--font-accent"></span></i>
                                </div>
                            </div>
                        </div>
                        <div id="collapse<?php echo e($schedule->id); ?>8" class="collapse" aria-labelledby="headingOne8" data-parent="#accordionExample8" style="">
                            <div class="card-body">
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
                                        <a href="<?php echo e(url('eventrundown/create').'/'.$schedule->id); ?>" class="btn btn-primary my-3">Add Task</a>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-scrollable" data-scrollable="true">
                                            <!--begin:Timeline 1-->
										<div class="m-timeline-1 m-timeline-1--fixed">
											<div class="m-timeline-1__items">
                                                <div class="m-timeline-1__marker"></div>
                                                
                                                <?php $__currentLoopData = $schedule->rundowns()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="m-timeline-1__item m-timeline-1__item--<?php echo e(($key % 2 ? 'right' : 'left')); ?> m-timeline-1__item--first">
													<div class="m-timeline-1__item-circle">
														<div class="m--bg-danger"></div>
													</div>
													<div class="m-timeline-1__item-arrow"></div>
													<span class="m-timeline-1__item-time m--font-brand"><?php echo e($task->time); ?></span>
													<div class="m-timeline-1__item-content">
														<div class="m-timeline-1__item-title">
															<?php echo e($task->task); ?>

														</div>
														<div class="m-timeline-1__item-body">
															<div class="m-list-pics">
                                                                <?php $__currentLoopData = $task->performers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $performer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    																<a href="#"><img src="<?php echo e(url('assets11/app/media/img/users/100_13.jpg')); ?>" title=""></a><?php echo e($performer->name); ?><br>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</div>
															<div class="m-timeline-1__item-body m--margin-top-15">
																location : <?php echo e($task->location); ?>

															</div>
														</div>
													</div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</div>
										</div>

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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
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
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <div class="modal-body">
                    <div class="form-group m-form__group">
                        <label for="evenschedule">Event Schedule</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> date-schedule" name="date" autocomplete="off" placeholder="Event Schedule Date" value="<?php echo e(old('date')); ?>" readonly required>
                        <input readonly type="hidden" name="id" id="idSchedule" autocomplete="off">
                        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('require'); ?>
    <script>
        //triggered when modal is shown
        $('#m_modal_1').on('shown.bs.modal', function(event) {

            // The reference tag is your anchor tag here
            var reference_tag   = $(event.relatedTarget); 
            var id              = reference_tag.data('id');
            $('#form1').attr('action','eventschedules/'+id);

        })
        var start =  `<?php echo $event->begin; ?>`;
        var end = `<?php echo $event->end; ?>`;
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
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/event_schedule/schedules.blade.php ENDPATH**/ ?>