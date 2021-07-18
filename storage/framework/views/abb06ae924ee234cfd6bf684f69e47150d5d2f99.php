
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
$('#m_table_1').on('click', '.delete', function () {
  
  var id = $(this).data("id");
  var link = 'categories';
  confirmDelete(link,id)
});
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/category/script.blade.php ENDPATH**/ ?>