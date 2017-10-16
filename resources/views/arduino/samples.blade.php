@extends('default')

@section('title', 'Arduino Samples')

@section('content')

    <div class="modal fade" id="waitDialog" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">UDOO Neo</h4>
                </div>
                <div class="modal-body">
                    <div class="loading">Please wait, the sketch is being flashed...
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
            <div><p class="title_sections1">ARDUINO SAMPLES</p></div>
            <div class="text_g">Two easy examples to get you started using UDOO Neo's integrated Arduino compatible processor. Just follow the instructions and hit run!</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="panel panel-arduino">
                <div class="panel-heading">
                    <p class="title_sections2">BLINK</p>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="text_v">Connect a LED to PIN 13 and see it blinking!</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-grey">
                <div class="panel-heading">
                <pre>
int led = 13;

void setup() {
  pinMode(led, OUTPUT);
}


void loop() {
  digitalWrite(led, HIGH);
  delay(1000);

  digitalWrite(led, LOW);
  delay(1000);
}
                </pre>
                </div>
            </div>
            <div class="wrapper_docs"><button type="button" id="blink" class="btn btn-primary btn-block">RUN!</button></div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="panel panel-arduino">
                <div class="panel-heading">
                    <p class="title_sections2">FADE</p>
                    <div class="row">

                        <div class="col-xs-12 text-right">

                            <div class="text_v">Connect a LED to PIN 9 and see it fade in and out!</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-grey">
                <div class="panel-heading">
                <pre>
int led = 9;
int brightness = 0;
int fadeAmount = 5;

void setup() {
  pinMode(led, OUTPUT);
}

void loop() {
  analogWrite(led, brightness);
  brightness = brightness + fadeAmount;
  if (brightness == 0 || brightness == 255) {
    fadeAmount = -fadeAmount;
  }

  delay(30);
}
                </pre>
                </div>
            </div>
            <div class="wrapper_docs"><button type="button" id="fade" class="btn btn-primary btn-block">RUN!</button></div>
            <br>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function flashSketch(sketch) {
                $('#waitDialog div.loading').removeClass("hidden");
                $('#waitDialog div.loaded').addClass("hidden");
                $('#waitDialog div.error').addClass("hidden");
                $('#waitDialog').modal('show');

                $.ajax({
                    type: "GET",
                    url: '/arduino/uploadsketch/' + sketch,
                    success: function(response) {
                        $('#waitDialog div.loading').addClass("hidden");
                        if (response && response.success) {
                            $('#waitDialog div.loaded').removeClass("hidden");
                        } else {
                            $('#waitDialog div.error').html(response.message || "Cannot flash sketch!").removeClass("hidden");
                        }
                    }
                });
            }

            $(function() {
                $("#fade").on("click", function() {
                    flashSketch("Fade");
                });
                $("#blink").on("click", function() {
                    flashSketch("Blink");
                });
            });
        });
    </script>

@endsection
