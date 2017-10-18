@extends('default')

@section('title', 'UDOO Web Conf')

@section('content')

    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">wifi</i>
                </div>
                <div class="content">
                    <div class="text">Wi-Fi {{ $ssid }}</div>
                    <div class="number">{{ $wlan }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">swap_horiz</i>
                </div>
                <div class="content">
                    <div class="text">Ethernet</div>
                    <div class="number">{{ $ethernet }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-amber hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">usb</i>
                </div>
                <div class="content">
                    <div class="text">USB</div>
                    <div class="number">{{ $usb }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">cloud</i>
                </div>
                <div class="content">
                    <div class="text">UDOO IoT</div>
                    <div class="number">Dragons</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>BOARD INFO</h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 hidden-xs boardimg">
                            <img class="img-responsive" src="/images/boards/{{ $board['image'] }}" alt="{{ $board['model'] }}">
                        </div>
                        <div class="col-xs-12 col-md-7 col-sm-7 boardinfo">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td class="text-right">{{ $board['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td class="text-right">{{ $board['model'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>ID</td>
                                        <td class="text-right">{{ $board['id'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Internet</td>
                                        <td class="text-right">{{ $board['online'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body">
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#motionsensors" data-toggle="tab" aria-expanded="true">9-AXIS SENSORS</a></li>
                        <li role="presentation" class=""><a href="#motionsensorsmod" data-toggle="tab" aria-expanded="false">MODULUS</a></li>
                    </ul>
                    <div class="tab-content sensors-padding">
                        <div role="tabpanel" class="tab-pane fade active in sensors-bars" id="motionsensors">
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

                        <div role="tabpanel" class="tab-pane fade sensors-bars" id="motionsensorsmod">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/js/reconnecting-websocket.js"></script>
    <script src="/js/dashboard.js"></script>
@endsection
