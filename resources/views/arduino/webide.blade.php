@extends('default')

@section('title', 'Arduino Web IDE')

@section('content')

    <div class="modal fade" id="waitDialog" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">UDOO Neo</h4>
                </div>
                <div class="modal-body">
                    <div class="loading">Please wait, the sketch is being compiled and flashed.<br>
                        This can take up to a minute...
                        <br><br><br>
                        <div style="text-align:center;"><img src="/images/loader-small.gif"></div>
                        <br><br>
                    </div>
                    <div class="loaded hidden">The sketch has been uploaded!</div>
                    <div class="error hidden"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div><p class="title_sections1">ARDUINO WEB IDE</p></div>
            <div class="text_g">Use this Web IDE to upload your own Sketch. Write the code below and press the Upload button. Be aware that it could take 30 seconds or more to verify and upload the sketch.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <pre id="editor">{{ $last }}</pre>
            <div id="feedback">
            Write your Sketch and hit Upload to Flash it on UDOO NEO's integrated Arduino Microcontroller
            </div>
        </div>

        <div class="col-md-2 col-sm-12 col-xs-12" id="button">
            <br>
            <div class="wrapper_docs"><button type="button" id="upload-ide" class="btn btn-primary btn-block">UPLOAD</button></div>
        </div>
    </div>

    <script src="/js/ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/chrome");
        editor.session.setMode("ace/mode/c_cpp");
        editor.setOptions({
            fontSize: "13pt"
        });

        $(function() {
            $("#upload-ide").on("click", function() {
                $('#waitDialog div.loading').removeClass("hidden");
                $('#waitDialog div.loaded').addClass("hidden");
                $('#waitDialog div.error').addClass("hidden");
                $('#waitDialog').modal('show');

                $.ajax({
                    type: "POST",
                    url: '/arduino/compilesketch/',
                    data: {
                        sketch: ace.edit("editor").getValue().replace(/[^\040-\176\200-\377]/gi, "\n")
                    },
                    success: function(response) {
                        $('#waitDialog div.loading').addClass("hidden");
                        if (response.success) {
                            $('#waitDialog div.loaded').removeClass("hidden");
                        } else {
                            $('#waitDialog div.error').html(response.message || "Cannot flash sketch!").removeClass("hidden");
                        }
                    }
                });
            });
        });
    </script>

@endsection
