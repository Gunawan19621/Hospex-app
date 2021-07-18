<?php $__env->startSection('title', 'Edit News'); ?>

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
                      Form Edit News
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="<?php echo e(\URL::previous()); ?>" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data"  method="post" action="<?php echo e(url('news').'/'.$news->id); ?>">
          <?php echo method_field('patch'); ?>
          <?php echo csrf_field(); ?>
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="title" id="title" autocomplete="off" placeholder="Title Input" value="<?php echo e($news->title); ?>" required>
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group m-form__group">
                    <label for="content">Content</label>
                    <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="content" id="summernote" autocomplete="off" placeholder="Content Input" required><?php echo $news->content; ?></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="form-group m-form__group">
                      <div>
                          <label for="image" class="control-label">Image (Max 10MB)</label>
                          <div class="custom-file form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> ">
                              <input type="file" class="custom-file-input" accept="image/*" name="image" id="image"/>
                              <label class="custom-file-label" for="image" id="label_image">Choose file</label>
                          </div>
                          <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"> <?php echo e($message); ?> </div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <input type="hidden" id="old_image" name="old_image" value="<?php echo e($news->image); ?>" />
                      <div class="row" id="show_image">
                          <div class="col-lg-3">
                              <div class="card card-custom gutter-b">
                                  <div class="card-body">
                                      <div class="d-flex">
                                          <div class="flex-shrink-0 mr-7">
                                              <div class="symbol symbol-50 symbol-lg-120">
                                                  <img id="preview_image" style="max-width:75px;" src="<?php echo e(config('url.url_media').$news->image); ?>"/>
                                              </div>
                                          </div>
                                      </div>
                                      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="imageRemove()">Remove</button>
                                  </div>
                              </div>
                          </div>
                      </div>
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
<?php echo $__env->make('news/script_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/news/edit.blade.php ENDPATH**/ ?>