
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
                        url : "<?php echo e(route('matches.index')); ?>",
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
                        url : "<?php echo e(route('matches.pending')); ?>",
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
//    function approve(event,id){
//     //    console.log(id)
//     //    console.log(event)
//     //     event.preventDefault();
//         // let r = document.getElementById(id);
//         // r.ajaxForm({
//         //     url: "",
//         //     success: function(data) {
//         //         // setTimeout(table, 2e3)
//         //         alert('berhasil')
//         //     }
//         // })
//         // var form = $(this);
//     var url = $('#'+id).attr('action');

//     $.ajax({
//            type: "POST",
//            url: url,
//            data: $('#'+id).serialize(), // serializes the form's elements.
//            success: function(data)
//            {
//             setTimeout(function() {
//                            table()
//                         }, 2e3)
//             }
//          });
//         // alert($(e).attr('href'));
//    }

</script>
<?php /**PATH /var/www/html/hospex2020-master/hospex_admin/resources/views/match/script.blade.php ENDPATH**/ ?>