{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('from', 'From:') !!}
			{!! Form::text('from') !!}
		</li>
		<li>
			{!! Form::label('to', 'To:') !!}
			{!! Form::text('to') !!}
		</li>
		<li>
			{!! Form::label('subject', 'Subject:') !!}
			{!! Form::text('subject') !!}
		</li>
		<li>
			{!! Form::label('body_text', 'Body_text:') !!}
			{!! Form::textarea('body_text') !!}
		</li>
		<li>
			{!! Form::label('body_html', 'Body_html:') !!}
			{!! Form::text('body_html') !!}
		</li>
		<li>
			{!! Form::label('headers', 'Headers:') !!}
			{!! Form::textarea('headers') !!}
		</li>
		<li>
			{!! Form::label('technical_consult_id', 'Technical_consult_id:') !!}
			{!! Form::text('technical_consult_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}