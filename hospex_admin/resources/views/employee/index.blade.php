@extends('layout/main')

@section('title', 'Employee')

@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
<div class="container">
	<div class="row">
		<div class="col-10">
            <h1 class="mt-3"> Employees</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pegawai</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>
                            <a href="" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
</div>
@endsection