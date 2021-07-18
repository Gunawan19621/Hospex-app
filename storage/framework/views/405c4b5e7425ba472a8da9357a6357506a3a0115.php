
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
                        data : "email", name : "email",
                    },
                    {
                        data : "phone", name : "phone",
                    },
                    // {
                    //     data : "address", name : "address",
                    // },
                    {
                        data : "categories", name : "categories",
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
        }
    })
$('#m_table_1').on('click', '.delete', function () {
  var id = $(this).data("id");
  var link = 'companies';
  confirmDelete(link,id)
  
});
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/company/script.blade.php ENDPATH**/ ?>