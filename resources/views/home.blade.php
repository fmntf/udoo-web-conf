@extends('default')

@section('title', 'UDOO Web Conf')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div><p class="title_sections1">DASHBOARD</p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="dashtitles">ETHERNET</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-exchange fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div id="ethstatus">{{ $ethernet }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <p class="dashtitles">USB</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-usb fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div id="usbstatus">{{ $usb }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <p class="dashtitles">WIFI <span id="wlanssid">{{ $ssid }}</span></p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-wifi fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div id="wlanstatus">{{ $wlan }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <p class="dashtitles">BLUETOOTH</p>
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bluetooth-b fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div id="btstatus">{{ $bt }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="panel panel-grey">
                <div class="panel-heading panel-fixed-height">
                    <p class="title_sections3">BOARD INFO</p>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 hidden-xs" style="text-align:center;">
                            <img id="boardimage" class="boardimg img-responsive" src="/images/boards/{{ $board['image'] }}" alt="{{ $board['model'] }}">
                        </div>
                        <div class="col-xs-12 col-md-7 col-sm-7">
                            <div class="panel-body">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <i class="fa fa-user fa-fw"></i> NAME
                                        <span id="spanname" class="pull-right text-muted">{{ $board['name'] }}</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="fa fa-square fa-fw"></i> MODEL
                                        <span id="spanmodel" class="pull-right text-muted">{{ $board['model'] }}</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="fa fa-barcode fa-fw"></i> ID
                                        <span id="spancpuid" class="pull-right text-muted">{{ $board['id'] }}</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="fa fa-globe fa-fw"></i> INTERNET
                                        <span id="spanonline" class="pull-right text-muted">{{ $board['online'] }}</span>
                                    </div>
                                    <div class="list-group-item">
                                        <i class="fa fa-desktop fa-fw"></i> VIDEO OUTPUT
                                        <span id="spanvideo" class="pull-right text-muted">{{ $board['video'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="panel panel-grey">
                <div class="panel-heading panel-fixed-height">

                    <div class="btn-group btn-group-xs pull-right" role="group" aria-label="...">
                        <button type="button" class="btn switch-axis active">Axis</button>
                        <button type="button" class="btn switch-modulus">Modulus</button>
                    </div>

                    <p class="title_sections3">SENSORS</p>

                    <div id="sensors-modulus" class="sensors-bars hidden">
                        <div class="row">
                            <div class="col-xs-2"><img class="iconnet" src="/images/iconacc.png" alt=""></div>
                            <div class="col-xs-10">
                                <div class="progress accelerometer-modulus">
                                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2"><img class="iconnet" src="/images/icongyro.png" alt=""></div>
                            <div class="col-xs-10">
                                <div class="progress gyroscope-modulus">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2"><img class="iconnet" src="/images/iconmagn.png" alt=""></div>
                            <div class="col-xs-10">
                                <div class="progress magnetometer-modulus">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sensors-axis" class="sensors-bars">
                        <div class="row">
                            <div class="col-xs-2"><img class="iconnet" src="/images/iconacc.png" alt=""></div>
                            <div class="col-xs-10">
                                <div class="progress accelerometer-x">
                                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="progress accelerometer-y">
                                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="progress accelerometer-z">
                                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2"><img class="iconnet" src="/images/icongyro.png" alt=""></div>
                            <div class="col-xs-10">
                                <div class="progress gyroscope-x">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="progress gyroscope-y">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="progress gyroscope-z">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2"><img class="iconnet" src="/images/iconmagn.png" alt=""></div>
                            <div class="col-xs-10">
                                <div class="progress magnetometer-x">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="progress magnetometer-y">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <div class="progress magnetometer-z">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 0%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row button-row">
        <div class="col-lg-4 col-md-4">
            <a href="/docs/Getting_Started/Very_First_Start.html" >
                <div class="panel panel-greeneme">
                    <div class="panel-heading">
                        <p class="title_sections4"><i class="fa fa-check fa"></i> FIRST START</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4">
            <a href="http://www.udoo.org/tutorials/" >
                <div class="panel panel-lightblue">
                    <div class="panel-heading">
                        <p class="title_sections4"><i class="fa fa-child fa"></i> TUTORIALS</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4">
            <a href="/docs" >
                <div class="panel panel-purple">
                    <div class="panel-heading">
                        <p class="title_sections4"><i class="fa fa-book fa"></i> DOCS</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6">
            <a href="/docs/Basic_Setup/Remote_Terminal_(SSH).html" target="_blank" class="remoteterminal">
                <div class="panel panel-red2">
                    <div class="panel-heading">
                        <p class="title_sections4"><i class="fa fa-terminal fa"></i> REMOTE TERMINAL</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6">
            <a href="/docs/Basic_Setup/Remote_Desktop_(VNC).html" >
                <div class="panel panel-orange">
                    <div class="panel-heading">
                        <p class="title_sections4"><i class="fa fa-desktop fa"></i> REMOTE DESKTOP</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <script type="text/javascript" src="/js/reconnecting-websocket.js"></script>
    <script type="text/javascript" src="/js/dashboard.js"></script>

@endsection
