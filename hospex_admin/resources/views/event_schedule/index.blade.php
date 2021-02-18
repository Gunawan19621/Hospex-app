@extends('layout/main')

@section('title', 'Employee')

@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
<div class="container">
    <h1><a href="/eventschedules/create" class="btn btn-primary my-3">Add</a></h1>
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
                        <th scope="col">Date</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventschedules as $schedule)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $schedule->date }}</td>
                        <td>
                            <a href=" {{ url('events').'/'.$schedule->id.'/'.edit }} " class="badge badge-success">Edit</a>
                            <form action=" {{ url('events').'/'.$schedule->id }} " method="post" class="d-inline">
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
</div>
@endsection