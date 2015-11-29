@extends('templates.default')

@section('content')

{!! Breadcrumbs::render( 'project', $project )  !!}

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			{!! Form::open(array('url' => 'obras/'.$project->id , 'method'  => 'delete' )) !!}                   
				<a href="{!! url( '/obras/'.$project->id.'/edit') !!}" class="btn btn-default btn-xs">
					<i class="fa fa-pencil"></i> Editar
				</a>
                <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta obra?');"><i class="fa fa-trash-o"></i> EXCLUIR</button>
            {!! Form::close() !!}
		</div>
		Obra <strong>{!! $project->title !!}</strong>
	</header>
	<div class="panel-body">		
		<div class="well well-xs form-horizontal">
			<div class="row">			  
				<div class="col-sm-6">
					{!! Form::open(array('url' => 'obras/'.$project->id, 'class'=>"form-horizontal", 'method'=>'PATCH', 'role'=>'form',  )) !!}
						<div class="form-group">
							<label for="inputName" class="col-lg-2 col-sm-2 control-label">Nome</label>
							<div class="col-lg-10">
								<p class="form-control-static h4">{!! $project->title !!}
									<br>					
									<small>Etapa atual: {{ $project->stage->name or '' }}</small>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">Cliente</label>
							<div class="col-lg-10">
								<p class="form-control-static h4">{!! $project->client->name !!}
									<br>
									<small>Empresa: {!! $project->client->company !!}</small>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Descrição</label>
							<div class="col-lg-10">
								<p class="form-control-static">{!!  $project->description !!}</p>
							</div>
						</div>	
					{!! Form::close() !!}  
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inputPhones" class="col-lg-2 col-sm-2 control-label">Data</label>
						<div class="col-lg-10">
							<p class="form-control-static">{!! $project->created_at !!}</p>
						</div>
					</div>	
					<div class="form-group">
						<label for="inputAddress" class="col-lg-2 col-sm-2 control-label"><small>Última atualização</small></label>
						<div class="col-lg-10">
							<p class="form-control-static">{!! $project->updated_at !!}</p>
						</div>
					</div>	
				</div>
			</div>
		</div>

		<div role="tabpanel">
		    <!-- Nav tabs -->
		    <ul class="nav nav-tabs" role="tablist">
		        <li role="presentation" class="active">
		            <a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Etapas</a>
		        </li>
		        <li role="presentation">
		            <a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Disciplinas</a>
		        </li>
		        <li role="presentation">
		            <a href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab">Contatos</a>
		        </li>
		        <li role="presentation">
		            <a href="#tab-4" aria-controls="tab-4" role="tab" data-toggle="tab">Consultas Técnicas</a>
		        </li>
		    </ul>
		
		    <!-- Tab panes -->
		    <div class="tab-content">
		        <div role="tabpanel" class="tab-pane active" id="tab-1">
					<div class="navbar">
			        	<div class="navbar-right">
			        		
                			<a href="{!! url('obras/'.$project->id.'/etapas/create') !!}" class="btn btn-success btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>		        		        			
	        			</div>        			
			        	<p class="navbar-text navbar-left">
		        			
			        	</p>	
		        	</div>					
					<table class="table table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Título</th>
								<th>Consultas Técnicas</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($project->stages as $stage)
								<tr>
									<td width="15" class="text-right">
										@if ( $stage->id == $project->current_stage )
											<i class="fa fa-chevron-right text-success"></i> 
										@endif
									</td>
									<td>										
										{!! $stage->name !!}  
									</td>
									<td>
										{!! count( $stage->tecnhical_consults ) !!}
									</td>
									<td>
										<div class="pull-right hidden-phone">
								            {!! Form::open(array('url' => 'obras/'.$project->id.'/etapas/'.$stage->id , 'method'  => 'delete' )) !!}	                        			
								            	<a href="{{ url('obras/'.$project->id.'/etapas/'.$stage->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
								                <button class="btn btn-default btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta etapa?');"><i class="fa fa-times"></i></button>
								            {!! Form::close() !!}
								     	</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-2">
		        	<div class="navbar">
			        	<div class="navbar-right">	        		        			
		                	<a href="{!! url('obras/'.$project->id.'/disciplinas/create') !!}" class="btn btn-success btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>
	        			</div>        			
			        	<p class="navbar-text navbar-left">
		        			
			        	</p>	
		        	</div>
		        	<div class="">
		        		<pre><?php print_r($project->disciplines->toArray() ); ?></pre>
		        	</div>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-3">
		        	<div class="navbar">
			        	<div class="navbar-right">	    
		                	<a href="{!! url('obras/'.$project->id.'/contatos/add') !!}" class="btn btn-success btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>
			     		</div>        			
			        	<p class="navbar-text navbar-left">
		        			
			        	</p>	
		        	</div>
		        	<div class="">
		        		<pre></pre>
		        	</div>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-4">
		       		<div class="navbar">
			        	<div class="navbar-right">	    
		                	<a href="{!! url('obras/'.$project->id.'/consultas_tecnicas/create') !!}" class="btn btn-success btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>
		     			</div>        			
			        	<p class="navbar-text navbar-left">
		        			
			        	</p>	
		        	</div>
		        	<div class="">
		        		<pre></pre>
		        	</div>
		        </div>

		    </div>
		</div>

	</div>
</section>
@stop
