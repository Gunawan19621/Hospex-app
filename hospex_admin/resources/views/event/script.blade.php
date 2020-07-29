<script>

var DatatablesDataSourceAjaxServer = {
    init: function() {
        $("#m_table_1").DataTable({
            // responsive: !0,
            // searchDelay: 500,
            // processing: !0,
            // serverSide: !0,
            ajax: "<?php url();?>events/getevents",
            columns: [{
                data: "id"
            }, {
                data: "event_title"
            }, {
                data: "year"
            }, {
                data: "city"
            }, {
                data: "event_location"
            }, {
                data: "site_plan"
            }, {
                data: "created_at"
            }, {
                data: "updated_at"
            }, {
                data: "event_title"
            }, {
                data: "city"
            }, {
                data: "Actions"
            }],
            columnDefs: [{
                targets: -1,
                title: "Actions",
                orderable: !1,
                render: function(a, e, t, n) {
                    return '\n                        <span class="dropdown">\n                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">\n                              <i class="la la-ellipsis-h"></i>\n                            </a>\n                            <div class="dropdown-menu dropdown-menu-right">\n                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\n                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\n                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\n                            </div>\n                        </span>\n                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">\n                          <i class="la la-edit"></i>\n                        </a>'
                }
            }, {
                targets: 8,
                render: function(a, e, t, n) {
                    var s = {
                        1: {
                            title: "Pending",
                            class: "m-badge--brand"
                        },
                        2: {
                            title: "Delivered",
                            class: " m-badge--metal"
                        },
                        3: {
                            title: "Canceled",
                            class: " m-badge--primary"
                        },
                        4: {
                            title: "Success",
                            class: " m-badge--success"
                        },
                        5: {
                            title: "Info",
                            class: " m-badge--info"
                        },
                        6: {
                            title: "Danger",
                            class: " m-badge--danger"
                        },
                        7: {
                            title: "Warning",
                            class: " m-badge--warning"
                        }
                    };
                    return void 0 === s[a] ? a : '<span class="m-badge ' + s[a].class + ' m-badge--wide">' + s[a].event_title + "</span>"
                }
            }, {
                targets: 9,
                render: function(a, e, t, n) {
                    var s = {
                        1: {
                            title: "Online",
                            state: "danger"
                        },
                        2: {
                            title: "Retail",
                            state: "primary"
                        },
                        3: {
                            title: "Direct",
                            state: "accent"
                        }
                    };
                    return void 0 === s[a] ? a : '<span class="m-badge m-badge--' + s[a].class + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + s[a].class + '">' + s[a].event_title + "</span>"
                }
            }]
        })
    }
};
// jQuery(document).ready(function() {
//     DatatablesDataSourceAjaxServer.init()
// });
$(document).ready(function(){
    var t=$('#m_table_1').DataTable( {
        // "processing": true,
        // "serverSide": true,
        ajax: "<?php url();?>events/getevents",
        "columns": [
                    {defaultContent:""},
                    {
                        data: "event_title"
                    }, {
                        data: "year"
                    }, {
                        data: "begin"
                    },{
                        data: "end"
                    }, {
                        data: "city"
                    }, {
                        data: "event_location"
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
                            <a class="dropdown-item" href="{{ url('events/${t.id}/area') }}"><i class="la la-edit"></i> Stand & Area</a>        
                            <a class="dropdown-item" href="{{ url('events/${t.id}/exhibitor') }}"><i class="la la-edit"></i> Exhibitor</a>        
                            <a class="dropdown-item" href="{{ url('events/${t.id}/upload-site-plan') }}"><i class="la la-edit"></i> Upload SIteplan</a>        
                        </div>
                    </span>
                    <a href="{{ url('events/${t.id}/site-plan') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">  <i class="la la-edit"></i></a>`
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