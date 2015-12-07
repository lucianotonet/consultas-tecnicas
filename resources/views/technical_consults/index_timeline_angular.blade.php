<ul ng-repeat="TechnicalConsult in TechnicalConsults.items" class="timeline well" ng-controller="TechnicalConsultsController" infinite-scroll="TechnicalConsults.nextPage()" infinite-scroll-distance="2">
        
        <hr>
        @{{ TechnicalConsult.title }}

        <li class="">
            <div class="timeline-badge"><i class="fa fa-envelope-o"></i></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <small class="text-muted pull-right">
                        <i class="glyphicon glyphicon-time"></i> <span class="timeago" title="">July 17, 2008</span> via E-mail
                    </small>
                    <h4 class="timeline-title"></h4>
                    <p>
                        <small class="text-muted">
                            De: <br/>
                            Para: <br/>
                        </small>
                    </p>                                                
                </div>
                <div class="timeline-body">@{{ EmailMessage.contentHtml }}</div>
            </div>
        </li>    

        <li class="timeline-inverted">
            <div class="timeline-badge"><i class="fa fa-envelope-o"></i></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <small class="text-muted pull-right">
                        <i class="glyphicon glyphicon-time"></i> <span class="timeago" title="">July 17, 2008</span> via E-mail
                    </small>
                    <h4 class="timeline-title"></h4>
                    <p>
                        <small class="text-muted">
                            De: <br/>
                            Para: <br/>
                        </small>
                    </p>                                                
                </div>
                <div class="timeline-body"></div>
            </div>
        </li>    

    </ul>