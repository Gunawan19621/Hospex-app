<?php $__env->startSection('title', 'Events'); ?>

<?php $__env->startSection('container'); ?>
<div class="flash" data-flash="<?php echo e(session('status')); ?>"></div>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Event Lists
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a href="<?php echo e(url('events/create')); ?>" class="btn btn-primary my-3">Add</a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Event Subtitle</th>
                                <th scope="col">Year</th>
                                <th scope="col">Begin Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Link Buy</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('require'); ?>
<?php echo $__env->make('event/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/event/index.blade.php ENDPATH**/ ?>