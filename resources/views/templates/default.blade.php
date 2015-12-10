<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultas Técnicas | Garcia</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By Luciano Tonet">
    <meta name="keywords" content="Bootstrap 3, Laravel 5.1, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('css/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('css/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="{{ asset('css/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="{{ asset('css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('css/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="{{ asset('css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    
    <!-- Bootstrap Select -->
    <link href="{{ asset('css/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- Theme style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">

  </style>
</head>
<body class="skin-black" ng-app="mainApp">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="{{ url('/') }}" class="logo">
            Consultas Técnicas
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            @if (Auth::check())
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            @endif

            <div class="navbar-right">
                @if (Auth::check())
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">0</span>
                            </a>
                            <ul class="dropdown-menu ">
                                <li class="header">Nenhum e-mail não lido</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam alias dolor vero autem rerum amet facere officiis accusantium maiores ad ex eum ipsam nulla commodi, esse quae, labore tempore dolore?</li>
                                        <li class="list-group-item">Architecto beatae unde temporibus doloribus provident fuga similique aspernatur dolores. Totam ullam nulla quidem at qui ratione quibusdam. Iure unde quidem magnam obcaecati. Ad harum eligendi ut aliquid maxime doloremque?</li>
                                        <li class="list-group-item">Quibusdam tenetur illo eos amet porro et ex quaerat, vel sed impedit dolor repellat cumque beatae provident nam tempore modi esse ipsam, dolorem excepturi adipisci! Quae maiores eaque, necessitatibus perferendis!</li>
                                        <li class="list-group-item">Ullam tenetur vel officiis corrupti voluptas at incidunt tempora facilis. Atque fuga perferendis in dolorem officia, commodi repellendus placeat pariatur possimus tempora obcaecati odio sequi, dolore quia cupiditate consequatur mollitia.</li>
                                        <li class="list-group-item">Eveniet illo esse quam, autem ipsam. Similique nemo aspernatur, explicabo quas nesciunt fugit deserunt nobis sit quisquam omnis. Esse mollitia officia ullam corporis placeat incidunt reprehenderit voluptatem commodi consequatur doloribus.</li>
                                        <li class="list-group-item">Aut repellendus numquam, nemo ipsa cupiditate recusandae id accusantium sapiente dolorum veniam, illo, asperiores ipsam alias aperiam aliquam eum velit repudiandae! Vitae alias, nam, rem illum optio doloremque? Ad, laborum?</li>
                                        <li class="list-group-item">Harum sapiente, assumenda officia dicta, modi hic doloribus non deserunt porro fugit cum temporibus voluptatum atque id delectus amet vitae repudiandae, minus eos ex, aliquid. Quis, laboriosam odio mollitia libero!</li>
                                        <li class="list-group-item">Eos cumque, sit odit magnam, nobis id atque deleniti dolor quibusdam. Eligendi laboriosam non architecto esse, maiores odio. Maxime recusandae distinctio velit praesentium consectetur inventore voluptatibus repellat numquam qui dolores?</li>
                                        <li class="list-group-item">Illo voluptas dicta possimus! Tempora quasi aut commodi voluptate? Eaque delectus ratione quaerat nemo ad! Laboriosam eum, rerum illum tempore voluptatum libero maxime quisquam, incidunt repellat nam culpa, non molestias!</li>
                                        <li class="list-group-item">Consequuntur laboriosam voluptatem recusandae natus voluptatum libero animi, rerum error ut harum, soluta cumque officia sed officiis ab iure quisquam tempora odit amet porro iste, ratione. Maiores labore, animi! Consectetur?</li>
                                        <li class="list-group-item">Reprehenderit pariatur dolorum accusantium, perspiciatis aliquam officiis hic, illum odit voluptates doloremque nemo maxime consequuntur neque ipsa ab, quisquam culpa velit accusamus fugiat earum alias labore. Assumenda neque harum labore.</li>
                                        <li class="list-group-item">Nesciunt sit totam ab similique ipsum dolorem sunt aut, iste, voluptas suscipit perspiciatis minus quis accusantium dolores! Voluptas quis rerum pariatur, dolor minus iure, voluptate eius nulla placeat neque molestiae.</li>
                                        <li class="list-group-item">Doloribus itaque labore illo repellendus laudantium inventore error vero est. Accusamus ut atque est amet nulla. Voluptates est voluptatem dignissimos, et ex magnam nesciunt debitis pariatur placeat odio earum fugiat!</li>
                                        <li class="list-group-item">Quisquam temporibus voluptates corporis eaque alias? Unde aperiam doloribus omnis, placeat commodi blanditiis accusamus, consequuntur ex, eum numquam saepe sit! Atque, odio a est facere officiis dolore architecto aliquam consectetur?</li>
                                        <li class="list-group-item">Nulla, eveniet. Explicabo voluptates cum quidem impedit eius magnam, quis totam expedita beatae quos non similique consequatur laudantium nesciunt alias inventore? Quas hic, placeat, autem molestiae commodi laborum doloribus maxime!</li>
                                        <li class="list-group-item">Quisquam sunt obcaecati laudantium possimus necessitatibus dolorum, voluptatum, eaque optio aperiam magnam, dolores praesentium veritatis beatae! Sapiente magnam dolor dignissimos dolores accusantium praesentium architecto, perspiciatis consequatur sit consectetur rem qui.</li>
                                        <li class="list-group-item">Modi laborum id, quia minima necessitatibus error recusandae illum impedit maxime reprehenderit sit voluptatum nisi, perferendis laboriosam rem dolor aut quidem est cumque similique obcaecati aliquid. Mollitia laboriosam, reiciendis deleniti.</li>
                                        <li class="list-group-item">Molestias perspiciatis illo natus, eveniet quia ducimus ad, adipisci voluptatum quasi nisi. Ab blanditiis voluptatum iusto id. Eaque saepe dignissimos distinctio possimus provident, aut culpa pariatur hic illo molestias fugiat.</li>
                                        <li class="list-group-item">Esse ullam repudiandae, eveniet eos maiores blanditiis. Natus voluptas mollitia placeat blanditiis inventore officiis ullam aut ex quo vel, possimus nemo expedita quas. Adipisci cumque et omnis placeat ipsam, veniam!</li>
                                        <li class="list-group-item">Iusto debitis in natus explicabo soluta unde magnam quo, doloremque nulla saepe vero reiciendis facere dolore atque laudantium, est excepturi corporis provident ipsa rem! Aperiam est deserunt vitae, eligendi porro.</li>
                                        <li class="list-group-item">Eligendi iure, optio qui expedita dolore eum culpa reiciendis at, consectetur sunt blanditiis sed corrupti tempora debitis similique perferendis excepturi quia quos ipsam natus ullam, ipsa quae ab, fugit. Nostrum.</li>
                                        <li class="list-group-item">Facere quae hic repellendus dolore rerum, dicta! Laudantium ullam, corporis eos optio necessitatibus animi ex velit natus, soluta cumque esse voluptate veniam aspernatur distinctio vitae ut incidunt, reprehenderit error officiis.</li>
                                        <li class="list-group-item">Iure officiis repellat, accusantium distinctio maiores, ducimus soluta libero in quia deserunt id facere sed unde iste earum dolorem, voluptate. Laudantium nesciunt sed nostrum non, voluptate quasi, placeat saepe perspiciatis.</li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver todos e-mails</a></li>
                            </ul>
                        </li>                
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Minha conta</li>

                                <li>
                                    <a href="{{ url('password/email') }}">
                                        <i class="fa fa-key fa-fw pull-right"></i>
                                        Alterar senha
                                    </a>
                                    <a data-toggle="modal" href="#modal-user-settings">
                                        <i class="fa fa-ambulance fa-fw pull-right"></i>
                                        Obter Ajuda
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                        Perfil
                                    </a>
                                    <a data-toggle="modal" href="#modal-user-settings">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                        Configurações
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw pull-right"></i> Sair</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else                
                    <ul class="nav nav-pills pull-right">                        
                        <li>
                            <a class="" href="{{ url('/login') }}">Entrar</a>
                        </li>
                    </ul>
                @endif
            </div>            
        

        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        @if (Auth::check())
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
            
                
                <section class="sidebar">
                <!-- Sidebar user panel -->
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Pesquisar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
                            <a href="{!! url('clientes') !!}">
                                <i class="fa fa-user"></i> <span>Clientes</span>
                            </a>
                                @if ( Request::is('clientes*') )
                                <ul>
                                    <li class="{{ Request::is('clientes') ? 'active' : '' }}">
                                        <a href="{!! url('clientes') !!}">Ver todos</a>
                                    </li>  
                                    <li class="{{ Request::is('clientes/create') ? 'active' : '' }}">
                                        <a href="{!! url('clientes/create') !!}">Adicionar cliente</a>
                                    </li>                             
                                </ul>
                                @endif
                        </li>                           

                        <li class="{{ Request::is('obras*') ? 'active' : '' }}">
                            <a href="{!! url('obras') !!}">
                                <i class="fa fa-building-o"></i> <span>Obras</span>
                            </a>
                                @if ( Request::is('obras*') )
                                <ul>
                                    <li>
                                        <a href="{!! url('obras') !!}">Ver todas</a>
                                    </li> 
                                    <li>
                                        <a href="{!! url('obras/create') !!}">Adicionar Obra</a>
                                    </li>                             
                                    <li>
                                        <a href="{!! url('obras/disciplinas') !!}">Disciplinas</a>
                                    </li>                                    
                                </ul>
                                @endif
                        </li>
                        <li class="{{ Request::is('contatos*') ? 'active' : '' }}">
                            <a href="{!! url('contatos') !!}">
                                <i class="fa fa-user"></i> <span>Contatos</span>
                            </a>
                            @if ( Request::is('contatos*') )
                                <ul>
                                    <li>
                                        <a href="#">Ver todos</a>
                                    </li>  
                                    <li>
                                        <a href="#">Adicionar contato</a>
                                    </li>                             
                                </ul>
                                @endif
                        </li>
                        <li class="{{ Request::is('consultas_tecnicas*') ? 'active' : '' }}">
                            <a href="{!! url('consultas_tecnicas') !!}">
                                <i class="fa fa-check"></i> <span>Consultas Técnicas</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->

            </aside>    

        @endif

            <aside class="<?php echo ( Auth::check() ) ? 'right-side' : ''; ?>">

                <!-- Main content -->
                <section class="content">
                    
                    <!-- System Notifications -->
                    @if(Session::has('sys_notifications'))
                        <div class="alert-group">
                            @foreach ( Session::get('sys_notifications') as $sys_notification )
                                <div class="alert alert-{!! $sys_notification['type'] or 'info' !!}">
                                    @if ( !@$sys_notification['important'] )
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    @endif
                                    {!! $sys_notification['message'] !!}
                                </div>                               
                            @endforeach
                        </div>
                    @endif
                    <!-- /System Notifications -->

                    @if (Auth::check() && count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach      
                    @endif                    

                    @yield('content')
                    
                </section><!-- /.content -->

                <div class="footer-main">
                    <small>Copyright &copy Garcia, <?php echo date('Y') ?></small>
                </div>

            </aside><!-- /.right-side -->

                </div><!-- ./wrapper -->


                <!-- jQuery 2.0.2 -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
                <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

                <!-- jQuery UI 1.10.3 -->
                <script src="{{ asset('js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
                <!-- Bootstrap -->
                <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
                <!-- daterangepicker -->
                <script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

                <script src="{{ asset('js/plugins/chart.js') }}" type="text/javascript"></script>

                <!-- ANGULARJS -->
                <script src="{{ asset('js/angular.min.js') }}"></script>

                <script src="{{ asset('js/controllers/ContactController.js') }}"></script> <!-- load our controller -->
                <script src="{{ asset('js/services/ContactService.js') }}"></script> <!-- load our service -->

    <!-- datepicker
    <script src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>-->
    <!-- Bootstrap WYSIHTML5
    <script src="{{ asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>-->
    <!-- iCheck -->
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- calendar -->
    <script src="{{ asset('js/plugins/fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>
    <!-- timago -->
    <script src="{{ asset('js/plugins/timeago/jquery.timeago.js') }}" type="text/javascript"></script>
    <!-- ng-infinite-scroll -->
    <script src="{{ asset('js/plugins/ng-infinite-scroll/ng-infinite-scroll.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Select -->
    <script src="{{ asset('js/plugins/bootstrap-select/bootstrap-select.min.js') }}" rel="stylesheet" type="text/css"></script>

    <!-- Director App -->
    <script src="{{ asset('js/Director/app.js') }}" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/Director/dashboard.js') }}" type="text/javascript"></script>

    <!-- MAIN JS -->
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

    <!-- Director for demo purposes -->
    <script type="text/javascript">
    $('input').on('ifChecked', function(event) {
        // var element = $(this).parent().find('input:checkbox:first');
        // element.parent().parent().parent().addClass('highlight');
        $(this).parents('li').addClass("task-done");
        console.log('ok');
    });
    $('input').on('ifUnchecked', function(event) {
        // var element = $(this).parent().find('input:checkbox:first');
        // element.parent().parent().parent().removeClass('highlight');
        $(this).parents('li').removeClass("task-done");
        console.log('not');
    });

    </script>
    <script>
    $('#noti-box').slimScroll({
        height: '400px',
        size: '5px',
        BorderRadius: '5px'
    });

    $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
        checkboxClass: 'icheckbox_flat-grey',
        radioClass: 'iradio_flat-grey'
    });
    </script>
    <script type="text/javascript">
    $(function() {
        "use strict";
        //BAR CHART
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
            ]
        };
       

    });
    // Chart.defaults.global.responsive = true;
    </script>   
</body>
</html>