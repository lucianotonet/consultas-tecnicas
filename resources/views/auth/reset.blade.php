@extends('templates.default')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-6 col-md-offset-3">
            <section class="panel">
                <header class="panel-heading text-center">
                    Reset password
                </header>
                <div class="panel-body">

                    <form method="POST" action="{{ url('/password/reset') }}" class="form-horizontal">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach                            
                        @endif

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
                                <button type="submit" class="btn btn-success btn-block">Salvar nova senha</button>
                            </div>
                            <div class="col-lg-5">
                                <p class="text-right form-control-static">
                                    
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
