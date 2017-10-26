@extends('template')

@section('title', 'UDOO IoT')

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        UDOO IoT
                    </h2>
                </div>
            </div>
        </div>
    </div>

    @if (!$loggedin)
        <div class="row iot-login m-t-100">
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                <div class="login-box">
                    <div class="card">
                        <div class="body">
                            <form id="sign_in">
                                <div class="msg m-t-20 m-b-50">Register your {{ $hostname }} board in your UDOO IoT account:</div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required value="">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-offset-4 col-xs-4">
                                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                                    </div>
                                </div>

                                <div class="m-t-30 m-b-20">
                                    <a href="{{ $iotbaseurl }}/forgot" target="_blank">I forgot my password</a><br>
                                    <a href="{{ $iotbaseurl }}/register" target="_blank">Register a new membership</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
