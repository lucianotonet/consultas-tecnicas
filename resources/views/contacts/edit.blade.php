@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url('contatos') !!}" class="btn btn-default btn-sm btn-xs">
				<i class="fa fa-arrow-left"></i> Voltar
			</a>
		</div>
		Editar contato
	</header>
	<div class="panel-body">
		{!! Form::open(array('url' => 'contatos/'.$contact->id, 'class'=>"form-horizontal", 'method'=>'PATCH' )) !!}
			<div class="form-group">
				<label for="inputName" class="col-lg-2 col-sm-2 control-label">Nome</label>
				<div class="col-lg-10">
					<input type="text" name="name" class="form-control" id="inputName" placeholder="Nome" value="{!! $contact->name or old('name') !!}" required="required">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
				<div class="col-lg-10">
					<input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail" value="{!! $contact->email or old('email') !!}" required="required">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPhones" class="col-lg-2 col-sm-2 control-label">Telefones</label>
				<div class="col-lg-10">
					<input type="tel" name="phones" class="form-control" id="inputPhones" placeholder="Telefones" value="{!! $contact->phones or old('phones') !!}">
				</div>
			</div>	
			<div class="form-group">
				<label for="inputCompany" class="col-lg-2 col-sm-2 control-label">Empresa</label>
				<div class="col-lg-10">
					<input type="text" name="company" class="form-control" id="inputCompany" placeholder="Empresa" value="{!! $contact->company or old('company') !!}">
				</div>
			</div>	
			<div class="form-group">
				<label for="inputAddress" class="col-lg-2 col-sm-2 control-label">Endereço</label>
				<div class="col-lg-10">
					<input type="text" name="address" class="form-control" id="inputAddress" placeholder="Endereço" value="{!! $contact->address or old('address') !!}">
				</div>
			</div>	
			<div class="form-group">
				<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Obeservações</label>
				<div class="col-lg-10">
					<textarea name="notes" class="form-control" id="inputNotes">{!!  $contact->notes or old('notes') !!}</textarea>
				</div>
			</div>			
			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</div>

			

		{!! Form::close() !!}  
	</div>
</section>
@stop
