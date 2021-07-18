
<script>
    
    $(document).ready(function(){
        var table = $('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "{{ route('available-schedule.index') }}",
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
                    data : "date", name : "date",
                },
                {
                    data : "time", name : "time",
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
  var link = 'available-schedule';
  confirmDelete(link,id)
});
</script>
