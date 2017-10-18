@extends('default')

@section('title', 'App Inventor')

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        APP INVENTOR
                    </h2>
                </div>
                <div class="body">
                    <p>Develop an Android application to control your {{ $_SESSION['board']['shortmodel'] }} using the UDOO IoT extension for App Inventor.</p>
                    <p>Your board must be registered in the UDOO IoT Cloud. If you have not registered your board yet, do it now!</p>

                    <a href="http://ai2.appinventor.mit.edu" target="_blank" class="btn bg-pink waves-effect">OPEN APP INVENTOR 2</a>
                </div>
            </div>
        </div>
    </div>

@endsection
