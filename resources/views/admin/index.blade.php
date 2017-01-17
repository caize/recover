@extends('layouts.admin')
@section('content')

@endsection
@section('my-js')
<script>
	$(document).ready(function() {
		App.init();
		DashboardV2.init();
	});
</script>
@endsection
