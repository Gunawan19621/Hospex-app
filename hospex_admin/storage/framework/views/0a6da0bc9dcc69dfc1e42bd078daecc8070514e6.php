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
          <form class="m-form m-form--fit m-form--label-align-right"  method="post" action="/stands">
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
unset($__errorArgs, $__bag); ?> " name="stand_name" id="standName" placeholder="Stand Name Input" value="<?php echo e(old('stand_name')); ?>">
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
unset($__errorArgs, $__bag); ?> " name="area_id" id="areaID" value="<?php echo e(old('area_id')); ?>" >
                      <option value="" > Area </option>
                      <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($area->id); ?> " > <?php echo e($area->area_name); ?> </option>
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
unset($__errorArgs, $__bag); ?> " name="exhibitor_id" id="exhibitorID" value="<?php echo e(old('exhibitor_id')); ?>" >
                      <option value="" > Exhibitor </option>
                      <?php $__currentLoopData = $exhibitors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value=" <?php echo e($exhibitor->id); ?> " > <?php echo e($exhibitor->company->company_name); ?> </option>
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
<!--begin::Modal-->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Add Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form1" class="m-form m-form--fit m-form--label-align-right"  method="post" action="/areas">
                <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group m-form__group">
                            <label for="eventitel">Area Name</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['area_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="area_name" id="categoryName" autocomplete="off" placeholder="Area Name Input" value="<?php echo e(old('area_name')); ?>">
                            <?php $__errorArgs = ['area_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group m-form__group eventSelect">
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
                                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value=" <?php echo e($ev->id); ?> " > <?php echo e($ev->event_title.'('.$ev->year.')'); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        
                        </div>
                </div>
            </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary simpan">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<!--end::Modal-->

<?php $__env->stopSection(); ?>

 <?php $__env->startSection('require'); ?>
     <script>
         $(document).ready(function(){
            let    areas      =  <?php echo $areas; ?>,
                exhibitors =  <?php echo $exhibitors; ?>;
                var link = `<?php echo e(url('areas/create').'/'.$event); ?>`;
                console.log(event)
            if (areas.length <= 0) {

                    $('button[type=submit]').prop('disabled', true);
                    $('#areaID').prop('disabled', true);
                    $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong> Areas Not Available Yet, <a href="javascript:void(0);" data-toggle="modal" data-target="#m_modal_1">click here</a> to add area
                                            </div>`);
            }
            if (exhibitors.length <= 0) {
                $('button[type=submit]').prop('disabled', true);
                $('#exhibitorID').prop('disabled', true);
                $('.alertform').append(`<div class="alert alert-warning" role="alert">
                                            <strong>Warning!</strong> Exhibitors Not Available Yet. <a href="<?php echo e(url('exhibitors/create')); ?>/<?php echo $event; ?>" target="_blank" >click here</a> to add Exhibitors
                                        </div>`);
            }

         })
         $('.simpan').on('click',function(){
             
             let eventSelect = $('#eventID option:selected').val()
             if (!jQuery.isEmptyObject(eventSelect)) {
                 $('#form1').submit();
             }else{
                 $(this).closest('.modal').find('#form1 .eventSelect').append('<div class="invalid-feedback d-block"> Please set Event </div>');
             }
         })

            
     </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/stand/create.blade.php ENDPATH**/ ?>