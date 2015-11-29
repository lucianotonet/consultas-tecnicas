<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Título</th>
			@if ( !@$client_id )
				<th>Cliente</th>
			@endif
			<th>Status</th>
			<th class="text-center">Consultas Técnicas</th>
			<th></th>
		</tr>
	</thead>
	<tbody>				

		@foreach ($projects as $project)				
		<tr>
			<td width="40"><a href="{{ url('obras/'.$project->id) }}">{{	$project->id }}</a></td>					
			<td><a href="{{ url('obras/'.$project->id) }}"><strong>{{	$project->title }}</strong></a></td>

			@if ( !@$client_id )
				<td><a href="{{ url('clientes/'.$project->client->id) }}">{{ $project->client->name }}</a></td>
			@endif

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
			<td class="text-center">
				<a href="#"><span class="badge">3 Total</span></a>
				<a href="#"><span class="badge badge-danger">1 Em Aberto</span></a>
				<a href="#"><span class="badge badge-info">2 Aguardando</span></a>
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