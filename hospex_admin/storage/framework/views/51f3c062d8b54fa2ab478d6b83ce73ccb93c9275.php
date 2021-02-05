<?php $__env->startSection('title', 'Add Category'); ?>

<?php $__env->startSection('container'); ?>

<div class="m-content">
	<div class="row">
		  <div class="col-10">
        <div class="alertform"></div>
        <div class="m-portlet m-portlet--tab">
          <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                      Form Add Area
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="<?php echo e(\URL::previous()); ?>" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/areas">
          <?php echo csrf_field(); ?>
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label for="eventitel">Area Name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['area_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="area_name" id="categoryName" autocomplete="off" placeholder="Category Name Input" value="<?php echo e(old('area_name')); ?>">
                    <?php $__errorArgs = ['area_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group m-form__group">
                    <label for="eventitel">Event</label>
                    <select class="form-control <?php $__errorArgs = ['event_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="event_id" id="eventID" value="<?php echo e(old('event_id')); ?>" >
                      <option value="" > Event </option>
                      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($event->id); ?> " > <?php echo e($event->event_title.'('.$event->year.')'); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['event_id'];
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
    $(document).ready(function () {
    let  events =  <?php echo $events; ?>;
        
        if (events.length <= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#eventID').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                        <strong>Warning!</strong> Events Not Available Yet.
                                    </div>`);
        }
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/area/create.blade.php ENDPATH**/ ?>