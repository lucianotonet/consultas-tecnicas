@extends('templates.default')

@section('content')

<section class="panel">
	<header class="panel-heading">
		<div class="pull-right">
			<a href="{!! url('consultas_tecncas/create') !!}" class="btn btn-default btn-sm btn-xs">
				<i class="fa fa-plus"></i> Adicionar
			</a>
		</div>
		Consultas Técnicas
	</header>

    <nav class="navbar navbar-default navbar-static-top">     
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>  
    </nav>

    <div class="panel-body">

        


        @include('technical_consults.index_timeline')





        <div class="row" style="margin-bottom:5px;">
            <div class="col-md-3">
                <div class="sm-st clearfix bg-primary">
                    <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                    <div class="sm-st-info">
                        <span>32</span>
                        Em aberto
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sm-st clearfix bg-primary">
                    <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                    <div class="sm-st-info">
                        <span>2</span>
                        Aguardando resposta
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sm-st clearfix bg-primary">
                    <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                    <div class="sm-st-info">
                        <span>10</span>
                        Total Profit
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sm-st clearfix bg-primary">
                    <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                    <div class="sm-st-info">
                        <span>4567</span>
                        Total Documents
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
