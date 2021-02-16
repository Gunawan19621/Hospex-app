<?php $__env->startSection('title', $title); ?>

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
                      Form Add Stand
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="<?php echo e(\URL::previous()); ?>" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
        <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/stands/<?php echo e($stand->id); ?>">
            <?php echo method_field('patch'); ?>
          <?php echo csrf_field(); ?>
              <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="companyName">Stand Name</label>
                    <input type="text" autocomplete="off" class="form-control <?php $__errorArgs = ['stand_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="stand_name" id="standName" placeholder="Stand Name Input" value="<?php echo e($stand->stand_name); ?>">
                    <?php $__errorArgs = ['stand_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Area</label>
                    <select class="form-control <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="area_id" id="areaID" value="<?php echo e($stand->area_id); ?>" >
                      <option value="" > Area </option>
                      <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($area->id); ?> " <?php if($area->id == $stand->area_id ): ?> <?php echo e('selected'); ?> <?php endif; ?> > <?php echo e($area->area_name); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Exhibitor</label>
                    <select class="form-control <?php $__errorArgs = ['exhibitor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="exhibitor_id" id="exhibitorID" value="<?php echo e($stand->exhibitor_id); ?>" >
                      <option value="" > Exhibitor </option>
                      <?php $__currentLoopData = $exhibitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($exhibitor->id); ?> " <?php if($exhibitor->id == $stand->event_exhibitor_id ): ?> <?php echo e('selected'); ?> <?php endif; ?> > <?php echo e($exhibitor->company->company_name); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['exhibitor_id'];
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
         $(document).ready(function(){

          let  areas      =  <?php echo $areas; ?>,
            exhibitors =  <?php echo $exhibitors; ?>;
            if (areas.length >= 0) {
                    $('button[type=submit]').prop('disabled', true);
                    $('#areaID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Areas Not Available Yet.
                                            </div>`);
                }
                if (exhibitors.length >= 0) {
                    $('button[type=submit]').prop('disabled', true);
                    $('#exhibitorID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Exhibitors Not Available Yet.
                                            </div>`);
                }

         })

     </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/stand/edit.blade.php ENDPATH**/ ?>