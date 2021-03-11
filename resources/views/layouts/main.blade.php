<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <title>{{config('app.name')}}</title>
        <meta name="description" content=""/>
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="icon" href="/img/favicon.ico"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/"><img width="150" src="{{asset('img/logo.svg')}}" alt=""></a>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    @section('sidebar')
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                @include('sidebar')
                            </div>
                        </div>
                    @show
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div>
                        @include('messages')
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
