
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "<?php echo e(route('stands.index')); ?>",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "stand_name", name : "stand_name",
                },
                {
                    data : "area_name", name : "area_name",
                },
                {
                    data : "exhibitor_name", name : "exhibitor_name",
                },
                {
                    data : "event_info", name : "event_info",
                },
               
                {
                    data:"action",
                    name: "action",
                    orderable: false
                }
            ],
             rowGroup: {
            dataSrc: ['event_info']
        },
        })
       
    })
$('#m_table_1').on('click', '.delete', function () {
  
  var id = $(this).data("id");
  var link = 'stands';
  confirmDelete(link,id)
});
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/stand/script.blade.php ENDPATH**/ ?>