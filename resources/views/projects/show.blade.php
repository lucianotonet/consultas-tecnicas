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
		

		<div role="tabpanel">
		    <!-- Nav tabs -->
		    <ul class="nav nav-tabs" role="tablist">
		    	<li role="presentation" class="active">
		            <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Resumo</a>
		        </li>
		        <li role="presentation" class="">
		            <a href="#etapas" aria-controls="etapas" role="tab" data-toggle="tab">Etapas</a>
		        </li>
		        <li role="presentation">
		            <a href="#disciplinas" aria-controls="disciplinas" role="tab" data-toggle="tab">Disciplinas</a>
		        </li>
		        <li role="presentation">
		            <a href="#contatos" aria-controls="contatos" role="tab" data-toggle="tab">Contatos</a>
		        </li>
		        <li role="presentation">
		            <a href="#consultas-tecnicas" aria-controls="consultas-tecnicas" role="tab" data-toggle="tab">Consultas Técnicas</a>
		        </li>
		    </ul>
		
		    <!-- Tab panes -->
		    <div class="tab-content">
		    	<div role="tabpanel" class="tab-pane active" id="overview">
		    		<div class="navbar">
			        	<div class="navbar-right">
			        		
                			<a href="{!! url('obras/'.$project->id.'/edit') !!}" class="btn btn-default btn-xs navbar-btn"><i class="fa fa-edit"></i> EDITAR</a>		        		        			
	        			</div>        			
			        	<p class="navbar-text navbar-left">
		        			
			        	</p>	
		        	</div>		       		
		        	<div class="">
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
		        	</div>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="etapas" ng-controller="ProjectStagesController">
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
								<th>Título</th>
								<th>Consultas Técnicas</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							
							<tr ng-repeat="ProjectStage in ProjectStages.items">								
								<td>@{{ ProjectStage.title }}</td>
								<td>									
									@{{ ProjectStage.description }}
								</td>
								<td>
									<div class="pull-right hidden-phone">
							            <form method="POST" action="http://localhost/system3d.com.br/public/obras/9/etapas/25" accept-charset="UTF-8" class="ng-pristine ng-valid"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="mJVtBuxllQrSa6EJYlv9bXTiZSdgH7FotnoiFy6V">	                        			
							            	<a href="http://localhost/system3d.com.br/public/obras/9/etapas/25/edit" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
							                <button class="btn btn-default btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta etapa?');"><i class="fa fa-times"></i></button>
							            </form>
							     	</div>
								</td>
							</tr>

						</tbody>
					</table>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="disciplinas">
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
		        <div role="tabpanel" class="tab-pane" id="contatos">
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
		        <div role="tabpanel" class="tab-pane" id="consultas-tecnicas">
		       		<div class="navbar">
			        	<div class="navbar-right">	    
		                	<a href="{!! url('obras/'.$project->id.'/consultas_tecnicas/create') !!}" class="btn btn-success btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>
		     			</div>        			
			        	<p class="navbar-text navbar-left">
		        			
			        	</p>	
		        	</div>
		        	<div class="">
		        		{{-- @include('technical_consults.index_timeline') --}}
		        	</div>
		        </div>
				

		    </div>
		</div>

	</div>
</section>
@stop
