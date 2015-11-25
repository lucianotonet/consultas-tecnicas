{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('company', 'Company:') !!}
			{!! Form::text('company') !!}
		</li>
		<li>
			{!! Form::label('address', 'Address:') !!}
			{!! Form::textarea('address') !!}
		</li>
		<li>
			{!! Form::label('phones', 'Phones:') !!}
			{!! Form::textarea('phones') !!}
		</li>
		<li>
			{!! Form::label('notes', 'Notes:') !!}
			{!! Form::textarea('notes') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}