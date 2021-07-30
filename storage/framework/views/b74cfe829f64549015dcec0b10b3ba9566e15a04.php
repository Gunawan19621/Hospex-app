
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
                    url : "<?php echo e(route('admin.index')); ?>",
                },
                columns:[
                    {
                        data: 'DT_RowIndex',
                        orderable: false, 
                        searchable: false
                    },
                    {
                        data : "name", name : "name",
                    },
                    {
                        data : "email", name : "email",
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
$('#m_table_1').on('click', '.delete', function () {
  var id = $(this).data("id");
  var link = 'admin';
  confirmDelete(link,id)
  
});
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex-server/resources/views/admin/script.blade.php ENDPATH**/ ?>