@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url( '/contatos/'.$contact->id.'/edit') !!}" class="btn btn-default btn-xs">
				<i class="fa fa-pencil"></i> Editar
			</a>
			<a href="{!! url('/contatos') !!}" class="btn btn-default btn-xs">
				<i class="fa fa-bars"></i> Ver todos
			</a>
			<a href="{!! url('contatos') !!}" class="btn btn-danger btn-xs">
				<i class="fa fa-trash-o"></i> Excluir
			</a>
		</div>
		Contato <strong>#{!! $contact->id !!}</strong>
	</header>
	<div class="panel-body">

			<div class="">			  
				<h4><strong>{!! $contact->name !!}</strong><br><small>{!! $contact->company !!}</small></h4>
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
								
						{!! Form::open(array('url' => '/contatos/'.$contact->id.'/', 'class'=>"form-horizontal", 'method'=>'PATCH' )) !!}
							<div class="form-group">
								<label for="inputName" class="col-lg-2 col-sm-2 control-label">Nome</label>
								<div class="col-lg-10">
									<p class="form-control-static h4">{!! $contact->name !!}</p>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
								<div class="col-lg-10">
									<p class="form-control-static">{!! $contact->email !!}</p>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPhones" class="col-lg-2 col-sm-2 control-label">Telefones</label>
								<div class="col-lg-10">
									<p class="form-control-static">{!! $contact->phones !!}</p>
								</div>
							</div>	
							<div class="form-group">
								<label for="inputCompany" class="col-lg-2 col-sm-2 control-label">Empresa</label>
								<div class="col-lg-10">
									<p class="form-control-static">{!! $contact->company !!}</p>
								</div>
							</div>	
							<div class="form-group">
								<label for="inputAddress" class="col-lg-2 col-sm-2 control-label">Endereço</label>
								<div class="col-lg-10">
									<p class="form-control-static">{!! $contact->address !!}</p>
								</div>
							</div>	
							<div class="form-group">
								<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Obeservações</label>
								<div class="col-lg-10">
									<p class="form-control-static">{!!  $contact->notes !!}</p>
								</div>
							</div>	
						{!! Form::close() !!}  
			        	
					</div>
			        <div role="tabpanel" class="tab-pane" id="Obras">
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

								@foreach ($contact->technical_consults as $technical_consult)				
								<tr onclick="location.href='{{ url( 'obras/' . $technical_consult->id) }}';">
									<td>{{	$technical_consult->id }}</td>					
									<td><strong>{{	$technical_consult->title }}</strong></td>				
									<td>
										<span class="badge danger">Aguardando</span>
									</td>
									<td>
										<div class="pull-right hidden-phone">
					                        {!! Form::open(array('url' => 'obras/'.$technical_consult->id , 'method'  => 'delete' )) !!}	                        	
						                        <a href="#" class="btn btn-default btn-xs"><i class="fa fa-check"></i></a>
					                        	<a href="{{ url('obras/'.$technical_consult->id.'/edit') }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
												<a href="mailto:{!!	$technical_consult->email !!}" class="btn btn-default btn-xs" title="Enviar e-mail para {!! $technical_consult->title !!}">
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
			    </div>
			</div>
			
	</div>
</section>
@stop
