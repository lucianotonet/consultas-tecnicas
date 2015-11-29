@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			{!! Form::open(array('url' => 'clientes/'.$client->id , 'method'  => 'delete' )) !!}                   	
				{{-- <a href="{!! url('/clientes') !!}" class="btn btn-default btn-xs">
					<i class="fa fa-bars"></i> Ver todos
				</a> --}}
				<a href="{!! url( '/clientes/'.$client->id.'/edit') !!}" class="btn btn-default btn-xs">
					<i class="fa fa-pencil"></i> Editar
				</a>
				<a href="mailto:{!!	$client->email !!}" class="btn btn-default btn-xs" title="Enviar e-mail para {!! $client->title !!}">
					<i class="fa fa-envelope"></i> E-mail
				</a>
				<button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Excluir permanentemente esta obra?');"><i class="fa fa-trash-o"></i> EXCLUIR</button>
				{!! Form::close() !!}
			</div>
			Cliente <strong>#{!! $client->id !!}</strong>
		</header>
		<div class="panel-body">

			<div class="">			  
				<h4><strong>{!! $client->name !!}</strong><br><small>{!! $client->company !!}</small></h4>
				&nbsp;
			</div>
			
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#Resumo" aria-controls="Resumo" role="tab" data-toggle="tab">Resumo</a>
					</li>
					<li role="presentation" class="">
						<a href="#Obras" aria-controls="Obras" role="tab" data-toggle="tab">Obras</a>
					</li>
					<li role="presentation" class="">
						<a href="#Emails" aria-controls="Emails" role="tab" data-toggle="tab">E-mails</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="Resumo">

						&nbsp;

						{!! Form::open(array('url' => 'clientes/'.$client->id, 'class'=>"form-horizontal", 'method'=>'PATCH' )) !!}
						<div class="form-group">
							<label for="inputName" class="col-lg-2 col-sm-2 control-label">Nome</label>
							<div class="col-lg-10">
								<p class="form-control-static h4">{!! $client->name !!}</p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
							<div class="col-lg-10">
								<p class="form-control-static">{!! $client->email !!}</p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPhones" class="col-lg-2 col-sm-2 control-label">Telefones</label>
							<div class="col-lg-10">
								<p class="form-control-static">{!! $client->phones !!}</p>
							</div>
						</div>	
						<div class="form-group">
							<label for="inputCompany" class="col-lg-2 col-sm-2 control-label">Empresa</label>
							<div class="col-lg-10">
								<p class="form-control-static">{!! $client->company !!}</p>
							</div>
						</div>	
						<div class="form-group">
							<label for="inputAddress" class="col-lg-2 col-sm-2 control-label">Endereço</label>
							<div class="col-lg-10">
								<p class="form-control-static">{!! $client->address !!}</p>
							</div>
						</div>	
						<div class="form-group">
							<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Obeservações</label>
							<div class="col-lg-10">
								<p class="form-control-static">{!!  $client->notes !!}</p>
							</div>
						</div>	
						{!! Form::close() !!}  

					</div>
					<div role="tabpanel" class="tab-pane" id="Obras">
						
						<div class="row">							
							<div class="col-md-6">
								
							</div>							
							<div class="col-sm-6 text-right">								
								<a href="{!! url('clientes/'.$client->id.'/obras/create') !!}" class="btn btn-success btn-xs navbar-btn"><i class="fa fa-plus"></i> ADICIONAR</a>			
							</div>        			
						</div>

						@include('projects.index-table', ['projects'=>$client->projects, 'client_id'=>$client->id] )
						
					</div>
				</div>
			</div>
			
		</div>
	</section>
	@stop
