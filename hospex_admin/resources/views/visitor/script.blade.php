
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "{{ route('visitors.index') }}",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "visitor_name", name : "visitor_name",
                },
                {
                    data : "visitor_email", name : "visitor_email",
                },
                // {
                //     data : "company_name", name : "company_name",
                // },
                // {
                //     data:"action",
                //     name: "action",
                //     orderable: false
                // }
            ]
        })
       
    })

</script>
