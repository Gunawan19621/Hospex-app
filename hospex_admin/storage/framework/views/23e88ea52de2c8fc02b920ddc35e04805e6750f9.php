<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('container'); ?>
<div class="flash" data-flash="<?php echo e(session('status')); ?>"></div>
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
                      Form Add Exhibitor
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="<?php echo e(\URL::previous()); ?>" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/exhibitors">
          <?php echo csrf_field(); ?>
              <div class="m-portlet__body">
              
                <div class="form-group m-form__group">
                    <label for="eventitel">Event</label>
                    <select class="form-control  <?php $__errorArgs = ['event_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="event_id" id="eventID" value="<?php echo e(old('event_id')); ?>" >
                      <option value="" > Event </option>
                      <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($event->id); ?> " <?php echo e(old('event_id') == $event->id ? 'selected' : ''); ?> > <?php echo e($event->event_title.'('.$event->year.')'); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <div class="invalid-feedback d-block"> <?php echo e($errors->first('event_id')); ?> </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="eventitel">Company</label>
                    <select class="form-control <?php $__errorArgs = ['company_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> m-select2" id="m_select2_3" name="company_id[]" multiple="multiple" >
                      <option value="" > Company </option>
                      <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($company->id); ?> " <?php if(!empty(old('company_id'))): ?><?php echo e(in_array($company->id, old('company_id'))  ? 'selected' : ''); ?><?php endif; ?>  > <?php echo e($company->company_name); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__currentLoopData = $errors->get('company_id.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php 
                      $message = explode('-',$item[0]); 
                      $index = array_search($message[0], array_column($companies->toArray(),'id'));
                  ?>
                  <div class="invalid-feedback d-block"> <?php echo e($companies->toArray()[$index]['company_name'].' '.$message[1]); ?> </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    let companies =  <?php echo $companies; ?>,
        events =  <?php echo $events; ?>;
        if (companies.length <= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#m_select2_3').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                        <strong>Warning!</strong> Companies Not Available Yet.  <a href="<?php echo e(url('companies/create')); ?>" target="_blank" >click here</a> to add Company
                                    </div>`);
        }
        if (events.length <= 0) {
            $('button[type=submit]').prop('disabled', true);
            $('#eventID').prop('disabled', true);
            $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                        <strong>Warning!</strong> Event Not Available Yet. <a href="<?php echo e(url('events/create')); ?>" target="_blank" >click here</a> to add Event
                                    </div>`);
        }
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/exhibitor/create.blade.php ENDPATH**/ ?>