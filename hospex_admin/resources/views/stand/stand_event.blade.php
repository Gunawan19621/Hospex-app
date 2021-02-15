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
                            Stand List
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    <a href="/stands/create/{{ $event->id }}" class="btn btn-primary my-3">Add</a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="20%">Stand</th>
                                <th scope="col" width="35%">Exhibitor</th>
                                <th scope="col">Area</th>
                                <th scope="col" width="7%">Action</th>
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
            // columnDefs: [
            //     { "visible": false, "targets": [2] }
            // ],
            columns:[
                {
                    data: 'DT_RowIndex', orderable: false, searchable: false
                },
                {
                    data : "stand_name", name : "stand_name",
                },
                {
                    data : "company_name", name : "company_name",
                },
                {
                    data : "area_name", name : "area_name",
                },
                {
                    data:"action",  name: "action",  orderable: false
                }
            ],
        //     rowGroup: { 
        //         dataSrc: 'area_name'
        // },
            rowsGroup: [3,2],
        })

        $('#m_table_1').on('click', '.delete', function () {
  
          var id = $(this).data("id");
          var link = 'stands';
          confirmDelete(link,id)
        });
       
        
    })

</script>
@endsection
