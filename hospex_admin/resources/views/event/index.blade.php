@extends('layout/base11')

@section('title', 'Events')

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
                            Event Lists
                        </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <a href="/events/create" class="btn btn-primary my-3">Add</a>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Event Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Begin Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">City</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Action</th>
                                {{-- <th scope="col">Event Location</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Event Location</th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
   

    <!-- END EXAMPLE TABLE PORTLET-->

{{-- <div class="container">
    <h1><a href="/events/create" class="btn btn-primary my-3">Add</a></h1>
    @if ( session('status') )
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
	<div class="row">
		<div class="col-10">
            <h1 class="mt-3"> Events</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Event Title</th>
                        <th scope="col">Year</th>
                        <th scope="col">City</th>
                        <th scope="col">Site Plan</th>
                        <th scope="col">Event Location</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $event->event_title }}</td>
                        <td>{{ $event->year }}</td>
                        <td>{{ $event->city }}</td>
                        <td>{{ $event->site_plan }}</td>
                        <td>{{ $event->event_location }}</td>
                        <td>
                            <a href=" /events/{{$event->id}}/edit " class="badge badge-success">Edit</a>
                            <form action=" events/{{ $event->id}} " method="post" class="d-inline">
                                @method('delete')
                                @csrf
                            <button type="submit" class="badge badge-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
</div> --}}
@endsection

@section('require')
@include('event/script')
@endsection
