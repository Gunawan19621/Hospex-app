
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            dom: 'Bfrtip',
            processing : true,
            serverSide  : true,
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
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
                    data : "company_name", name : "company_name",
                },
                {
                    data : "name", name : "name",
                },
                {
                    data : "email", name : "email",
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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/visitor/script.blade.php ENDPATH**/ ?>