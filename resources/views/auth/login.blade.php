@extends('templates.default')

@section('content')

<div class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-md-6 col-md-offset-3">
			<section class="panel">
				<header class="panel-heading text-center">
					Entrar
				</header>
				<div class="panel-body">					

					@if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach      
                    @endif


					<form class="form-horizontal" role="form" method="POST" action="{!! url('login') !!}">

						{!! csrf_field() !!}

						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
							<div class="col-lg-10">
								<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Digite seu e-mail" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword" class="col-lg-2 col-sm-2 control-label">Senha</label>
							<div class="col-lg-10">
								<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Digite sua senha" value="">
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<p class="text-right form-control-static pull-right">
									<a href="{!! url('password/email') !!}" class="">Perdeu a senha?</a>
								</p>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Permanecer conectado
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-5">
								<button type="submit" class="btn btn-success btn-block">Entrar</button>
							</div>
							<div class="col-lg-5">
								<p class="text-right form-control-static">
									<a href="{!! url('register') !!}" class="">Criar nova conta</a>
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
