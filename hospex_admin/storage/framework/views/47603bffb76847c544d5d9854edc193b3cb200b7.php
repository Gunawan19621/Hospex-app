<?php $__env->startSection('title', 'Add Task'); ?>

<?php $__env->startSection('container'); ?>
<div class="flash" data-flash="<?php echo e(session('status')); ?>"></div>
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
                        Form Add Task
                      </h3>
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                <a href="<?php echo e(\URL::previous()); ?>" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form action="" method="post">
            <input type="text" name="_token">
          </form>
            <form class="m-form m-form--fit m-form--label-align-right" id="form1" method="post" action="/eventrundown">
                <?php echo csrf_field(); ?>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="eventitel">Task Name</label>
                        <input type="text" autocomplete="off" class="form-control <?php $__errorArgs = ['task'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="task" id="task" placeholder="Task Name" value="<?php echo e(old('task')); ?>">
                        <div class="invalid-feedback feedback-task"> <?php echo e($errors->first('task')); ?> </div>
                    </div>
                    <div class="form-group m-form__group">
                      <label for="eventitel">Time</label>
                        <div class="input-group-append">
                        <input type="text" autocomplete="off" class="form-control input-time <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="time" id="m_timepicker_1_validate" placeholder="Time Schedule" value="<?php echo e(old('time')); ?>">
													<span class="input-group-text"><i class="la la-clock-o"></i></span>
												</div>
                        <div class="invalid-feedback"> <?php echo e($errors->first('time')); ?> </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="eventitel">Task Duration (Minutes)</label>
                        <input type="text" autocomplete="off" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control <?php $__errorArgs = ['taskduration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="taskduration" id="taskdurationschedule" placeholder="Event Schedule task duration" value="<?php echo e(old('taskduration')); ?>">
                        <input type="hidden" name="event_schedule_id" value="<?php echo e($schedule->id); ?>">
                        <div class="invalid-feedback"> <?php echo e($errors->first('taskduration')); ?> </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="location">Location</label>
                        <input type="text" autocomplete="off" class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="location" id="location" placeholder="Location" value="<?php echo e(old('location')); ?>">
                        <div class="invalid-feedback"> <?php echo e($errors->first('location')); ?> </div>
                    </div>
                </div>
                <div class="m-portlet__body body-dynamic">
                  <div class="dynamic-row row">
                    <div class="col-lg-10">
                      <div class="form-group m-form__group">
                          <label for="nametitle">Name</label>
                          <input type="text" autocomplete="off" class="form-control <?php $__errorArgs = ['name.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="name[]" placeholder="Name" value="<?php echo e(old('name.*')); ?>">
                          <div class="invalid-feedback feedback-name"> <?php echo e($errors->first('name.*')); ?> </div>
                      </div>
                      <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                          <label for="email">Email</label>
                          <input type="email" autocomplete="off" class="form-control <?php $__errorArgs = ['email.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="email[]" placeholder="Email" value="<?php echo e(old('email.*')); ?>">
                          <?php $__errorArgs = ['time.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-lg-6">
                          <label for="phone">Phone</label>
                          <input type="text" autocomplete="off" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control <?php $__errorArgs = ['phone.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="phone[]" placeholder="Phone" value="<?php echo e(old('phone.*')); ?>">
                          <?php $__errorArgs = ['info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                          <label for="info">Info</label>
                          <input type="text" autocomplete="off" class="form-control <?php $__errorArgs = ['info.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="info[]" placeholder="Info" value="<?php echo e(old('info.*')); ?>">
                          <?php $__errorArgs = ['info.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                    </div>
                    <div class="col-lg-2 tombol">
                      <a href="javascript:void(0);" onclick="dynamicRow(this,`tambah`)" class="btn-sm btn btn-primary m-btn m-btn--icon create-field"><span><i class="la la-plus"></i></span></a>'
                    </div>
                    <br>
                </div>
              </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions">
                      <button type="submit" class="btn btn-primary btn-submit">Save</button>
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
<?php echo $__env->make('event_rundown/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/event_rundown/create.blade.php ENDPATH**/ ?>