<?php $__env->startSection('title', 'Add Schedule'); ?>

<?php $__env->startSection('container'); ?>

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
                      <h3>
                        Form Add Schedule
                      </h3>
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="<?php echo e(\URL::previous()); ?>" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
            <form class="m-form m-form--fit m-form--label-align-right" method="post" action="/eventschedules">
                <?php echo csrf_field(); ?>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="evenschedule">Event Schedule</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> date-schedule" name="date" autocomplete="off" placeholder="Event Schedule Date" value="<?php echo e(old('date')); ?>">
                        <input type="hidden" readonly class="form-control" name="event_id" id="event_id" value="<?php echo e($events->id); ?>">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('require'); ?>
    <script>
        var start =  `<?php echo $events->begin; ?>`;
        var end = `<?php echo $events->end; ?>`;
        // set end date to max one year period:
        $(".date-schedule").datepicker( {
            startDate: new Date(start),
            endDate: new Date(end)
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    </script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/event_schedule/create.blade.php ENDPATH**/ ?>