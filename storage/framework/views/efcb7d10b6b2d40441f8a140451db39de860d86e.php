
<script>
    $(document).ready(function(){
        
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
                    data : "company_name", name : "company_name",
                },
                {
                    data : "sponsor_name", name : "sponsor_name",
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
  var link = 'sponsors';
  confirmDelete(link,id)
});
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/sponsor/script.blade.php ENDPATH**/ ?>