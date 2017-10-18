@extends('default')

@section('title', 'Advanced Settings')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div><p class="title_sections1">ADVANCED SETTINGS</p></div>
            <div class="text_g">Change these settings carefully. Restart the board to apply the changes!</div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-blue2">
                <div class="panel-heading">
                    <p class="title_sections2">VIDEO OUTPUT</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Select the main video output.</div>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal" style="margin:20px 15px 0 15px;" method="POST" action="/settings/set-video">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Video output</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="video">
                                <option value="hdmi"
                                    @if ($video == 'hdmi')
                                        selected="selected"
                                    @endif
                                >HDMI</option>
                                <option value="lvds7"
                                    @if ($video == 'lvds7')
                                    selected="selected"
                                    @endif
                                >LVDS 7''</option>
                                @if ($hasLvds15)
                                <option value="lvds15"
                                    @if ($video == 'lvds15')
                                    selected="selected"
                                    @endif
                                >LVDS 15''</option>
                                @endif
                                <option value="headless"
                                    @if ($video == 'headless')
                                    selected="selected"
                                    @endif
                                >Disable screen output</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </div>
                </form>

                <br style="clear:both;">
            </div>
        </div>

        @if ($hasM4)
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-green2">
                <div class="panel-heading">
                    <p class="title_sections2">ARDUINO M4 CORE</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Disabling the M4 core, it will be possible to access all SoC devices and pins from Linux.</div>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal" style="margin:20px 15px 0 15px;" method="POST" action="/settings/set-m4">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">M4 status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="m4">
                                <option value="enabled"
                                    @if ($m4 == 'enabled')
                                    selected="selected"
                                    @endif
                                >Enabled</option>
                                <option value="disabled"
                                        @if ($m4 == 'disabled')
                                        selected="selected"
                                        @endif
                                >Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </div>
                </form>

                <br style="clear:both;">
            </div>
        </div>
        @endif

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <p class="title_sections2">WEB CONTROL PANEL</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Move this tool to a different port before installing a web server.</div>
                        </div>
                    </div>
                </div>

                    <form class="form-horizontal webport" style="margin:20px 15px 0 15px;" method="POST" action="/settings/set-http-port">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Listen on port</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="port">
                                <option value="80"
                                        @if ($port == 80)
                                        selected="selected"
                                        @endif
                                >80</option>
                                <option value="81"
                                        @if ($port == 81)
                                        selected="selected"
                                        @endif
                                >81</option>
                                <option value="8080"
                                        @if ($port == 8080)
                                        selected="selected"
                                        @endif
                                >8080</option>
                                <option value="8888"
                                        @if ($port == 8888)
                                        selected="selected"
                                        @endif
                                >8888</option>
                                <option value="-1"
                                        @if ($port == -1)
                                        selected="selected"
                                        @endif
                                >Disable web configuration tool startup</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>
                    </div>
                </form>

                <br style="clear:both;">
            </div>
        </div>

    </div>

    <script type="text/javascript" src="/js/settings-advanced.js"></script>

@endsection
