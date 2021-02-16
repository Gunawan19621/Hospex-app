
<script>
    $(document).ready(function(){

        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : `<?php echo e(route('categories.index')); ?>`,
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "category_name", name : "category_name",
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
<?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/category/script.blade.php ENDPATH**/ ?>