
<script>
    let segment = '{{ collect(request()->segments())->last() }}' ;
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
                    url : "{{ route('admin.index') }}",
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
