
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "<?php echo e(route('visitors.index')); ?>",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "visitor_name", name : "visitor_name",
                },
                {
                    data : "company", name : "company",
                },
                {
                    data : "visitor_email", name : "visitor_email",
                },
                {
                    data : "phone", name : "phone",
                },
                {
                    data : "event", name : "event",
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
<?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/visitor/script.blade.php ENDPATH**/ ?>