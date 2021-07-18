
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "<?php echo e(route('areas.index')); ?>",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "area_name", name : "area_name",
                },
                {
                    data : "event_location", name : "event_location",
                },
                {
                    data : "note", name : "note",
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
    var link = 'areas';
    confirmDelete(link,id)
});

</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/area/script.blade.php ENDPATH**/ ?>