
<script>
    $(document).ready(function(){
            // alert('edit')    
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "<?php echo e(route('sponsors.index')); ?>",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "event_title", name : "event_title",
                },
                {
                    data : "sponsor_name", name : "sponsor_name",
                },
                {
                    data : "company_name", name : "company_name",
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
<?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/sponsor/script.blade.php ENDPATH**/ ?>