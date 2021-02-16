
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
                    url : "{{ route('companies.index') }}",
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
                        data : "address", name : "address",
                    },
                    {
                        data : "company_web", name : "company_web",
                    },
                    {
                        data : "company_info", name : "company_info",
                    },
                    {
                        data : "categories", name : "categories",
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
