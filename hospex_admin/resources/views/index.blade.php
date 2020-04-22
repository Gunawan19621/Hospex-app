@extends('layout/main')

@section('title', 'Hospex Admin')

@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>

<div class="container">
	<div class="row">
		<div class="col-10">
			<h1 class="mt-3"> Hello Wolrd</h1>
		</div>
	</div>
</div>
@endsection