<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url('obras') !!}" class="btn btn-default btn-sm btn-xs">
				<i class="fa fa-arrow-left"></i> Voltar
			</a>
		</div>
		Adicionar obra
	</header>
	<div class="panel-body">
		{!! Form::open(array('url' => 'obras', 'class'=>"form-horizontal" )) !!}
			
			<div class="form-group">
				<label for="inputName" class="col-lg-2 col-sm-2 control-label">Título</label>
				<div class="col-lg-10">
					<input type="text" name="title" class="form-control" id="inputName" placeholder="Título" value="{!! old('title') !!}" required="required">
				</div>
			</div>
			<div class="form-group">
				<label for="inputNotes" class="col-lg-2 col-sm-2 control-label">Descrição</label>
				<div class="col-lg-10">
					<textarea name="description" class="form-control" id="inputNotes">{!! old('description') !!}</textarea>
				</div>
			</div>

			<div class="form-group">
				<label for="inputCompany" class="col-lg-2 col-sm-2 control-label">Cliente</label>
				<div class="col-lg-10">
					
					@if ( $client_id )
						<p class="form-control-static">{{ $client->name }}</p>
						<input type="hidden" name="client_id" id="inputClient_id" class="form-control" value="{{ $client_id }}">
					@else
						<select name="client_id" id="inputStatus" class="form-control" {{  ( $client_id >= 1 ) ? 'disabled' : '' }}>
							<option value="">-- Selecione --</option>
							@foreach ($clients as $c)
								<option value="{{ $c->id }}" {{  (	$c->id == $client_id ) ? 'selected' : '' }}>{{ $c->name }}</option>
							@endforeach						
						</select>					
					@endif
				</div>
			</div>			
				
			<div class="form-group">
				<label for="inputStatus" class="col-lg-2 col-sm-2 control-label">Status</label>
				<div class="col-lg-10">
					<select name="status" id="inputStatus" class="form-control">
						<option value="">-- Selecione --</option>
						<option value="Aguardando">Aguardando</option>
						<option value="Em andamento">Em andamento</option>
						<option value="Finalizada">Finalizada</option>
					</select>					
				</div>
			</div>		

			<div class="form-group">
				<label for="inputDate" class="col-lg-2 col-sm-2 control-label">Data</label>
				<div class="col-lg-10">
					<input type="date" name="date" class="form-control" id="inputDate" placeholder="Título" value="{!! old('date') !!}">
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