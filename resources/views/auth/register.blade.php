@extends('templates.default')

@section('content')

	<div class="content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-6 col-md-offset-3">
				<section class="panel">
					<header class="panel-heading text-center">
						Criar nova conta
					</header>
					<div class="panel-body">

						@if (count($errors) > 0)
							@foreach ($errors->all() as $error)
								<div class="alert alert-danger">{{ $error }}</div>
							@endforeach      
						@endif


						<form class="form-horizontal" role="form" method="POST" action="{!! url('register') !!}">

							{!! csrf_field() !!}
							
							<div class="form-group">
								<label for="inputNome" class="col-lg-2 col-sm-2 control-label">Nome</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputNome" placeholder="Digite seu nome" name="name" value="{{ old('name') }}">
								</div>
							</div>
	
							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
								<div class="col-lg-10">
									<input type="email" class="form-control" id="inputEmail" placeholder="Digite seu e-mail" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group">
								<label for="inputPassword" class="col-lg-2 col-sm-2 control-label">Senha</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" id="inputPassword" placeholder="Digite sua senha" name="password" value="">
								</div>
							</div>

							<div class="form-group">								
								<label for="inputPassword" class="col-lg-2 col-sm-2 control-label"></label>
								<div class="col-lg-10">
									<input type="password" class="form-control" id="inputPassword" placeholder="Repita sua senha" name="password_confirmation" value="">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-5">
									<button type="submit" class="btn btn-success btn-block">Registrar</button>
								</div>
								<div class="col-lg-5">
									<p class="text-right form-control-static">
										<a href="{!! url('login') !!}" class="">Já possui uma conta?</a>
									</p>
								</div>
							</div>

						</form>

					</div>
				</section>			
			</div>
		</div>
	</div>

@stop