@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url('obras/create') !!}" class="btn btn-success btn-sm btn-xs">
				<i class="fa fa-plus"></i> Adicionar
			</a>
		</div>
		Obras
	</header>
	<div class="panel-body table-responsive">
		@include('projects.index-table')
	</div>
</section>
@stop