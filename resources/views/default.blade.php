<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/layout/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/layout/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/layout/metis/metisMenu.min.css" rel="stylesheet">
    <link href="/layout/sbadmin/css/sb-admin-2.css" rel="stylesheet">
    <link href="/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/layout/style.css" rel="stylesheet">
    <title>@yield('title')</title>
    <script type='text/javascript' src='/js/jquery-2.1.4.min.js'></script>
    <script type='text/javascript' src='/layout/bootstrap/js/bootstrap.min.js'></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/images/logo_small.png" width="105" height="70" alt="UDOO"></a>
        </div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>

                    <li>
                        <a href="#"><i class="fa fa-code fa-fw"></i> Arduino<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/arduino/samples"><i class="fa fa-file-text-o"></i> Samples</a></li>
                            <li><a href="/arduino/webide"><i class="fa fa-edit fa"></i> Web IDE</a></li>
                            <li><a href="/arduino/appinventor"><i class="fa fa-puzzle-piece fa"></i> App Inventor</a></li>
                        </ul>
                    </li>

                    <li><a href="/docs"><i class="fa fa-book fa-fw"></i> Documentation</a></li>
                    <li><a href="http://www.udoo.org/forum" target="_blank"><i class="fa fa-comments fa-fw"></i> Support forums</a></li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Configuration<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/settings/base"><i class="fa fa-key fa"></i> Passwords and hostname</a></li>
                            <li><a href="/settings/network"><i class="fa fa-wifi fa"></i> Network settings</a></li>
                            <li><a href="/settings/regional"><i class="fa fa-language fa"></i> Regional settings</a></li>
                            <li><a href="/settings/advanced"><i class="fa fa-cogs fa"></i> Advanced settings</a></li>
                            <li><a href="/settings/iot"><i class="fa fa-cogs fa"></i> IoT Configuration</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        @yield('content')
    </div>
</div>

<script type='text/javascript' src='/layout/metis/metisMenu.min.js'></script>
<script type='text/javascript' src='/layout/sbadmin/js/sb-admin-2.js'></script>

</body>
</html>

