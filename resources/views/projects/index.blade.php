@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url('obras/create') !!}" class="btn btn-default btn-sm btn-xs">
				<i class="fa fa-plus"></i> Adicionar
			</a>
		</div>
		Obras
	</header>
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>				

				@foreach ($projects as $project)				
				<tr>
					<td width="60">{{	$project->id }}</td>					
					<td><strong>{{	$project->title }}</strong></td>				
					<td>
						<span class="badge badge-<?php 
							switch ($project->status) {
								case 'Aguardando':
									echo "info";
									break;

								case 'Em andamento':
									echo "warning";
									break;
								
								default:
									echo "default";
									break;
							}
						?>">{{ $project->status }}</span>
					</td>
					<td>
						<div class="pull-right hidden-phone">
	                        {!! Form::open(array('url' => 'obras/'.$project->id , 'method'  => 'delete' )) !!}	                        	
	                        	<a href="{{ url('obras/'.$project->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>								
		                        <button class="btn btn-default btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta obra?');"><i class="fa fa-times"></i></button>
		                        
	                        {!! Form::close() !!}
	                 	</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
@stop
