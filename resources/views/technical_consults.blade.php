{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('date', 'Date:') !!}
			{!! Form::text('date') !!}
		</li>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::label('technical_consult_status_id', 'Technical_consult_status_id:') !!}
			{!! Form::text('technical_consult_status_id') !!}
		</li>
		<li>
			{!! Form::label('technical_consult_type_id', 'Technical_consult_type_id:') !!}
			{!! Form::text('technical_consult_type_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}