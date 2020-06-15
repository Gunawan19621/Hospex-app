
<script>
    $(document).ready(function(){
        alertMessage(flash)
        var table = $('#m_table_1').DataTable({
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
