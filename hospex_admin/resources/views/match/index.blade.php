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
                            Match List
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tabs">
                        <ul class="nav nav-tabs  m-tabs-line m-tabs-line--success" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#approve" role="tab" onclick="approve()">Confirm</a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#pending" role="tab" onclick="pending()">Pending</a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#reject" role="tab" onclick="reject()">Decline</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="approve" role="tabpanel">
                                <!--begin: Datatable -->
                                <table class="table table-striped- table-bordered table-hover table-checkable" id="approveTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Visitor Name</th>
                                            <th scope="col">Visitor Company</th>
                                            <th scope="col">Visitor Email</th>
                                            <th scope="col">Exhibitor Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Status Request</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tab-pane " id="pending" role="tabpanel">
                                <!--begin: Datatable -->
                                <table class="table table-striped- table-bordered table-hover table-checkable" id="pendingTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Visitor Name</th>
                                            <th scope="col">Visitor Company</th>
                                            <th scope="col">Visitor Email</th>
                                            <th scope="col">Exhibitor Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Status Request</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tab-pane " id="reject" role="tabpanel">
                                <!--begin: Datatable -->
                                <table class="table table-striped- table-bordered table-hover table-checkable" id="rejectTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Visitor Name</th>
                                            <th scope="col">Visitor Company</th>
                                            <th scope="col">Visitor Email</th>
                                            <th scope="col">Exhibitor Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Status Request</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
   

@endsection

@section('require')
@include('match/script')
@endsection
