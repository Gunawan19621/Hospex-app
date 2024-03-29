
<script>
    
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "{{ route('exhibitors.index') }}",
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
                    data : "event_info", name : "event_info",
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
  var link = 'exhibitors';
  confirmDelete(link,id)
});
</script>
