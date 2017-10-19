@extends('default')

@section('title', 'Terminal')

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>TERMINAL</h2>
                </div>
                <div class="body">
                    <iframe id="terminal"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/js/terminal.js"></script>
@endsection
