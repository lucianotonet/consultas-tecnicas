@extends('templates.default')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-md-6 col-md-offset-3">
            <section class="panel">
                <header class="panel-heading text-center">
                    Redefinir senha
                </header>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('password/email') }}">
                        {!! csrf_field() !!}

                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach      
                        @endif

                        <div class="form-group">                            
                            <div class="text-center">
                                <p>Para redefinir sua senha informe seu e-mail abaixo.<br/>Lhe enviaremos um link para você criar uma nova senha.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 col-sm-2 control-label">E-mail</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" value="{{ old('email') }}" id="inputEmail" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-5">
                                <button type="submit" class="btn btn-success btn-block">
                                    Receber link
                                </button>
                            </div>
                            <div class="col-lg-5">                                
                                <a href="{!! url('login') !!}" class="btn btn-default btn-block">Cancelar</a>
                            </div>
                        </div>
                    </form>

                </div>
            </section>          
        </div>
    </div>
</div>


@stop
