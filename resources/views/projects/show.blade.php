@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url('obras') !!}" class="btn btn-default btn-sm btn-xs">
				<i class="fa fa-bars"></i> Ver todas
			</a>
		</div>
		Obra <strong>{!! $project->title !!}</strong>
	</header>
	<div class="panel-body">
		
		<div class="pull-right hidden-phone">
            {!! Form::open(array('url' => 'obras/'.$project->id , 'method'  => 'delete' )) !!}	                        	
                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-check"></i></a>
            	<a href="{{ url('obras/'.$project->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
				<a href="mailto:{!!	$project->email !!}" class="btn btn-default btn-xs" title="Enviar e-mail para {!! $project->title !!}">
					<i class="fa fa-envelope"></i>
				</a>
                <button class="btn btn-default btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta obra?');"><i class="fa fa-times"></i></button>
            {!! Form::close() !!}
     	</div>

		<div role="tabpanel">
		    <!-- Nav tabs -->
		    <ul class="nav nav-tabs" role="tablist">
		        <li role="presentation" class="active">
		            <a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Etapas</a>
		        </li>
		        <li role="presentation">
		            <a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Contatos</a>
		        </li>
		    </ul>
		
		    <!-- Tab panes -->
		    <div class="tab-content">
		        <div role="tabpanel" class="tab-pane active" id="tab-1">
					<table class="table table-hover">
						<thead>
							<tr>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Etapa 1</td>
							</tr>
							<tr>
								<td>Etapa </td>
							</tr>
						</tbody>
					</table>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-2">...</div>
		    </div>
		</div>

	</div>
</section>
@stop
