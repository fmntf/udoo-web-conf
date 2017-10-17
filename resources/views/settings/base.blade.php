@extends('default')

@section('title', 'Settings')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div><p class="title_sections1">BOARD NAME AND PASSWORDS</p></div>
            <div class="text_g">Configure your UDOO board name and access passwords.</div>
        </div>
    </div>

    @include('shared.saved')

    <div class="modal fade" id="genericError" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">UDOO Neo</h4>
                </div>
                <div class="modal-body">!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-blue2">
                <div class="panel-heading">
                    <p class="title_sections2">CHANGE UDOOER PASSWORD</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Default user is <i>udooer</i> (default password: <i>udooer</i>).
                                Never use default passwords!</div>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal udooer-user" style="margin:20px 15px 0 15px;" method="POST" action="/settings/change-password">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="udooer" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2" class="col-sm-2 control-label">Repeat</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" id="inputPassword2" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
                        </div>
                    </div>
                </form>

                <br style="clear:both;">
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <p class="title_sections2">CHANGE ROOT PASSWORD</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">The system administrator is <i>root</i> (default password: <i>ubuntu</i>).
                                Never use default passwords!</div>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal root-user" style="margin:20px 15px 0 15px;" method="POST" action="/settings/change-password">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="root" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="inputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2" class="col-sm-2 control-label">Repeat</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" id="inputPassword2" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
                        </div>
                    </div>
                </form>

                <br style="clear:both;">
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-green2">
                <div class="panel-heading">
                    <p class="title_sections2">BOARD NAME</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Choose a unique hostname for your UDOO (a reboot is required).</div>
                        </div>
                    </div>
                </div>

                <form class="form-inline hostname" style="margin:20px 15px 0 15px;" method="POST" action="/settings/set-hostname">
                    <div class="row">
                        <div class="col-xs-10">
                            <input type="text" class="form-control" style="width: 100%;" placeholder="Board name" name="hostname" value="{{ $hostname }}">
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" style="width: 100%;" class="btn btn-primary col-xs-2">SAVE</button>
                        </div>
                    </div>
                </form>
                <br style="clear:both;">
            </div>
        </div>

    </div>


    <script type="text/javascript" src="/js/settings-base.js"></script>

@endsection
