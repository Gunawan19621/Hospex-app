
<script>
    $(document).ready(function(){
        alertMessage(flash)
        approve()
    })
    function approve(){
        if (!$.fn.dataTable.isDataTable('#approveTable')) {
            $('#approveTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
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
                            data : "event", name : "event",
                        },
                        {
                            data : "visitor_name", name : "visitor_name",
                        },
                        {
                            data : "visitor_company", name : "visitor_company",
                        },
                        {
                            data : "visitor_email", name : "visitor_email",
                        },
                        {
                            data : "exhibitor_name", name : "exhibitor_name",
                        },
                        {
                            data : "date", name : "date",
                        },
                        {
                            data : "time", name : "time",
                        },
                        {
                            data : "status", name : "status",
                        },
                        // {
                        //     data:"action",
                        //     name: "action",
                        //     orderable: false
                        // }
                    ],
                order: [[0, 'desc']]
                });
        }
    }
    function pending(){
        if (!$.fn.dataTable.isDataTable('#pendingTable')) {
            $('#pendingTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                        url : "{{ route('matches.pending') }}",
                    },
                columns:[
                        {
                            data: 'DT_RowIndex',
                            orderable: false, 
                            searchable: false
                        },
                        {
                            data : "event", name : "event",
                        },
                        {
                            data : "visitor_name", name : "visitor_name",
                        },
                        {
                            data : "visitor_company", name : "visitor_company",
                        },
                        {
                            data : "visitor_email", name : "visitor_email",
                        },
                        {
                            data : "exhibitor_name", name : "exhibitor_name",
                        },
                        {
                            data : "date", name : "date",
                        },
                        {
                            data : "time", name : "time",
                        },
                        {
                            data : "status", name : "status",
                        },
                    ],
                order: [[0, 'desc']]
                });
        }
    }

    function reject(){
        if (!$.fn.dataTable.isDataTable('#rejectTable')) {
            $('#rejectTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                        url : "{{ route('matches.reject') }}",
                    },
                columns:[
                        {
                            data: 'DT_RowIndex',
                            orderable: false, 
                            searchable: false
                        },
                        {
                            data : "event", name : "event",
                        },
                        {
                            data : "visitor_name", name : "visitor_name",
                        },
                        {
                            data : "visitor_company", name : "visitor_company",
                        },
                        {
                            data : "visitor_email", name : "visitor_email",
                        },
                        {
                            data : "exhibitor_name", name : "exhibitor_name",
                        },
                        {
                            data : "date", name : "date",
                        },
                        {
                            data : "time", name : "time",
                        },
                        {
                            data : "status", name : "status",
                        },
                    ],
                order: [[0, 'desc']]
                });
        }
    }

</script>
