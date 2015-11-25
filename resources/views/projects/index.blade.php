@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! route('contatos.create') !!}" class="btn btn-default btn-sm btn-xs">
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
					<td>{{	$project->id }}</td>					
					<td><strong>{{	$project->title }}</strong></td>				
					<td>
						<span class="badge danger">Aguardando</span>
					</td>
					<td>
						<div class="pull-right hidden-phone">
	                        {!! Form::open(array('url' => 'contatos/'.$project->id , 'method'  => 'delete' )) !!}	                        	
		                        <a href="#" class="btn btn-default btn-xs"><i class="fa fa-check"></i></a>
	                        	<a href="{{ url('contatos/'.$project->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
								<a href="mailto:{!!	$project->email !!}" class="btn btn-default btn-xs" title="Enviar e-mail para {!! $project->title !!}">
									<i class="fa fa-envelope"></i>
								</a>
		                        <button class="btn btn-default btn-xs" type="submit" onclick="return confirm('Excluir permanentemente este contato?');"><i class="fa fa-times"></i></button>
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
