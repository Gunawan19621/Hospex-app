
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            dom: 'Bfrtip',
            processing : true,
            serverSide  : true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
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
                    data : "company", name : "company",
                },
                {
                    data : "visitor_name", name : "visitor_name",
                },
                {
                    data : "visitor_email", name : "visitor_email",
                },
                {
                    data : "phone", name : "phone",
                },
                {
                    data : "event", name : "event",
                },
                {
                    data:"action",
                    name: "action",
                    orderable: false
                }
            ]
        })
       
    })

</script>
