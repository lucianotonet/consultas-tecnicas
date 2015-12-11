{!! Form::open(array('url' => 'contatos', 'class'=>"form-horizontal well well-sm", 'ng-submit' => "submitContact()" )) !!}
	<div class="form-group">
		<label for="inputName" class="col-lg-2 col-sm-2 control-label">Nome</label>
		<div class="col-lg-10">
			<input type="text" name="name" class="form-control" id="inputName" placeholder="Nome" value="{!! old('name') !!}" required="required" ng-model="contact.name">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
		<div class="col-lg-10">
			<input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail" value="{!! old('email') !!}" required="required" ng-model="contact.email">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPhones" class="col-lg-2 col-sm-2 control-label">Telefones</label>
		<div class="col-lg-10">
			<input type="tel" name="phones" class="form-control" id="inputPhones" placeholder="Telefones" value="{!! old('phones') !!}" ng-model="contact.phones">
		</div>
	</div>	
	<div class="form-group">
		<label for="inputCompany" class="col-lg-2 col-sm-2 control-label">Empresa</label>
		<div class="col-lg-10">
			<input type="text" name="company" class="form-control" id="inputCompany" placeholder="Empresa" value="{!! old('company') !!}" ng-model="contact.company">
		</div>
	</div>	
	<div class="form-group">
		<label for="inputAddress" class="col-lg-2 col-sm-2 control-label">Endereço</label>
		<div class="col-lg-10">
			<input type="text" name="address" class="form-control" id="inputAddress" placeholder="Endereço" value="{!! old('address') !!}" ng-model="contact.address">
		</div>
	</div>	
	<div class="form-group">
		<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Obeservações</label>
		<div class="col-lg-10">
			<textarea name="notes" class="form-control" id="inputNotes" ng-model="contact.notes">{!! old('notes') !!}</textarea>
		</div>
	</div>			
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-success">Salvar</button>
		</div>
	</div>

	

{!! Form::close() !!}  