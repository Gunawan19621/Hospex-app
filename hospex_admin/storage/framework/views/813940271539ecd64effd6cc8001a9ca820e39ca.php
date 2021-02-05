
<script>
    
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "<?php echo e(route('exhibitors.index')); ?>",
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
                    data : "event_info", name : "event_info",
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
<?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/exhibitor/script.blade.php ENDPATH**/ ?>