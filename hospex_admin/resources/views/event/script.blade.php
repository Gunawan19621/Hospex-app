<script>
$(document).ready(function(){
    var t = $('#m_table_1').DataTable( {
        // "processing": true,
        // "serverSide": true,
        ajax: "<?php url();?>events/getevents",
        "columns": [
                    {defaultContent:""},
                    {
                        data: "event_title"
                    },
                    {
                        data: "year"
                    },
                    {
                        data: "begin"
                    },
                    {
                        data: "end"
                    },
                    {
                        data: "event_date", name: "event_date"
                    },
                    {
                        data: "event_location"
                    },
                    {
                        data: "link_buy_event"
                    },
                    {
                        data: ""
                    }
                ],
        columnDefs: [{
            targets: -1,
            title: "Actions",
            orderable: !1,
            render: function(a, e, t, n) {
                return `<span class="dropdown">
                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a> 
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('events/${t.id}/edit') }}"><i class="la la-edit"></i> Edit</a>
                            <a class="dropdown-item delete" href="javascript:void(0);" data-id="${ t.id }" ><i class="la la-trash"></i> Hapus</a>
                            <a class="dropdown-item" href="{{ url('events/${t.id}') }}"><i class="la la-edit"></i> Schedule</a>
                            <a class="dropdown-item" href="{{ url('events/${t.id}/site-plan') }}"><i class="la la-edit"></i> Siteplan</a>
                            <a class="dropdown-item" href="{{ url('events/${t.id}/upload-site-plan') }}"><i class="la la-edit"></i> Upload Siteplan</a>
                        </div>
                    </span>`
            },
        }
                ]
    } );
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
})
$('#m_table_1').on('click', '.delete', function () {
  var id = $(this).data("id");
  var link = 'events';
  confirmDelete(link,id)
  
}); 

</script>