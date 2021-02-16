<?php $__env->startSection('title', $title); ?>

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
                            Exhibitor List
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a href="/exhibitors/create/<?php echo e($event->id); ?>" class="btn btn-primary my-3">Add</a> &nbsp;
                        <a href="/import-excel/<?php echo e($event->id); ?>" class="btn btn-success my-3">Import</a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="20%">Exhibitor</th>
                                <th scope="col" width="35%">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Categories</th>
                                <th scope="col" width="7%">Action</th>
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

<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "<?php echo e(url()->current()); ?>",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "company.company_name", name : "company_name",
                },
                {
                    data : "company.company_address", name : "company_address",
                },
                {
                    data : "company.company_email", name : "company_email",
                },
                {
                    data : "categories", name : "categories",
                },
                
                {
                    data:"action",
                    name: "action",
                    orderable: false
                }
            ]
        })
       
    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/base11', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/exhibitor/event.blade.php ENDPATH**/ ?>