
<script>
    $(document).ready(function(){

        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : `{{ route('information.index') }}`,
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
                    data : "phone", name : "phone",
                },
                {
                    data : "web", name : "web",
                },
                {
                    data : "address", name : "address",
                },
                {
                    data : "about", name : "about",
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
  var link = 'information';
  confirmDelete(link,id)
});
</script>
