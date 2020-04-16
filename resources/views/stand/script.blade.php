
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "{{ route('stands.index') }}",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "stand_name", name : "stand_name",
                },
                {
                    data : "area_name", name : "area_name",
                },
                {
                    data : "exhibitor_name", name : "exhibitor_name",
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

</script>
