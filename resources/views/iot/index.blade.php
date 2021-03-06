@extends('template')

@section('title', 'UDOO IoT Cloud')

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>UDOO IoT CLOUD</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="/iot/restart"><i class="material-icons">settings_backup_restore</i>Restart service</a></li>
                                <li><a href="/iot/log"><i class="material-icons">reorder</i>Show service log</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="/iot/logout"><i class="material-icons">input</i>Change account</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">cloud</i>
                </div>
                <div class="content">
                    <div class="text">UDOO IoT Cloud</div>
                    <div class="number">{{ $status }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-amber hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">router</i>
                </div>
                <div class="content">
                    <div class="text">Server</div>
                    <div class="number">{{ $server }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">more</i>
                </div>
                <div class="content">
                    <div class="text">Client Version</div>
                    @if (strpos($version, 'nightly') === false)
                        <div class="number">{{ $version }}</div>
                    @else
                        @php
                        $parts = explode('-nightly-', $version);
                        echo "<div class=\"number\">$parts[0] <abbr title=\"$parts[1]\">nightly</abbr></div>";
                        @endphp
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">toys</i>
                </div>
                <div class="content">
                    <div class="text">Sensors</div>
                    <div class="number">Unknown</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-center">
            <div class="iot-welcome-sphere">
                <div class="icon"><i class="material-icons">cloud</i></div>
                <div class="text">Manage your board from<br><a target="_blank" href="{{$iotbaseurl}}">UDOO IoT Cloud</a></div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="/js/iot-index.js"></script>
@endsection
