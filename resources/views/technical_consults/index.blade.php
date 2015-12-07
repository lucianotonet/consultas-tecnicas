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

        
        @include('technical_consults.index_timeline_angular')

        {{-- @include('technical_consults.index_timeline') --}}



    </div>
</section>
@stop
