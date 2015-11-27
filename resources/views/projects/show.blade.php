@extends('templates.default')

@section('content')

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
		
		<div class="">			  
			{!! Form::open(array('url' => 'obras/'.$project->id, 'class'=>"form-horizontal", 'method'=>'PATCH' )) !!}
				<div class="form-group">
					<label for="inputName" class="col-lg-2 col-sm-2 control-label">Título</label>
					<div class="col-lg-10">
						<p class="form-control-static h4">{!! $project->title !!}</p>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">Cliente</label>
					<div class="col-lg-10">
						<p class="form-control-static">{!! $project->client->name !!}</p>
					</div>
				</div>
				<div class="form-group">
					<label for="inputCompany" class="col-lg-2 col-sm-2 control-label">Empresa</label>
					<div class="col-lg-10">
						<p class="form-control-static">{!! $project->client->company !!}</p>
					</div>
				</div>	
				<div class="form-group">
					<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Descrição</label>
					<div class="col-lg-10">
						<p class="form-control-static">{!!  $project->description !!}</p>
					</div>
				</div>	
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
			{!! Form::close() !!}  
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
					<div>
			        	<div class="navbar-right">
			        		<a href="{!! url('obras/'.$project->id.'/etapas/create') !!}" class="btn btn-default btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>		        		        			
                			<a href="{!! url('obras/'.$project->id.'/etapas/create') !!}" class="btn btn-default btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>		        		        			
	        			</div>        			
			        	<p class="navbar-text navbar-left">
		        			Text
			        	</p>	
		        	</div>
					<table class="table table-hover">
						<tbody>
							@foreach ($project->stages as $stage)
								<tr>
									<td>{!! $stage->name !!}</td>
									<td>
										<div class="pull-right hidden-phone">
								            {!! Form::open(array('url' => 'obras/'.$stage->id , 'method'  => 'delete' )) !!}	                        	
								                <a href="#" class="btn btn-default btn-xs"><i class="fa fa-check"></i></a>
								            	<a href="{{ url('obras/'.$stage->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
												<a href="mailto:{!!	$stage->email !!}" class="btn btn-default btn-xs" title="Enviar e-mail para {!! $project->name !!}">
													<i class="fa fa-envelope"></i>
												</a>
								                <button class="btn btn-default btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta obra?');"><i class="fa fa-times"></i></button>
								            {!! Form::close() !!}
								     	</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-2">
		        	<div>
			        	<div class="navbar-right">	        		        			
		                	<a href="{!! url('obras/'.$project->id.'/disciplinas/create') !!}" class="btn btn-default btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>
	        			</div>        			
			        	<p class="navbar-text navbar-left">
		        			Text
			        	</p>	
		        	</div>
		        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, ipsum odit. Expedita aspernatur est, velit, non maxime, ex consequuntur temporibus dolorem itaque blanditiis accusantium esse sint reprehenderit delectus! Laborum, assumenda.
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-3">
		        	<div>
			        	<div class="navbar-right">	    
		                	<a href="{!! url('obras/'.$project->id.'/contatos/add') !!}" class="btn btn-default btn-xs navbar-btn"><i class="fa fa-plus"></i> Adicionar</a>
			     		</div>        			
			        	<p class="navbar-text navbar-left">
		        			Text
			        	</p>	
		        	</div>
		        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat ipsum doloremque aut recusandae sunt iste inventore consectetur vitae, culpa ullam dolorem aliquid natus, error repellendus minima facere, optio assumenda dolor!
		        </div>
		        <div role="tabpanel" class="tab-pane" id="tab-4">
		       		<div>
			        	<div class="navbar-right">	    
		                	<a href="{!! url('obras/'.$project->id.'/consultas-tecnicas/create') !!}" class="btn btn-default btn-xs navbar-btn"><i class="fa fa-plus"></i> Adicionar</a>
		     			</div>        			
			        	<p class="navbar-text navbar-left">
		        			Text
			        	</p>	
		        	</div>
		        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus non, laborum quae molestiae, facere consequuntur, inventore aut aliquid doloremque excepturi labore id eos vitae quos repudiandae autem amet nulla! Odio!
		        </div>

		    </div>
		</div>

	</div>
</section>
@stop
