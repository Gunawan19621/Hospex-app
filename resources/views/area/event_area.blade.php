@extends('layout/base11')

@section('title', $title)

@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Area List
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    <a href="{{ url('areas/create').'/'.$event->id }}" class="btn btn-primary my-3">Add</a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Area Name</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Info</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
   

@endsection

@section('require')

<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            processing : true,
            serverSide  : true,
            ajax : {
                url : "{{ url()->current() }}",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "area_name", name : "area_name",
                },
                {
                    data : "event_location", name : "event_location",
                },
                {
                    data : "note", name : "note",
                },
                {
                    data:"action",
                    name: "action",
                    orderable: false
                }
            ],
        })

        $('#m_table_1').on('click', '.delete', function () {
  
          var id = $(this).data("id");
          var link = 'areas';
          confirmDelete(link,id)
        });
       
        
    })

</script>
@endsection
