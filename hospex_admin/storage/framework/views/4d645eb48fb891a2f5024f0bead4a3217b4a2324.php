
<script>
    let segment = '<?php echo e(collect(request()->segments())->last()); ?>' ;
    $(document).ready(function(){
    let array = '<?php $array; ?>';
    console.log(array)
        if ( segment == 'edit') {
            // alert('edit')    
        } else {
            var table =$('#m_table_1').DataTable({
                processing : true,
                serverSide  : true,
                ajax : {
                    url : "<?php echo e(route('companies.index')); ?>",
                },
                columns:[
                    {
                        data: 'DT_RowIndex',
                        orderable: false, 
                        searchable: false
                    },
                    {
                        data : "company_name", name : "company_name",
                    },
                    {
                        data : "company_email", name : "company_email",
                    },
                    {
                        data : "company_web", name : "company_web",
                    },
                    {
                        data : "company_address", name : "company_address",
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
            
        }
        
       
    })

</script>
<?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/company/script.blade.php ENDPATH**/ ?>