<ul class="timeline well">
    
    @foreach ($consults as $technical_consult)

        @foreach ($technical_consult->emails as $email)
    
            <li class="{{ ( $email->from == 'contato@cliente.com' ) ? 'timeline-inverted' : '' }}">
                <div class="timeline-badge"><i class="fa fa-envelope-o"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <small class="text-muted pull-right">
                            <i class="glyphicon glyphicon-time"></i> <span class="timeago" title="{{ $email->created_at }}">July 17, 2008</span> via E-mail
                        </small>
                        <h4 class="timeline-title">{{ $email->subject }}</h4>
                        <p>
                            <small class="text-muted">
                                De: {{ $email->from }}<br/>
                                Para: {{ $email->to }}<br/>
                            </small>
                        </p>                                                
                    </div>
                    <div class="timeline-body"><?php echo $email->body_html ?></div>
                </div>
            </li>

        @endforeach

        <hr>

    @endforeach


</ul>