
<script>
    $(document).ready(function(){

        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : `{{ route('categories.index') }}`,
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
