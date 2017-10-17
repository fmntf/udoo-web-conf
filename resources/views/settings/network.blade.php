@extends('default')

@section('title', 'Network')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div><p class="title_sections1">NETWORK CONFIGURATION</p></div>
            <div class="text_g">Configure your UDOO board name and WiFi connection.</div>
        </div>
    </div>

    @include('shared.saved')

    <div class="modal fade" id="wifiPassword" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">UDOO Neo</h4>
                </div>
                <div class="modal-body">
                    Insert the password for the network <strong></strong>:<br><br><br>
                    <form class="form-horizontal" action="/settings/wifi-connect" method="POST">
                        <input type="hidden" name="ssid">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Connect</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
            <div class="panel panel-blue2">
                <div class="panel-heading">
                    <p class="title_sections2">WIRELESS NETWORK <i class="fa fa-spinner wifi-spinner pull-right hidden"></i></p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Double-click the Wireless Network you want to connect to.</div>
                        </div>
                    </div>
                </div>
                <div class="wifi-ct">
                    <div class="list-group wifi">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="/js/settings-network.js"></script>

@endsection
