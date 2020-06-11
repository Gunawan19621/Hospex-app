
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "{{ route('matches.index') }}",
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
                    data : "exhibitor_name", name : "exhibitor_name",
                },
                {
                    data : "date", name : "date",
                },
                {
                    data : "location", name : "location",
                },
                {
                    data : "notes", name : "notes",
                },
                {
                    data : "status", name : "status",
                },
                // {
                //     data:"action",
                //     name: "action",
                //     orderable: false
                // }
            ]
        })
       
    })

</script>
