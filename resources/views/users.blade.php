{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('username', 'Username:') !!}
			{!! Form::text('username') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('salt', 'Salt:') !!}
			{!! Form::text('salt') !!}
		</li>
		<li>
			{!! Form::label('register_ip', 'Register_ip:') !!}
			{!! Form::text('register_ip') !!}
		</li>
		<li>
			{!! Form::label('forget_token', 'Forget_token:') !!}
			{!! Form::text('forget_token') !!}
		</li>
		<li>
			{!! Form::label('active_token', 'Active_token:') !!}
			{!! Form::text('active_token') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}