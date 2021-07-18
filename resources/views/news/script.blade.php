
<script>
    $(document).ready(function(){

        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : `{{ route('news.index') }}`,
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "title", name : "title",
                },
                {
                    data : "content", name : "content",
                },
                {
                    data : "image", name : "image",
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
  var link = 'news';
  confirmDelete(link,id)
});
</script>
